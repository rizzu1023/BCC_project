@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
			@include('Admin.layouts.message')
				<h3 class="title1">Bowling Stats</h3>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Sr</th>
								  <th>Player</th>
								  <th>Matches</th>
								  <th>Innings</th>
								  <th>Balls</th>
								  <th>Wickets</th>
								  <th>Team</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($bowling as $b)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/Bowling/{{$b->id}}/edit">Edit</a>
								  </td>
								  <th scope="row">{{$i}}</th>
								  <td>{{$b->Players->first_name}} {{$b->Players->last_name}}</td>
								  <td>{{$b->bw_matches}}</td>
								  <td>{{$b->bw_innings}}</td>
								  <td>{{$b->bw_balls}}</td>
								  <td>{{$b->bw_wickets}}</td>
								  <td>{{$b->Players->Teams->team_name}}</td>

								</tr>
                                @php($i++)
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection
