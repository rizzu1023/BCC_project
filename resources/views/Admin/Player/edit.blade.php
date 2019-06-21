@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Player</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="/admin/Players/{{$player['id']}}">
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
								<div class="form-group">
										<label for="exampleFormControlSelect2">Select Team</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team_id">
											@if($player->Teams)
											<option value="{{$player['team_id']}}">{{$player->Teams->team_name}}</option>
											@else
											<option value="">Select Team</option>
											@endif
											@foreach($team as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
										<div>{{ $errors->first('team_id')}}</div>
								</div>


                <input type="hidden" value="{{$player['id']}}" name="id">
								<button type="submit" class="btn btn-default">Update</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
