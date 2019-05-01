@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Points Table Edit</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-body">
							<form method="POST" action="{{route('Post_EditPointsTable')}}"> 
							@csrf
								<div class="form-group"> 
									<label for="field1">Team Id</label> 
									<input type="text" class="form-control" id="field1" value="{{$pointstable['team_id']}}" disabled> 
								</div>
								<div class="form-group"> 
									<label for="field1">Team Name</label> 
									<input type="text" class="form-control" id="field1" value="{{$pointstable->Teams->team_name}}" disabled> 
								</div>
								<div class="form-group"> 
									<label for="field1">Match</label> 
									<input type="number" class="form-control" id="field1" name="match" value="{{$pointstable['match']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Won</label> 
									<input type="number" class="form-control" id="field1" name="won" value="{{$pointstable['won']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Lost</label> 
									<input type="number" class="form-control" id="field1" name="lost" value="{{$pointstable['lost']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">Draw</label> 
									<input type="number" class="form-control" id="field1" name="draw" value="{{$pointstable['draw']}}"> 
								</div>
                                <div class="form-group">
									<label for="field1">Points</label> 
									<input type="number" class="form-control" id="field1" name="points" value="{{$pointstable['points']}}"> 
								</div>
                                <div class="form-group"> 
									<label for="field1">NRR</label> 
									<input type="number" class="form-control" id="field1" name="nrr" value="{{$pointstable['nrr']}}"> 
								</div>
						

                                <input type="hidden" value="{{$pointstable['id']}}" name="id">
								<button type="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
				</div>
			</div>
</div>

@endsection