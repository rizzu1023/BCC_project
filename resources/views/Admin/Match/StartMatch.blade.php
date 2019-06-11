@extends('Admin.layouts.base')

@section('css')
    <style>
        .single-name{
            display:inline-block;
            margin-left:10px;
            padding: 5px 0;
            font-size: 20px;
            /* background:orange; */
        }

        .single-div{
            background:#fff;
            border-right:1px solid gray;
        }
    </style>
@endsection
@section('content')

<div id="page-wrapper">
			<div class="main-page">
            <form method="POST" action="{{route('StartScore')}}">
            @csrf
                @php
                 $str = "t1p";
                 $i = 1
                @endphp
            <div class="row">
             <div class="col-md-6 single-div">
                <h3 class="title1">{{$schedule->Teams1->team_name}} XI</h3>
                    @foreach($players1 as $p1)
                        <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$p1->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$p1->player_name}}</div><br>
                    @php($i++)
                    @endforeach
                </div>

                <div class="col-md-6 single-div">
                <h3 class="title1">{{$schedule->Teams2->team_name}} XI</h3>

                    @foreach($players2 as $p2)
                        <input class="single-checkbox" type="checkbox" name="{{$str.$i}}" value="{{$p2->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$p2->player_name}}</div><br>
                    @php($i++)
                    @endforeach
                </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect2">Who won the Toss</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="toss">
                            <!-- <option value=""></option> -->
                                <option value="{{$schedule->team1_id}}">{{$schedule->Teams1->team_name}}</option>
                                <option value="{{$schedule->team2_id}}">{{$schedule->Teams2->team_name}}</option>
                        </select>
                </div>
                <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect2">Choose To</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="choose">
                            <!-- <option value=""></option> -->
                                <option value="Bat">Batting</option>
                                <option value="Bowl">Bowling</option>
                        </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="field1">Overs</label>
                  <input type="number" class="form-control"  name="overs" value="20">
                </div>
                </div>

                <input type="hidden" name="match_no" value="{{$schedule->match_no}}">
                <input type="hidden" name="team1_id" value="{{$schedule->team1_id}}">
                <input type="hidden" name="team2_id" value="{{$schedule->team2_id}}">



            <button type="submit" class="btn btn-default">Start</button>


            </form>
            </div>

</div>

@endsection

@section('script')
    <script src="{{asset('assets/Admin/js/checkbox.js')}}"></script>
@endsection
