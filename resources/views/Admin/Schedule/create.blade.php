@extends('Admin.layouts.base')

@section('content')

<div class="card row">
			<div class="card-body">
				<h3 class="title1">Add Match</h3>
						<div class="form-body">
							<form method="POST" action="{{route('tournaments.schedules.store', $tournament->id)}}">
							@csrf
                                <div class="form-group">
									<label for="field1">Match No</label>
									<input type="text" class="form-control" id="field1" name="match_no" placeholder="" required>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id" required>
											<option value="">Select Team 1</option>
											@if($teams)
											@foreach($teams as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
											@endif
										</select>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 2</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id" required>
											<option value="">Select Team 2</option>
											@if($teams)
											@foreach($teams as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
											@endif
										</select>
								</div>
								<div class="form-group">
									<label for="field1">Time</label>
									<input type="time" class="form-control" id="field1" name="times"  required>
								</div>
                                <div class="form-group">
									<label for="field1">Date</label>
									<input type="date" class="form-control" id="field1" name="dates"  required>
								</div>

								<button type="submit" class="btn btn-block btn-success">Add Match</button>
							</form>
						</div>
			</div>
</div>

@endsection
