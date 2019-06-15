@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Team</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="{{route('Team.store')}}">
							@csrf
								<div class="form-group">
									<label for="field1">Team Code</label>
									<input type="text" class="form-control" id="field1" name="team_code" placeholder="eg. MI">
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="team_name" placeholder="eg. Mumbai Indians">
								</div> 
								<div class="form-group">
									<label for="field1">Team Title</label>
									<input type="text" class="form-control" id="field1" name="team_title" placeholder="eg .2">
								</div>
								<!-- <div class="form-group">
										<label for="exampleFormControlSelect2">Select Team</label>
										<select class="form-control" id="exampleFormControlSelect2" name="tournament_id" required>
											<option value="">Select Tournament</option>
											@foreach($tournament as $t)
												<option value="{{$t->id}}">{{$t->tournament_name}}</option>
											@endforeach
										</select>
								</div> -->
								<button type="submit" class="btn btn-default">Submit</button> 
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
