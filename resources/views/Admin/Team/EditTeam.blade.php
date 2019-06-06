@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Team</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="/admin/Team/{{$team['id']}}"> 
							@csrf
								@method('PUT')
								<div class="form-group"> 
									<label for="field1">Team Id</label> 
									<input type="text" class="form-control" id="field1" name="team_id" value="{{$team['team_id']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Team Name</label> 
									<input type="text" class="form-control" id="field1" name="team_name" value="{{$team['team_name']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Team Won</label> 
									<input type="text" class="form-control" id="field1" name="team_won" value="{{$team['team_won']}}"> 
								</div> 
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection