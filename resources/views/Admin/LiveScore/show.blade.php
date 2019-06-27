@extends('Admin.layouts.base')
@section('content') 

<div id="page-wrapper">
			<div class="main-page">
             

                    <div class="container">

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
                      <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$mp->player_id}}"><div class="single-name">{{$i}} {{$mp->Players->player_name}}{{$mp->Match->choose}}</div><br>
                      @php($i++)
                            @endif
                          @else
                          @if($mp->Match->toss != $mp->team_id)
                      <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$mp->player_id}}"><div class="single-name">{{$i}} {{$mp->Players->player_name}}{{$mp->Match->choose}}</div><br>
                      @php($i++)
                          @endif
                          @endif
                      @endforeach
                  </div>
            </div>
                  <button type="submit" class="btn btn-default btn-sm">Submit</button>
           </form>
      </div>
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