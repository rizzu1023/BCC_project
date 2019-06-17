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
				<h3 class="title1">Players</h3>
				<a style="margin-bottom:20px" class="btn btn-primary btn-flat btn-pri" href="{{route('Players.create')}}"><i class="fa fa-plus"></i>Add</a>
								<div class="row">

								<!-- <div class="col-md-4"> -->
										<form method="POST" action="{{route('playerFilter')}}">
											@csrf
											<div class="form-group col-md-4"> 
													<select class="form-control" id="id" name="id">
														<option value="{{$id['id']}}">@if($id){{$id->team_name}}@else<p>ALL</p>@endif</option>
														@foreach($team as $t)
															<option value="{{$t->id}}">{{$t->team_name}}</option>
														@endforeach
													</select>
											</div>

											<div class="form-group col-md-4">
														<select class="form-control"  id="player_role" name="player_role">
															<option value="{{$player_role}}">@if($player_role){{$player_role}}@else<p>ALL</p>@endif</option>
																<option value="Batsman">Batsman</option>
																<option value="Bowler">Bowler</option>
																<option value="All Rounder">All Rounder</option>
																<option value="Wicket keeper">Wicket Keeper</option>
														</select>
												</div>
											<button type="submit" class="btn btn-md btn-success">Filter</button>
										</form>
									<!-- </div> -->

								
								</div>
				<div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
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
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/Players/{{$p->id}}/edit">Edit</a>
									<a class="btn btn-warning btn-sm" href="/admin/Players/{{$p->id}}">Show</a>
								  <form style="display:inline-block" method="POST" action="/admin/Players/{{$p->id}}">
								  	@csrf
										@method('DELETE')
									  <!-- <input type="hidden" value="#" name="id"> -->
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>

								  </td>
								  <th scope="row">{{$i}}</th>
								  <td>{{$p->player_id}}</td>
								  <td>{{$p->player_name}}</td>
								  <td>{{$p->player_role}}</td>
								  @if($p->Teams)
								  <td>{{$p->Teams->team_name}}</td>
							      @endif
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
