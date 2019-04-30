@extends('Admin.layouts.base')

@section('content')


<div id="page-wrapper">
			<div class="main-page">

			@if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
              </div>
			@endif
				<h3 class="title1">Schedule</h3>
                <a style="margin-bottom:20px" class="btn btn-primary btn-flat btn-pri" href="{{route('AddSchedule')}}"><i class="fa fa-plus"></i>Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Match No</th>
								  <th>Team 1</th>
                                  <th>Vs</th>
								  <th>Team 2</th>
								  <th>Time</th>
								  <th>Date</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($schedule as $s)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/EditSchedule/{{$s->id}}">Edit</a>
								  <form style="display:inline-block" method="POST" action="{{route('Post_DeleteSchedule')}}">
								  	@csrf
									  <input type="hidden" value="{{$s->id}}" name="id">
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>
								  </td>
								  <th scope="row">{{$s->match_no}}</th>
								  <td>{{$s->team1_id}}</td>
                                  <td>Vs</td>
								  <td>{{$s->team2_id}}</td>
								  <td>{{$s->times}}</td>
								  <td>{{$s->dates}}</td>
								</tr>
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection