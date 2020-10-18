@extends('Admin.layouts.base')

@section('css')
    <style>
        .single-name {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 0;
            font-size: 20px;
            /* background:orange; */
        }

        .single-div {
            background: #fff;
            border-right: 1px solid gray;
        }
    </style>
@endsection
@section('content')

    <div id="page-wrapper">
        <div class="main-page">
            <form method="POST" action="{{route('ScoreDetails')}}">
                @csrf
                @php
                    $str = "t1p";
                    $i = 1
                @endphp
                <div class="row">
                    <div class="col-md-6 single-div">
                        <h3 class="title1">{{$schedule->Teams1->team_name}} XI</h3>
                        @foreach($players1 as $p1)
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" class="single-checkbox custom-control-input" onchange="team1_function(this)"
                                       id="{{$p1->player_id . 'team1'}}" name="team1[]" value="{{$p1->player_id}}">
                                <label class="custom-control-label "
                                       for="{{$p1->player_id . 'team1'}}"></label>{{$loop->iteration}} {{$p1->player_name}}
                            </div>
                            {{--                        <input onchange="team1_function(this)" class="single-checkbox" type="checkbox" name="team1[]" value="{{$p1->player_id}}"><div class="single-name">{{$loop->index + 1}} {{$p1->player_name}}</div><br>--}}
                        @endforeach
                    </div>


                    <div class="col-md-6 single-div">
                        <h3 class="title1">{{$schedule->Teams2->team_name}} XI</h3>

                        @foreach($players2 as $p2)
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" class="single-checkbox custom-control-input" onchange="team2_function(this)"
                                       id="{{$p2->player_id . 'team2'}}" name="team2[]" value="{{$p2->player_id}}">
                                <label class="custom-control-label "
                                       for="{{$p2->player_id  . 'team2'}}"></label>{{$loop->iteration}} {{$p2->player_name}}
                            </div>

                            {{--                        <input onchange="team2_function(this)" class="single-checkbox" type="checkbox" name="team2[]" value="{{$p2->player_id}}"><div class="single-name"></div><br>--}}
                        @endforeach
                    </div>
                </div>
                {{--                <div class="custom-control custom-switch">--}}
                {{--                    <form id="toggle_form">--}}
                {{--                        @csrf--}}
                {{--                        <input type="checkbox" class="custom-control-input" id="test" @if(true) checked @endif name="active" onchange="toggle_function(1)">--}}
                {{--                        <label class="custom-control-label" for="test"></label>--}}
                {{--                        <input type="hidden"  name="feedback_id" value="1">--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect2">Who won the Toss</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="toss" required>
                            <!-- <option value=""></option> -->
                            <option value="{{$schedule->team1_id}}">{{$schedule->Teams1->team_name}}</option>
                            <option value="{{$schedule->team2_id}}">{{$schedule->Teams2->team_name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect2">Choose To</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="choose" required>
                            <!-- <option value=""></option> -->
                            <option value="Bat">Batting</option>
                            <option value="Bowl">Bowling</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="field1">Overs</label>
                        <input type="number" class="form-control" name="overs" value="20" required>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{$schedule->id}}">
                <input type="hidden" name="team1_id" value="{{$schedule->team1_id}}">
                <input type="hidden" name="team2_id" value="{{$schedule->team2_id}}">
                <input type="hidden" name="tournament_id" value="{{$schedule->tournament_id}}">

                <button type="submit" class="btn btn-default">Submit Details</button>


            </form>
        </div>

    </div>

@endsection

@section('script')

    <script src="{{asset('assets/Admin/js/checkbox.js')}}"></script>
@endsection
