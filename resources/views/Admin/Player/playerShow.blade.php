@extends('Admin.layouts.base')

@section('content')

<div class="card">
			<div class="card-body">
				<h1 class="title1 text-center">{{$player['player_name']}}</h1>

                <div class="col-md-8 col-md-offset-2">
                    <form action="/admin/player/add-in-team" method="post">
                        @csrf
                    <select class="form-control" id="exampleFormControlSelect2" name="team_id"
                            required onchange="this.form.submit()">
                        <option disabled selected>Add in Team</option>
                        @foreach($teams as $t)
                                <option
                                    value="{{$t->id}}">{{$t->team_name}}
                                </option>
                        @endforeach
                    </select>
                        <input type="hidden" name="player_id" value="{{$player['id']}}">
                    </form>
                    <table class="table table-sm table-striped" style="margin-top:50px;">
                        <thead>
                        <tr class="bg-dark">
                            <th scope="col">Teams</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($player_teams as $t)
                            <tr>
                                <td>{{$t->team_name}}</td>
                                <td>
                                    <form action="/admin/player/remove-from-team" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Remove</button>
                                        <input type="hidden" name="player_id" value="{{$player['id']}}">
                                        <input type="hidden" name="team_id" value="{{$t->id}}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
					<div class="col-md-8 col-md-offset-2">

					<table class="table table-sm table-striped" style="margin-top:50px;">
						<thead>
						<tr class="bg-dark">
							<th scope="col">Personal Information</th>
							<th scope="col"></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Born</td>
							<td>August 25, 1998</td>
						</tr>
						<tr>
							<td>Age</td>
							<td>20</td>
						</tr>
						<tr>
							<td>Role</td>
							<td>{{$player['player_role']}}</td>
						</tr>
						<tr>
							<td>Bowling Style</td>
							<td>Right handed</td>
						</tr>
						<tr>
							<td>Bowling Style</td>
							<td>Right Arm</td>
						</tr>
						<tr>
							<td>Teams</td>
						</tr>
						</tbody>
					</table>
				</div>


				<div class="col-md-6">

				<table class="table table-sm table-striped" style="margin-top:50px;">
					<thead>
					<tr class="bg-dark">
						<th scope="col">Batting</th>
						<th scope="col"></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Matches</td>
						<td>{{$bt['bt_matches']}}</td>
					</tr>
					<tr>
						<td>Innings</td>
						<td>{{$bt['bt_innings']}}</td>
					</tr>
					<tr>
						<td>Runs</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Balls</td>
						<td>{{$bt['bt_balls']}}</td>
					</tr>
					<tr>
						<td>Highest</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Average</td>
						<td>0</td>
					</tr>
					<tr>
						<td>SR</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Not Out</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Fours</td>
						<td>{{$bt['bt_fours']}}</td>
					</tr>
					<tr>
						<td>Sixes</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Ducks</td>
						<td>0</td>
					</tr>
					<tr>
						<td>50s</td>
						<td>0</td>
					</tr>
					<tr>
						<td>100s</td>
						<td>0</td>
					</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-6">

			<table class="table table-sm table-striped" style="margin-top:50px;">
				<thead>
				<tr class="bg-dark">
					<th scope="col">Bowling</th>
					<th scope="col"></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Matches</td>
					<td>{{$bw['bw_matches']}}</td>
				</tr>
				<tr>
					<td>Innings</td>
					<td>{{$bw['bw_innings']}}</td>
				</tr>
				<tr>
					<td>Runs</td>
					<td>0</td>
				</tr>
				<tr>
					<td>Balls</td>
					<td>{{$bw['bw_balls']}}</td>
				</tr>
				<tr>
					<td>Maidens</td>
					<td>0</td>
				</tr>
				<tr>
					<td>wickets</td>
					<td>{{$bw['bw_wickets']}}</td>
				</tr>
				<tr>
					<td>Average</td>
					<td>0</td>
				</tr>
				<tr>
					<td>Economy</td>
					<td>0</td>
				</tr>
				<tr>
					<td>SR</td>
					<td>0</td>
				</tr>
				<tr>
					<td>BBI</td>
					<td>0</td>
				</tr>
				<tr>
					<td>4w</td>
					<td>0</td>
				</tr>
				<tr>
					<td>5w</td>
					<td>0</td>
				</tr>

				</tbody>
			</table>
		</div>


			</div>
</div>

@endsection