@extends('Admin.layouts.base')
 
@section('content')

<div id="page-wrapper">
			<div class="main-page">

			@include('Admin.layouts.message')

			<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <h3>Add Team</h3>
                </div>
					<div class="form-body">
							<!-- <form method="POST" action="{{route('Team.store')}}"> -->
							<form id="teamForm">
							@csrf
								<div class="form-group">
									<label for="field1">Team Code</label>
									<input type="text" class="form-control" id="field1" name="team_code" placeholder="eg. MI">
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="team_name" placeholder="eg. Mumbai Indians">
								</div> 
								<div class="form-group">
									<label for="field1">Team Title</label>
									<input type="text" class="form-control" id="field1" name="team_title" placeholder="eg .2">
								</div>
                  				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-default btn-submit">Submit</button> 
							</form>
						</div>
            </div>
          </div>
        </div>


				<h3 class="title1">Teams</h3>
                <a style="margin-bottom:20px;" id="addButton" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus"></i>Add</a>
				<div class="row">
					<form method="POST" action="{{route('teamFilter')}}">
							@csrf
							<div class="form-group col-md-4">
									<select class="form-control" name="tournament_id" onchange="this.form.submit()">
										<option value="">Tournament</option>
										@foreach($tournament as $t)
											<option value="{{$t->id}}">{{$t->tournament_name}}</option>
										@endforeach
									</select>
							</div>
					</form>
				</div>
			    <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Team_id</th>
								  <th>Team Code</th>
								  <th>Team Name</th>
								  <th>Titles</th>
								</tr>
							</thead> 
							<tbody>
                            @foreach($team as $t) 
                                <tr>
								  <td>
								  <a class="btn btn-warning btn-sm" href="/admin/Team/{{$t->id}}">Show</a>
								  <a class="btn btn-success btn-sm" href="/admin/Team/{{$t->id}}/edit">Edit</a>
								  <form style="display:inline-block" method="POST" action="/admin/Team/{{$t->id}}">
								  	@csrf
										@method('DELETE')
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>
								  </td>
								  <th scope="row">{{$t->id}}</th>
								  <td>{{$t->team_code}}</td>
								  <td>{{$t->team_name}}</td>
								  <td>{{$t->team_title}}</td>
							    </tr>
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection


@section('script')

<script>
$('#addButton').on('click', function(e){
      $("#myModal").modal('show');
});

$('#teamForm').on('submit', function(e){
	e.preventDefault();

	$.ajax({
		type : "POST",
		url : "{{route('Team.store')}}",
		data : $(this).serialize(),
		success : function(data){
			$("#myModal").modal('hide');
			location.reload();
		}
	});
});
</script>

@endsection