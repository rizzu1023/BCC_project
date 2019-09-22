@extends('Admin.layouts.base')


@section('css')

  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
			/* float:right; */
			/* background:lightblue; */
			padding:10px;
			/* margin-right:100px; */
		}
    .bt{
      width:50px;
      height:50px;
      border:none;
      background:lightgray;
    }

	</style>
@endsection

@section('content') 


@php 
        if($matchs['choose'] == 'Bat')
          {
            if($matchs->MatchDetail['0']->team_id == $matchs['toss']){
              $batting = $matchs->MatchDetail['0']->team_id;
              $bowling = $matchs->MatchDetail['1']->team_id;
            }
            else{
              $batting = $matchs->MatchDetail['1']->team_id;
              $bowling = $matchs->MatchDetail['0']->team_id;
            }
          }
        else{
          if($matchs->MatchDetail['0']->team_id == $matchs['toss']){
              $batting = $matchs->MatchDetail['1']->team_id;
              $bowling = $matchs->MatchDetail['0']->team_id;

            }
            else{
              $batting = $matchs->MatchDetail['0']->team_id;
              $bowling = $matchs->MatchDetail['1']->team_id;
            }
        }

        $opening = true;
        foreach($matchs->MatchPlayers as $mp){
          if($mp->team_id == $batting)
            if($mp->bt_status == 10 || $mp->bt_status == 11)
              $opening = false;
        }
@endphp

<div id="page-wrapper">
	<div class="main-page">
    <!-- <div class="container"> -->

          <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                  <form id="modal">
                  @csrf
                    <div class="row">
                      <div class="col-md-6 single-div">
                          <h3>Select opening batsman</h3><br>
                         
                    <label for="exampleFormControlSelect2">Select Striker</label>
                      <select class="form-control" id="exampleFormControlSelect2" name="strike_id">
											<option value="">Select Batsman</option>
											 @foreach($matchs->MatchPlayers as $mp)
                              @if($mp->team_id == $batting)
                                <option value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                              @endif
                        @endforeach
										</select>
                    <label for="exampleFormControlSelect2">Select Non Striker</label>
                      <select class="form-control" id="exampleFormControlSelect2" name="nonstrike_id">
											<option value="">Select Batsman</option>
											 @foreach($matchs->MatchPlayers as $mp)
                              @if($mp->team_id == $batting)
                                <option value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                              @endif
                        @endforeach
										</select>

                          </div>
                      <div class="col-md-6 single-div">
                      <h3>Select Bowler</h3><br>

   										<label for="exampleFormControlSelect2">Select Bowler</label>
                      <select class="form-control" id="exampleFormControlSelect2" name="attacker_id">
											<option value="">Select Bowler</option>
											 @foreach($matchs->MatchPlayers as $mp)
                              @if($mp->team_id == $bowling)
                                <option value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                              @endif
                        @endforeach
								  		</select>
                      </div>
                    </div>
                          <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                          <input type="hidden" name="tournament" value="{{$matchs['tournament']}}">
                          <input type="hidden" name="bw_team_id" value="{{$bowling}}">
                          <input type="hidden" name="bt_team_id" value="{{$batting}}">
                          <button type="submit" class="btn btn-default btn-sm">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      
          
      @if($matchs)

        <div class="tables ftable">
          <div class="panel-body widget-shadow">
            
                @foreach($matchs->MatchDetail as $md)
                  @if($md->team_id == $batting)
                  <div class="col-md-12 team-name"><h3>{{$md->Teams->team_code}}  {{$md->score}}/{{$md->wicket}} ({{$md->over}}.{{$md->overball}})</h3></div>
                  @endif
                @endforeach

                <form id="updateForm">
                          @csrf
                    <table class="table">
                      <thead>
                        <tr class="bg-dark">
                          <th>Batsman</th>
                          <th>Runs</th>
                          <th>Balls</th>
                          <th>Fours</th>
                          <th>Sixes</th>
                          <th>SR</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($matchs->MatchPlayers as $m)
                        @if($m->team_id == $batting && ($m->bt_status == '10' || $m->bt_status == '11'))
                        <tr>
                          <td><input type="radio" id="player_id" name="player_id" value="{{$m->player_id}}" @if($m->bt_status==11) checked @endif> {{$m->Players->player_name}}</td>
                          <input type="hidden" name="team_id" value="{{$m->team_id}}">
                          <td>{{$m->bt_runs}}</td>
                          <td>{{$m->bt_balls}}</td>
                          <td>{{$m->bt_fours}}</td>
                          <td>{{$m->bt_sixes}}</td>
                          @php 
                            $sr = 0;
                            if($m->bt_balls > 0){
                            $srs = ($m->bt_runs/$m->bt_balls)*100;
                            $sr = number_format((float)$srs, 2, '.', '');
                            }
                          @endphp
                          <td>{{$sr}}</td>
                        </tr>
                        @endif
                      @endforeach
                  
                      </tbody>
                    </table>

                 
                    <table class="table">
                      <thead>
                        <tr class="bg-dark">
                          <th>Bowler</th>
                          <th>Overs</th>
                          <th>Maiden</th>
                          <th>Runs</th>
                          <th>Wicket</th>
                          <th>Eco</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($matchs->MatchPlayers as $m)
                        @if($m->team_id == $bowling && $m->bw_status == '11')
                        <tr>
                          <td>{{$m->Players->player_name}}</td>
                          <input type="hidden" value="{{$m->player_id}}" name="attacker_id">
                          <td>{{$m->bw_over}}.{{$m->bw_overball}}</td>
                          <td>{{$m->bw_maiden}}</td>
                          <td>{{$m->bw_runs}}</td>
                          <td>{{$m->bw_wickets}}</td>
                          @php 
                            $sr = 0;
                            if($m->bt_balls > 0){
                            $srs = ($m->bt_runs/$m->bt_balls)*100;
                            $sr = number_format((float)$srs, 2, '.', '');
                            }
                          @endphp
                          <td>{{$sr}}</td>
                        </tr>
                        @endif
                      @endforeach
                      <input type="hidden" name="match_id" value="{{$matchs->match_id}}">
                      <input type="hidden" name="tournament" value="{{$matchs->tournament}}">
                      </tbody>
                    </table>

                      <button id="dot" type="submit" value="8" class="bt">0</button>
                      <button id="single" type="submit" value="1" class="bt">1</button>
                      <button id="double" type="submit" value="2" class="bt">2</button>
                      <button id="triple" type="submit" value="3" class="bt">3</button>
                      <button id="four" type="submit"   value="4" class="bt">4</button>
                      <button id="six" type="submit" value="6" class="bt">6</button>
                      <br><br>

                      <button id="wide" type="submit" value="wd" class="bt">Wide + 0</button>
                      <button id="wide1" type="submit" value="wd1" class="bt">Wide + 1</button>
                      <button id="wide2" type="submit" value="wd2" class="bt">Wide + 2</button>
                      <button id="wide3" type="submit" value="wd3" class="bt">Wide + 3</button>
                      <button id="wide4" type="submit" value="wd2" class="bt">Wide + 4</button>
                      <br><br>

                      <button id="legbyes1" type="submit" value="lb1" class="bt">1 lb</button>
                      <button id="legbyes2" type="submit" value="lb2" class="bt">2 lb</button>
                      <button id="legbyes3" type="submit" value="lb3" class="bt">3 lb</button>
                      <button id="legbyes4" type="submit" value="lb4" class="bt">4 lb</button>
                      <br><br>
                      
                      <button id="byes1" type="submit" value="b1" class="bt">1 b</button>
                      <button id="byes2" type="submit" value="b2" class="bt">2 b</button>
                      <button id="byes3" type="submit" value="b3" class="bt">3 b</button>
                      <button id="byes4" type="submit" value="b4" class="bt">4 b</button>
                      <br><br>

                      <button id="noball" type="submit" value="nb" class="bt">nb + 0</button>
                      <button id="noball" type="submit" value="nb1" class="bt">nb + 1</button>
                      <button id="noball" type="submit" value="nb2" class="bt">nb + 2</button>
                      <button id="noball" type="submit" value="nb3" class="bt">nb + 3</button>
                      <button id="noball" type="submit" value="nb4" class="bt">nb + 4</button>
                      <br><br>

                </form>


          </div>
        </div>


      @endif


    </div>
  </div>
<!-- </div> -->

@endsection

@section('script')
    <script>
    $(document).ready(function(){
      if({{$opening}})
      $("#myModal").modal('show');
    });
    </script>

    <script>
    $.ajaxSetup({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    //for opening batsman selection
    $('#modal').on('submit', function(e){
        e.preventDefault();

        $.ajax({
          type : "POST",
          url : '{{Route('LiveUpdate')}}',
          data : $(this).serialize(),
          success : function(data){
             $('#myModal').modal('hide');
            //  alert(data.message);
             location.reload();
          }
        });
    });


    //for live update 
    $(".bt").on('click',function(e){
      e.preventDefault();
      var bt_team_id = "{{$batting}}";
      var bw_team_id = "{{$bowling}}";
      var match_id = $("input[name=match_id]").val();
      var tournament = $("input[name=tournament]").val();
      var attacker_id = $("input[name=attacker_id]").val();
      var player_id = $("input[name=player_id]:checked").val();
      var value = $(this).val();
      
      $.ajax({
        type : "POST",
        url : "{{route('LiveUpdate')}}",
        // headers: {'X-Requested-With': 'XMLHttpRequest'},
        data : { player_id : player_id, attacker_id : attacker_id, bt_team_id : bt_team_id, bw_team_id : bw_team_id, match_id : match_id, tournament : tournament, value : value },
        success : function(data){
          // alert(data.userjobs);
          location.reload(true);
        }  
      });
    });

    </script>
 


@endsection
   