@extends('Admin.layouts.base')
@section('content') 

<div id="page-wrapper">
			<div class="main-page">
             

                    <div class="container">

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
                          @if($mp->Match->choose == "Bat")
                            @if($mp->Match->toss == $mp->team_id)
                      <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$mp->player_id}}"><div class="single-name">{{$i}} {{$mp->Players->player_name}}</div><br>
                      <input type="hidden" name="team_id" value="{{$mp->team_id}}">
                      @php($i++)
                            @endif
                          @else
                          @if($mp->Match->toss != $mp->team_id)
                      <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$mp->player_id}}"><div class="single-name">{{$i}} {{$mp->Players->player_name}}</div><br>
                      <input type="hidden" name="team_id" value="{{$mp->team_id}}">
                      @php($i++)
                          @endif
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




    <div class="tables ftable">
				<div class="panel-body widget-shadow">
				<div class="col-md-12 team-name"><h3>sdfasdf</h3><span>Total asdf- (12)</span></div>


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
              @foreach($matchs->MatchPlayers as $m)
                <tr>
								  <td>{{$m->Players->player_name}}</td>
								  <td>{{$m->bt_runs}}</td>
								  <td>{{$m->bt_balls}}</td>
								  <td>{{$m->bt_fours}}</td>
								  <td>{{$m->bt_sixes}}</td>
								  <td>SR</td>
								</tr>
              @endforeach
							</tbody>
						</table>
					</div>
        </div>
        </div>




            </div>

</div>

@endsection

@section('script')
    <script>
    var name = "show";
    $(document).ready(function(){
      $("#myModal").modal(name);
    });
    </script>
@endsection