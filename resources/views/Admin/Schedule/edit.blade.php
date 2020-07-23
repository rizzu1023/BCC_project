@extends('Admin.layouts.base')

@section('content')

<div class="card">
			<div class="card-body">
				<h3 class="title1">Edit Match</h3>

						<div class="form-body">
							<form method="POST" action={{ route('tournaments.schedules.update', ['schedule' => $schedule['id'],'tournament' => $tournament->id]) }}>
							@csrf
							@method('PUT')
								<div class="form-group">
									<label for="field1">Match No</label>
									<input type="text" class="form-control" id="field1" name="match_no" value="{{$schedule['match_no']}}" required>
									<div>{{ $errors->first('match_no')}}</div>

								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id">
												<option value="{{$schedule['team1_id']}}">{{$schedule->Teams1->team_name}}</option>
											@foreach($teams as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								<div>{{ $errors->first('team1_id')}}</div>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 2</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id">
										    	<option value="{{$schedule['team2_id']}}">{{$schedule->Teams2->team_name}}</option>
											@foreach($teams as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
										<div>{{ $errors->first('team2_id')}}</div>

								</div>
								<div class="form-group">
									<label for="field1">Time</label>
									<input type="time" class="form-control" id="field1" name="times" value="{{$schedule['times']}}" required>
									<div>{{ $errors->first('times')}}</div>
								</div>
                                <div class="form-group">
									<label for="field1">Date</label>
									<input type="date" class="form-control" id="field1" name="dates" value="{{$schedule['dates']}}" required>
								<div>{{ $errors->first('dates')}}</div>
								</div>

                               <input type="hidden" name="tournament_id" value="{{$tournament->id}}">


								<button type="submit" class="btn btn-success btn-block">Update</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
