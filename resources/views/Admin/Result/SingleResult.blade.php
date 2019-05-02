@extends('Admin.layouts.base')


@section('css')
	<style>
        .tables{
            margin-top:20px;
        }
		.ftable{
			margin-top:120px;
		}
		.toss{
			margin : 10px 0;
			padding: 10px 0;
			border: 1px solid gray;
		}
	</style>
@endsection

@section('content')

<div id="page-wrapper">
			<div class="main-page">
            <div class="row">
            <div class="col-md-12">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>Match</span>
                      <h5><strong>{{$toss[0]->match_no}}</strong></h5>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>Toss</span>
                      <h5><strong>{{$toss[0]->team_id}}</strong></h5>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>First</span>
                      <h5><strong>{{$toss[0]->choose}}</strong></h5>
                    </div>
                </div>
        	</div>
            
        	<div class="col-md-3 widget widget1 ">
        		<div class="r3_counter_box ">
                    <div class="stats">
                      <span>Tournament</span>
                      <h5><strong>{{$toss[0]->tournament}}</strong></h5>
                    </div>
                </div>
        	 </div>
             </div>
                <div class="tables ftable">
					<div class="panel-body widget-shadow">
				<div class="col-md-12 bg-ligh"><h3>{{$two_teams[0]->Teams->team_name}}</h3></div>

						<table class="table">
							<thead>
								<tr>
								  <th>Player Name</th>
								  <th>Runs</th>
								  <th>Balls</th>
								  <th>Fours</th>
								  <th>Sixes</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($single_result as $sr)
								  @if($sr->team_id == $two_teams[0]->team_id)
                                <tr>
								  <td>{{$sr->Players->player_name}}</td>
								  <td>{{$sr->bt_runs}}</td>
								  <td>{{$sr->bt_balls}}</td>
								  <td>{{$sr->bt_fours}}</td>
								  <td>{{$sr->bt_sixes}}</td>
								</tr>
								@endif
                            @endforeach
							</tbody>
						</table>
					</div>

					<div class="tables">
					<div class="panel-body widget-shadow">
				<div class="col-md-12 bg-ligh"><h3>{{$two_teams[1]->Teams->team_name}}</h3></div>
						<table class="table">
							<thead>
								<tr>
								  <th>Player Name</th>
								  <th>Runs</th>
								  <th>Balls</th>
								  <th>Fours</th>
								  <th>Sixes</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($single_result as $sr)
								  @if($sr->team_id == $two_teams[1]->team_id)
                                <tr>
								  <td>{{$sr->Players->player_name}}</td>
								  <td>{{$sr->bt_runs}}</td>
								  <td>{{$sr->bt_balls}}</td>
								  <td>{{$sr->bt_fours}}</td>
								  <td>{{$sr->bt_sixes}}</td>
								</tr>
								@endif
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
                    </div>

@endsection