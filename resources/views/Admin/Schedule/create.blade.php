@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Match</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
				<div class="form-body">
				<form method="POST" action="{{route('scheduleTournament')}}">
				@csrf
				<div class="form-group">
										<label for="exampleFormControlSelect2">Select Tournament</label>
										<select onchange="this.form.submit()" class="form-control" id="exampleFormControlSelect2" name="tournament_id" required>
											<option value="">Select Tournament</option>
											@foreach($tournament as $t)
												<option value="{{$t->id}}">{{$t->tournament_name}}</option>
											@endforeach
										</select>
								</div>
				</form>
				</div>
						<div class="form-body">
							<form method="POST" action="{{route('Schedule.store')}}"> 
							@csrf
                                <div class="form-group"> 
									<label for="field1">Match No</label> 
									<input type="text" class="form-control" id="field1" name="match_no" placeholder="" required> 
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 1</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team1_id" required>
											<option value="">Select Team 1</option>
											@if($team)
											@foreach($team as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
											@endif
										</select>
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Team 2</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team2_id" required>
											<option value="">Select Team 2</option>
											@if($team)
											@foreach($team as $t)
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
								@if($tournament_name)
								<input type="hidden" value="{{$tournament_name}}" name="tournament">
								@endif
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection