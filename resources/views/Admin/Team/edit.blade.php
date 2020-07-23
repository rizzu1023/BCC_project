@extends('Admin.layouts.base')

@section('content')

<div class="card row">
			<div class="card-body">
				<h3 class="title1">Edit Team</h3>

						<div class="form-body">
							<form method="POST" action="{{route('tournaments.teams.update', ['tournament' => $tournament->id, 'team' => $team->id])}}">
							@csrf
								@method('PUT')
								<div class="form-group">
									<label for="field1">Team Code</label>
									<input type="text" class="form-control" id="field1" name="team_code" value="{{$team['team_code']}}">
								</div>
								<div class="form-group">
									<label for="field1">Team Name</label>
									<input type="text" class="form-control" id="field1" name="team_name" value="{{$team['team_name']}}">
								</div>
								<div class="form-group">
									<label for="field1">Team Title</label>
									<input type="text" class="form-control" id="field1" name="team_title" value="{{$team['team_title']}}">
								</div>
                                <button type="submit" class="btn btn-success btn-block">Update</button>

                            </form>
						</div>
			</div>
</div>

@endsection
