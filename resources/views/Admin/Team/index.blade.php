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

				<h3 class="title1">Teams</h3>
                <a style="margin-bottom:20px" class="btn btn-primary btn-flat btn-pri" href="{{route('Team.create')}}"><i class="fa fa-plus"></i>Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Sr</th>
								  <th>Team Id</th>
								  <th>Team Name</th>
								  <th>Titles</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($team as $t)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/Team/{{$t->id}}/edit">Edit</a>
								  <form style="display:inline-block" method="POST" action="/admin/Team/{{$t->id}}">
								  @csrf
								  	@method('DELETE')
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>

								  <!-- <a class="btn btn-danger btn-sm" href="/admin/Team/{{$t->id}}">Delete</a> -->
								  </td>
								  <th scope="row">{{$i}}</th>
								  <td>{{$t->team_id}}</td>
								  <td>{{$t->team_name}}</td>
								  <td>{{$t->team_won}}</td>
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