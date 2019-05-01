@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Batting</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_AddBatting')}}"> 
							@csrf
								<div class="form-group"> 
									<label for="field1">Player Id</label> 
									<input type="text" class="form-control" id="field1" name="player_id" required> 
								</div>
								<div class="form-group"> 
									<label for="field1">Matches</label> 
									<input type="number" class="form-control" id="field1" name="bt_matches" required> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Innings</label> 
									<input type="number" class="form-control" id="field1" name="bt_innings" required> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Balls</label> 
									<input type="number" class="form-control" id="field1" name="bt_balls" required> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Fours</label> 
									<input type="number" class="form-control" id="field1" name="bt_fours" required> 
								</div>
								
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection