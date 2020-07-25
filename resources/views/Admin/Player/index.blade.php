@extends('Admin.layouts.base')

@section('content')

<div class="card">
    <div class="card-header">
        <strong class="title1">Players</strong>
        <a style=" float: right" class="btn btn-success btn-sm " href="{{route('teams.players.create',$team->id)}}"><i class="fa fa-plus"></i>Add Existing Player</a>


    </div>
			<div class="card-body">
			@include('Admin.layouts.message')
                <span style="font-size: 30px;margin-left: 30vw">{{$team->team_name}}</span>
								<div class="row">

								<!-- <div class="col-md-4"> -->
{{--										<form method="POST" action="{{route('playerFilter')}}">--}}
{{--											@csrf--}}
{{--											<div class="form-group col-md-4">--}}
{{--													<select class="form-control" id="id" name="id">--}}
{{--														<option value="{{$id['id']}}">@if($id){{$id->team_name}}@else<p>ALL</p>@endif</option>--}}
{{--														@foreach($team as $t)--}}
{{--															<option value="{{$t->id}}">{{$t->team_name}}</option>--}}
{{--														@endforeach--}}
{{--													</select>--}}
{{--											</div>--}}

{{--											<div class="form-group col-md-4">--}}
{{--														<select class="form-control"  id="player_role" name="player_role">--}}
{{--															<option value="{{$player_role}}">@if($player_role){{$player_role}}@else<p>ALL</p>@endif</option>--}}
{{--																<option value="Batsman">Batsman</option>--}}
{{--																<option value="Bowler">Bowler</option>--}}
{{--																<option value="All Rounder">All Rounder</option>--}}
{{--																<option value="Wicket keeper">Wicket Keeper</option>--}}
{{--														</select>--}}
{{--												</div>--}}
{{--											<button type="submit" class="btn btn-md btn-success">Filter</button>--}}
{{--										</form>--}}
									<!-- </div> -->


								</div>
				<div class="tables">
						<table class="table table-responsive-sm">
							<thead>
								<tr>
								  <th>Sr</th>
								  <th>Player Id</th>
								  <th>Player Name</th>
								  <th>Player Role</th>
                                    <th></th>

                                </tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($players as $p)
                                <tr>

								  <th scope="row">{{$i}}</th>
								  <td>{{$p->player_id}}</td>
								  <td>{{$p->player_name}}</td>
								  <td>{{$p->player_role}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="/admin/teams/{{$team->id}}/players/{{$p->id}}/edit"><i class=" cil-color-border"></i></a>
                                        <a class="btn btn-warning btn-sm" href="/admin/teams/{{$team->id}}/players/{{$p->id}}"><i class=" cil-user"></i></a>
                                        <form style="display:inline-block" method="POST" action="/admin/teams/{{$team->id}}/players/{{$p->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- <input type="hidden" value="#" name="id"> -->
                                            <button class="btn btn-danger btn-sm"><i class=" cil-trash"></i></button>
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

@endsection
