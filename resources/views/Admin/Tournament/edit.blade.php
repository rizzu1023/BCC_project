@extends('Admin.layouts.base')

@section('content')
<h3 class="title1">Edit Tournament</h3>

<div class="card row">
			<div class="card-body">
					
						<div class="form-body">
							<form method="POST" action="/admin/Tournament/{{$Tournament['id']}}"> 
							@csrf
								@method('PUT')
								<div class="form-group"> 
									<label for="field1">Tournament ID</label> 
									<input type="text" class="form-control" id="field1" name="id" value="{{$Tournament['id']}}" readonly="readonly"> 
								</div>
								<div class="form-group"> 
									<label for="field1">Tournament Name</label> 
									<input type="text" class="form-control" id="field1" name="tournament_name" value="{{$Tournament['tournament_name']}}"> 
								</div>
								<div class="form-group">
									<label for="field1">Start Date</label>
									<input type="date" class="form-control" id="field1" name="start_date" required>
								</div>
								<div class="form-group">
									<label for="field1">End Date</label>
									<input type="date" class="form-control" id="field1" name="end_date" required>
								</div>
								<button type="submit" class="btn btn-success btn-block">Update</button> 

							</form> 
						</div>
			</div>
</div>

@endsection