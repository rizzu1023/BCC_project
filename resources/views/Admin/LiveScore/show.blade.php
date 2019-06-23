@extends('Admin.layouts.base')
@section('content') 

<div id="page-wrapper">
			<div class="main-page">
                    <div class="form-group">
                        <form method="POST" action="{{route('LiveScore')}}">
                        @csrf
                        @method('PUT')
                        <label for="team_name">Team Name</label>
                        <input type="text" id="team_name" value="{{$matchs[0]->team_id}}"  disabled/>

                        <label for="score">Score</label>
                        <input type="number" value="{{$matchs[0]->score}}" name="score" id="score"/>

                        <label for="wicket">Wickets</label>
                        <input type="number" value="{{$matchs[0]->wicket}}" name="wicket" id="wicket"/>

                        <input type="hidden" value="{{$matchs[0]->match_no}}" name="match_no">
                        <input type="hidden" value="{{$matchs[0]->tournament}}" name="tournament">
                        <input type="hidden" value="{{$matchs[0]->team_id}}" name="team_id">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        <form>
                        <br>

                        <form method="POST" action="{{route('LiveScore')}}">
                        @csrf
                        @method('PUT')
                        <label for="team_name">Team Name</label>
                        <input type="text" id="team_name" value="{{$matchs[1]->team_id}}"  disabled/>

                        <label for="score">Score</label>
                        <input type="number" value="{{$matchs[1]->score}}" name="score" id="score"/>

                        <label for="wicket">Wickets</label>
                        <input type="number" value="{{$matchs[1]->wicket}}" name="wicket" id="wicket"/>

                        <input type="hidden" value="{{$matchs[1]->match_no}}" name="match_no">
                        <input type="hidden" value="{{$matchs[1]->tournament}}" name="tournament">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        <form>
                    </div>

                    <div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="row">
             <div class="col-md-6 single-div">
                    @foreach($match_player as $mp)
                        <input class="single-checkbox" type="checkbox" name="" value="{{$mp->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$mp->Players->player_name}}</div><br>
                    @endforeach
                </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div> 
            </div>

</div>

@endsection

@section('script')
<script>
$(document).ready(function(){
  $("#myModal").modal('show');
});

</script>
@endsection