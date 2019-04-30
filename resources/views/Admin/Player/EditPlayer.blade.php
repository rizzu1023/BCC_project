@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Player</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_EditPlayer')}}"> 
							@csrf
								<div class="form-group"> 
									<label for="field1">Player Id</label> 
									<input type="text" class="form-control" id="field1" name="player_id" value="{{$player['player_id']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Player Name</label> 
									<input type="text" class="form-control" id="field1" name="player_name" value="{{$player['player_name']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Player Role</label> 
									<input type="text" class="form-control" id="field1" name="player_role" value="{{$player['player_role']}}"> 
								</div>
								<div class="form-group">
										<label for="exampleFormControlSelect2">Select Team</label>
										<select class="form-control" id="exampleFormControlSelect2" name="team_id">
											<option value="">Select Team</option>
											@foreach($team as $t)
												<option value="{{$t->team_id}}">{{$t->team_name}}</option>
											@endforeach
										</select>
								</div>

                                <input type="hidden" value="{{$player['id']}}" name="id">
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection