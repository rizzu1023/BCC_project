@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Player</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-body">
							<form method="POST" action="{{route('Players.store')}}"> 
							@csrf
								<div class="form-group">
									<label for="field1">Player Id</label>
									<input type="text" class="form-control" id="field1" name="player_id" placeholder="eg. MR">
								</div>
								<div class="form-group">
									<label for="field1">Player Name</label>
									<input type="text" class="form-control" id="field1" name="player_name" placeholder="eg. Virat Kohli">
								</div>
								<div class="form-group">
									<label for="field1">Player Role</label>
									<input type="text" class="form-control" id="field1" name="player_role" placeholder="eg Batsman">
								</div>

								<div class="form-group">
										<label for="exampleFormControlSelect2">Select Team</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team_id">
											<option value="">Select Team</option>
											@foreach($team as $t)
												<option value="{{$t->id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>
								@include('Admin.layouts.errors')
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
				</div>
			</div>
</div>

@endsection
