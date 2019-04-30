@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Match</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_AddSchedule')}}"> 
							@csrf
                                <div class="form-group"> 
									<label for="field1">Match No</label> 
									<input type="text" class="form-control" id="field1" name="match_no" placeholder="" required> 
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id">
											@foreach($team as $t)
												<option value="{{$t->team_id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id">
											@foreach($team as $t)
												<option value="{{$t->team_id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>
								<div class="form-group"> 
									<label for="field1">Time</label> 
									<input type="time" class="form-control" id="field1" name="times" placeholder="" required> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Date</label> 
									<input type="date" class="form-control" id="field1" name="dates" placeholder="" required> 
								</div>
                         
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection