@extends('Admin.layouts.base')
 
@section('content')

<div id="page-wrapper">
			<div class="main-page">

			@include('Admin.layouts.message')

				<h3 class="title1">Teams</h3>
                <a style="margin-bottom:20px;" class="btn btn-primary btn-flat btn-pri" href="{{route('Team.create')}}"><i class="fa fa-plus"></i>Add</a>
				<div class="row">
					<form method="POST" action="{{route('teamFilter')}}">
							@csrf
							<div class="form-group col-md-4">
									<select class="form-control" name="tournament_id" onchange="this.form.submit()">
										<option value="">Tournament</option>
										@foreach($tournament as $t)
											<option value="{{$t->id}}">{{$t->tournament_name}}</option>
										@endforeach
									</select>
							</div>
					</form>
				</div>
			    <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Team_id</th>
								  <th>Team Code</th>
								  <th>Team Name</th>
								  <th>Titles</th>
								</tr>
							</thead> 
							<tbody>
                            @foreach($team as $t) 
                                <tr>
								  <td>
								  <a class="btn btn-warning btn-sm" href="/admin/Team/{{$t->id}}">Show</a>
								  <a class="btn btn-success btn-sm" href="/admin/Team/{{$t->id}}/edit">Edit</a>
								  <form style="display:inline-block" method="POST" action="/admin/Team/{{$t->id}}">
								  	@csrf
										@method('DELETE')
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>
								  </td>
								  <th scope="row">{{$t->id}}</th>
								  <td>{{$t->team_code}}</td>
								  <td>{{$t->team_name}}</td>
								  <td>{{$t->team_title}}</td>
							    </tr>
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection