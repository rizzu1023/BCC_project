@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Add Player</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_AddPlayer')}}"> 
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
									<label for="field1">Team Id</label> 
									<input type="text" class="form-control" id="field1" name="team_id" placeholder="eg MI"> 
								</div> 
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection