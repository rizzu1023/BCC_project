@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Batting Stats</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="/admin/Batting/{{$Batting['id']}}">
							@csrf
							@method('PUT')

								<div class="form-group">
									<label for="field1">Player Id</label>
									<input type="text" class="form-control" id="field1" name="" value="{{$Batting->Players->player_id}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Player Name</label>
									<input type="text" class="form-control" id="field1" name="" value="{{$Batting->Players->first_name}} {{$Batting->Players->last_name}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="" value="{{$Batting->Players->Teams->team_name}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Matches</label>
									<input type="number" class="form-control" id="field1" name="bt_matches" value="{{$Batting['bt_matches']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Innings</label>
									<input type="number" class="form-control" id="field1" name="bt_innings" value="{{$Batting['bt_innings']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Balls</label>
									<input type="number" class="form-control" id="field1" name="bt_balls" value="{{$Batting['bt_balls']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Fours</label>
									<input type="number" class="form-control" id="field1" name="bt_fours" value="{{$Batting['bt_fours']}}">
								</div>


								<button type="submit" class="btn btn-default">Update</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
