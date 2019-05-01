@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Bowling Stats</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_EditBowling')}}"> 
							@csrf
								<div class="form-group"> 
									<label for="field1">Player Id</label> 
									<input type="text" class="form-control" id="field1" name="player_id" value="{{$bowling['player_id']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Matches</label> 
									<input type="number" class="form-control" id="field1" name="bw_matches" value="{{$bowling['bw_matches']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Innings</label> 
									<input type="number" class="form-control" id="field1" name="bw_innings" value="{{$bowling['bw_innings']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Balls</label> 
									<input type="number" class="form-control" id="field1" name="bw_balls" value="{{$bowling['bw_balls']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Fours</label> 
									<input type="number" class="form-control" id="field1" name="bw_wickets" value="{{$bowling['bw_wickets']}}"> 
								</div>
						

                                <input type="hidden" value="{{$bowling['id']}}" name="id">
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection