@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h1 class="title1 text-center">{{$Player['player_name']}}</h1>
				<h4 class="title1 text-center" style="margin-top:10px;">{{$Player->Teams->team_name}}</h4>
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
							<td>{{$Player['player_role']}}</td>
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
							<td>@foreach($teams as $t){{$t->Teams->team_name}}, @endforeach</td>
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
