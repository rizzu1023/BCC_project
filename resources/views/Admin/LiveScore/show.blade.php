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


@php 
        if($batOrBowl['choose'] == 'Bat')
          {
            if($batOrBowl->MatchDetail['0']->team_id == $batOrBowl['toss']){
              $batting = $batOrBowl->MatchDetail['0']->team_id;
              $bowling = $batOrBowl->MatchDetail['1']->team_id;
            }
            else{
              $batting = $batOrBowl->MatchDetail['1']->team_id;
              $bowling = $batOrBowl->MatchDetail['0']->team_id;
            }
          }
        else{
          if($batOrBowl->MatchDetail['0']->team_id == $batOrBowl['toss']){
              $batting = $batOrBowl->MatchDetail['1']->team_id;
              $bowling = $batOrBowl->MatchDetail['0']->team_id;

            }
            else{
              $batting = $batOrBowl->MatchDetail['0']->team_id;
              $bowling = $batOrBowl->MatchDetail['1']->team_id;
            }
        }
@endphp

<div id="page-wrapper">
	<div class="main-page">
    <!-- <div class="container"> -->

      @if($match_player)
          <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <h3>Select two batsman</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                  <form method="POST" action="{{route('LiveScore')}}">
                  @method('PUT')
                  @csrf
                    <div class="row">
                      <div class="col-md-6 single-div">
                              @php
                                $str = "strike";
                                $i = 1;
                              @endphp
                              @foreach($match_player as $mp)
                              @if($mp->team_id == $batting)
                                <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$mp->player_id}}"><div class="single-name">{{$i}} {{$mp->Players->player_name}}</div><br>
                                <input type="hidden" name="team_id" value="{{$mp->team_id}}">
                              @php($i++)
                              @endif
                              @endforeach
                          </div>
                    </div>
                          <input type="hidden" name="match_id" value="{{$match_player[0]->match_id}}">
                          <input type="hidden" name="tournament" value="{{$match_player[0]->tournament}}">
                          <button type="submit" class="btn btn-default btn-sm">Submit</button>
                  </form>
            </div>
          </div>
        </div>

      @endif
          
      @if($matchs)

        <div class="tables ftable">
          <div class="panel-body widget-shadow">
            
                @foreach($matchs->MatchDetail as $md)
                  @if($md->team_id == $batting)
                  <div class="col-md-12 team-name"><h3>{{$md->Teams->team_name}}</h3><span>Total {{$md->score}}-{{$md->wicket}} ({{$md->overs_played}})</span></div>
                  @endif
                @endforeach

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Player Name</th>
                          <th>Runs</th>
                          <th>Balls</th>
                          <th>Fours</th>
                          <th>Sixes</th>
                          <th>SR</th>
                        </tr>
                      </thead>
                      <tbody>
                          <form action="{{route('LiveScore')}}" method="POST">
                          @csrf
                          @method('PUT')


                      @foreach($matchs->MatchPlayers as $m)
                        @if($m->team_id == $batting && $m->bt_status == '1')
                        <tr>
                          <td><input type="radio" name="player_id" value="{{$m->player_id}}" checked> {{$m->Players->player_name}}</td>
                          <td>{{$m->bt_runs}}</td>
                          <td>{{$m->bt_balls}}</td>
                          <td>{{$m->bt_fours}}</td>
                          <td>{{$m->bt_status}}</td>
                          <td>SR</td>
                        </tr>
                        @endif
                      @endforeach
                      <input type="hidden" name="match_id" value="{{$matchs->match_id}}">
                      <input type="hidden" name="tournament" value="{{$matchs->tournament}}">
                      <button type="submit" class="btn btn-sm">Submit</button>
                      </tbody>
                    </table>
          </div>
        </div>

      @endif

    </div>
  </div>
<!-- </div> -->

@endsection

@section('script')
    <script>
    var name = "show";
    $(document).ready(function(){
      $("#myModal").modal(name);
    });
    </script>
@endsection
   