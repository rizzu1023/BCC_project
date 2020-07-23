@extends('Admin.layouts.base')

@section('content')

<div class="card">
    <div class="card-header">
    <h3 class="title1">Add Player</h3>
    </div>
    <div class="card-body">

						<div class="form-body">
							<form method="POST" action="{{route('teams.players.store',$team->id)}}">
							@csrf
								<div class="form-group">
									<label for="field1">Player Id</label>
									<input type="text" class="form-control" id="field1" name="player_id" placeholder="eg. MR">
								</div>
								<div class="form-group">
									<label for="field1">Player Name</label>
									<input type="text" class="form-control" id="field1" name="player_name" placeholder="eg. Virat Kohli">
								</div>
								<div class="form-group">
									<label for="field1">Player Role</label>
									<input type="text" class="form-control" id="field1" name="player_role" placeholder="eg Batsman">
								</div>

								@include('Admin.layouts.errors')
								<button type="submit" class="btn btn-success btn-block">Add Player</button>
							</form>
						</div>
				</div>
</div>

@endsection
