@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Teams</h3>
                <a class="btn btn-primary" href="{{route('AddTeam')}}">Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th>Sr</th>
								  <th>Team Id</th>
								  <th>Team Name</th>
								  <th>Team Won</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($team as $t)
                                <tr>
								  <th scope="row">{{$i}}</th>
								  <td>{{$t->team_id}}</td>
								  <td>{{$t->team_name}}</td>
								  <td>{{$t->team_won}}</td>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/EditTeam/{{$t->id}}">Edit</a>
								  <form style="display:inline-block" method="POST" action="{{route('Post_DeleteTeam')}}">
								  	@csrf
									  <input type="hidden" value="{{$t->id}}" name="id">
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>
								  </td>
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