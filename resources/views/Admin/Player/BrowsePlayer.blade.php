@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Players</h3>
                <a class="btn btn-primary" href="{{route('AddPlayer')}}">Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th>Sr</th>
								  <th>Player Id</th>
								  <th>Player Name</th>
								  <th>Player Role</th>
								  <th>Team</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($player as $p)
                                <tr>
								  <th scope="row">{{$i}}</th>
								  <td>{{$p->player_id}}</td>
								  <td>{{$p->player_name}}</td>
								  <td>{{$p->player_role}}</td>
								  <td>{{$p->Teams->team_name}}</td>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/EditPlayer/{{$p->id}}">Edit</a>
								  <form style="display:inline-block" method="POST" action="{{route('Post_DeletePlayer')}}">
								  	@csrf
									  <input type="hidden" value="{{$p->id}}" name="id">
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