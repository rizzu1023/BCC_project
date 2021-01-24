@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Bowling Stats</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="/admin/Bowling/{{$Bowling['id']}}">
							@csrf
							@method('PUT')
								<div class="form-group">
									<label for="field1">Player Id</label>
									<input type="text" class="form-control" id="field1" value="{{$Bowling['player_id']}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Player Name</label>
									<input type="text" class="form-control" id="field1" value="{{$Bowling->Players->first_name}} {{$Bowling->Players->last_name}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="" value="{{$Bowling->Players->Teams->team_name}}" disabled>
								</div>
								<div class="form-group">
									<label for="field1">Matches</label>
									<input type="number" class="form-control" id="field1" name="bw_matches" value="{{$Bowling['bw_matches']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Innings</label>
									<input type="number" class="form-control" id="field1" name="bw_innings" value="{{$Bowling['bw_innings']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Balls</label>
									<input type="number" class="form-control" id="field1" name="bw_balls" value="{{$Bowling['bw_balls']}}">
								</div>
                                <div class="form-group">
									<label for="field1">Fours</label>
									<input type="number" class="form-control" id="field1" name="bw_wickets" value="{{$Bowling['bw_wickets']}}">
								</div>


								<button type="submit" class="btn btn-default">Update</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
