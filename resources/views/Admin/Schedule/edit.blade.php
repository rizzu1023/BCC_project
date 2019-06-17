@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Match</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="/admin/Schedule/{{$Schedule['id']}}"> 
							@csrf
							@method('PUT')
								<div class="form-group"> 
									<label for="field1">Match No</label> 
									<input type="text" class="form-control" id="field1" name="match_no" value="{{$Schedule['match_no']}}" requir>
									<div>{{ $errors->first('match_no')}}</div>

								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id">
												<option value="{{$Schedule['team1_id']}}">{{$Schedule->Teams1->team_name}}</option>
											@foreach($team as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								<div>{{ $errors->first('team1_id')}}</div>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id">
										    	<option value="{{$Schedule['team2_id']}}">{{$Schedule->Teams2->team_name}}</option>
											@foreach($team as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
										<div>{{ $errors->first('team2_id')}}</div>
								
								</div>
								<div class="form-group"> 
									<label for="field1">Time</label> 
									<input type="time" class="form-control" id="field1" name="times" value="{{$Schedule['times']}}" required> 
									<div>{{ $errors->first('times')}}</div>
								</div>
                                <div class="form-group"> 
									<label for="field1">Date</label> 
									<input type="date" class="form-control" id="field1" name="dates" value="{{$Schedule['dates']}}" required> 
								<div>{{ $errors->first('dates')}}</div>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Select Tournament</label>
										<select class="form-control" id="exampleFormControlSelect2" name="tournament" required>
											<option value="{{$Schedule['tournament']}}">{{$Schedule['tournament']}}</option>
											@foreach($tournament as $t)
												<option value="{{$t->tournament_name}}">{{$t->tournament_name}}</option>
											@endforeach
										</select>
								</div>

								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection