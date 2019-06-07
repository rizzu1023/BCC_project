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
									<label for="field1">Team Id</label>
									<input type="text" class="form-control" id="field1" name="team_id" placeholder="eg. MI">
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="team_name" placeholder="eg. Mumbai Indians">
								</div>
								<div class="form-group">
									<label for="field1">Team Won</label>
									<input type="text" class="form-control" id="field1" name="team_won" placeholder="eg .2">
								</div>
								<button type="submit" class="btn btn-default">Submit</button> 
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
