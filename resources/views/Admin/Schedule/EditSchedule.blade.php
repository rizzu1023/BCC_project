@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Match</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_EditSchedule')}}"> 
							@csrf
								<div class="form-group"> 
									<label for="field1">Match No</label> 
									<input type="text" class="form-control" id="field1" name="match_no" value="{{$schedule['match_no']}}" required> 
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id">
												<option value="{{$schedule['team1_id']}}">{{$schedule->Teams1->team_name}}</option>
											@foreach($team as $t)
												<option value="{{$t->team_id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id">
										    	<option value="{{$schedule['team2_id']}}">{{$schedule->Teams2->team_name}}</option>
											@foreach($team as $t)
												<option value="{{$t->team_id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>
								<div class="form-group"> 
									<label for="field1">Time</label> 
									<input type="time" class="form-control" id="field1" name="times" value="{{$schedule['times']}}" required> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Date</label> 
									<input type="date" class="form-control" id="field1" name="dates" value="{{$schedule['dates']}}" required> 
								</div>

                                <input type="hidden" value="{{$schedule['id']}}" name="id">
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection