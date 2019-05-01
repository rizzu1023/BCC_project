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
				<h3 class="title1">Batting Stats</h3>
                <a style="margin-bottom:20px" class="btn btn-primary btn-flat btn-pri" href="{{route('AddBatting')}}"><i class="fa fa-plus"></i>Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Sr</th>
								  <th>Player Id</th>
								  <th>Matches</th>
								  <th>Innings</th>
								  <th>Balls</th>
								  <th>Fours</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($batting as $b)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/EditBatting/{{$b->id}}">Edit</a>
								  <form style="display:inline-block" method="POST" action="{{route('Post_DeleteBatting')}}">
								  	@csrf
									  <input type="hidden" value="{{$b->id}}" name="id">
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>
								  </td>
								  <th scope="row">{{$i}}</th>
								  <td>{{$b->player_id}}</td>
								  <td>{{$b->bt_matches}}</td>
								  <td>{{$b->bt_innings}}</td>
								  <td>{{$b->bt_balls}}</td>
								  <td>{{$b->bt_fours}}</td>
								</tr>
                                @php($i++)
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection