@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Edit Tournament</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="/admin/Tournament/{{$Tournament['id']}}"> 
							@csrf
								@method('PUT')
								<div class="form-group"> 
									<label for="field1">Tournament ID</label> 
									<input type="text" class="form-control" id="field1" name="id" value="{{$Tournament['id']}}"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Tournament Name</label> 
									<input type="text" class="form-control" id="field1" name="tournament_name" value="{{$Tournament['tournament_name']}}"> 
								</div>
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection