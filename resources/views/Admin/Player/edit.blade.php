@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Player</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="{{route('teams.players.update',['team'=>$team->id,'player'=>$player->id])}}">
							@csrf
							@method('PUT')
								<div class="form-group">
									<label for="field1">Player Id</label>
									<input type="text" class="form-control" id="field1" name="player_id" value="{{$player['player_id']}}">
									<div>{{ $errors->first('player_id')}}</div>
								</div>
								<div class="form-group">
									<label for="field1">Player Name</label>
									<input type="text" class="form-control" id="field1" name="player_name" value="{{$player['player_name']}}">
									<div>{{ $errors->first('player_name')}}</div>
								</div>
								<div class="form-group">
									<label for="field1">Player Role</label>
									<input type="text" class="form-control" id="field1" name="player_role" value="{{$player['player_role']}}">
								<div>{{ $errors->first('player_role')}}</div>
								</div>

								<button type="submit" class="btn btn-default">Update</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
