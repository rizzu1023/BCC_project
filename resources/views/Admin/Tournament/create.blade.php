@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Tournament</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="{{route('Tournament.store')}}">
							@csrf
								<div class="form-group">
									<label for="field1">Tournament Name</label>
									<input type="text" class="form-control" id="field1" name="tournament_name" placeholder="eg. CWC19" required>
								</div>
								<button type="submit" class="btn btn-default">Submit</button> 
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
