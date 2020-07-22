@extends('Admin.layouts.base')

@section('content')

				<h3 class="title1">Add Tournament</h3>
				<div class=" row card">

						<div class="card-body">
							<form method="POST" action="{{route('Tournament.store')}}">
							@csrf
								<div class="form-group">
									<label for="field1">Tournament Name</label>
									<input type="text" class="form-control" id="field1" name="tournament_name" placeholder="eg. CWC19" required>
								</div>
								<div class="form-group">
									<label for="field1">Start Date</label>
									<input type="date" class="form-control" id="field1" name="start_date" required>
								</div>
								<div class="form-group">
									<label for="field1">End Date</label>
									<input type="date" class="form-control" id="field1" name="end_date" required>
								</div>
								<button type="submit" class="btn btn-success btn-block">Submit</button> 
							</form>
						</div>
				</div>

@endsection