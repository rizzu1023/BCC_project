@extends('Admin.layouts.base')


@section('css')
	<style>
        .tables{
            margin-top:20px;
        }
		.ftable{
			margin-top:20px;
		}
		.toss{
			margin : 10px 0;
			padding: 10px 0;
			border: 1px solid gray;
		}
		.team-name{
			/* background: lightgray; */
			padding:20px 10px;
		}
		.team-name h3{
			display: inline-block;
			margin-top:10px;
		}
		.team-name span{
			float:right;
			background:lightblue;
			padding:10px;
			margin-right:100px;
		}

	</style>
@endsection

@section('content')

<div id="page-wrapper">
			<div class="main-page">
            <div class="row">
            <div class="col-md-12">
        	<div class="col-md-2">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>Match</span>
                      <h5><strong>{{$match->match_id}}</strong></h5>
                    </div>
                </div>
        	</div>
        	<div class="col-md-2">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>Toss</span>
                      <h5><strong>{{$match->Teams->team_code}}</strong></h5>
                    </div>
                </div>
        	</div>
        	<div class="col-md-2 ">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>First</span>
                      <h5><strong>{{$match->choose}}</strong></h5>
                    </div>
                </div>
        	</div>


        	<div class="col-md-2">
        		<div class="r3_counter_box ">
                    <div class="stats">
                      <span>Overs</span>
                      <h5><strong>{{$match->overs}}</strong></h5>
                    </div>
                </div>
        	 </div>

			 <div class="col-md-2 ">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>Won</span>
                      <h5><strong>{{$match->won}}</strong></h5>
                    </div>
                </div>
        	</div>

			<div class="col-md-2 ">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <span>MOM</span>
                      <h5><strong>{{$match->mom}}</strong></h5>
                    </div>
                </div>
        	</div>
			</div>
            </div>

			<!-- <div class="row"> -->
			<div class="col-md-12">
				<div class="r3_counter_ox" style="height:30px;background:white;">
					<div class="text-center">
							<span>India Beat Australia by 31 runs<span>
					</div>
				</div>
			<!-- </div> -->
      <div class="tables ftable">
				<div class="panel-body widget-shadow">
				<div class="col-md-12 team-name"><h3>{{$match_detail[0]->Teams->team_name}}</h3><span>Total {{$match_detail[0]->score}}-{{$match_detail[0]->wicket}} ({{$match_detail[0]->over}}.{{$match_detail[0]->overball}})</span></div>


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
								  @if($sr->team_id == $match_detail[0]->team_id)
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
				<div class="col-md-12 team-name"><h3>{{$match_detail[1]->Teams->team_name}}</h3><span>Total {{$match_detail[1]->score}}-{{$match_detail[1]->wicket}} ({{$match_detail[1]->over}}.{{$match_detail[1]->overball}})</span></div>
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
								  @if($sr->team_id == $match_detail[1]->team_id)
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

						<form action="{{route('Post_DeleteResult')}}" method="POST">
								@csrf
								<input type="hidden" value="{{$match->match_id}}" name="match_id">
								<input type="hidden" value="{{$match->tournament}}" name="tournament">
								<button class="btn btn-sm btn-danger">Delete Result</button>
						</form>

@endsection
