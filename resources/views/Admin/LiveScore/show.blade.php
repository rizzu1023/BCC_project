{{--@section('css')--}}

{{--    <meta name="csrf-token" content="{{ csrf_token() }}"/>--}}
{{--    <style>--}}

{{--        .tables {--}}
{{--            margin-top: 20px;--}}
{{--        }--}}

{{--        .ftable {--}}
{{--            margin-top: 20px;--}}
{{--        }--}}

{{--        .toss {--}}
{{--            margin: 10px 0;--}}
{{--            padding: 10px 0;--}}
{{--            border: 1px solid gray;--}}
{{--        }--}}

{{--        .team-name {--}}
{{--            /* background: lightgray; */--}}
{{--            padding-bottom: 10px;--}}
{{--        }--}}

{{--        .team-name h3 {--}}
{{--            display: inline-block;--}}
{{--            /*margin-top: 10px;*/--}}
{{--        }--}}

{{--        .team-name span {--}}
{{--            /* float:right; */--}}
{{--            /* background:lightblue; */--}}
{{--            padding: 10px;--}}
{{--            /* margin-right:100px; */--}}
{{--        }--}}

{{--        .bt {--}}
{{--            margin-top: 5px;--}}
{{--            width: 50px;--}}
{{--            height: 50px;--}}
{{--            border: 1px solid gray;--}}
{{--            background: lightgray;--}}
{{--        }--}}

{{--        #wicket_button {--}}
{{--            width: 130px;--}}
{{--            line-height: 50px;--}}
{{--            height: 50px;--}}
{{--            background: #ff6961;--}}
{{--            display: inline-block;--}}
{{--            border: 1px solid gray;--}}

{{--            cursor: pointer;--}}
{{--        }--}}

{{--        #retired_hurt, #undo, #strike_rotate {--}}
{{--            width: 130px;--}}
{{--            line-height: 50px;--}}
{{--            height: 50px;--}}
{{--            background: lightgray;--}}
{{--            display: inline-block;--}}
{{--            border: 1px solid gray;--}}
{{--            cursor: pointer;--}}

{{--        }--}}

{{--        #retired_hurt:hover {--}}
{{--            background: lightpink;--}}
{{--        }--}}

{{--        #strike_rotate:hover {--}}
{{--            background: lightpink;--}}
{{--        }--}}

{{--        #undo:hover {--}}
{{--            background: lightpink;--}}
{{--        }--}}

{{--        .bt:hover {--}}
{{--            background: lightpink;--}}
{{--        }--}}

{{--        #wicket_button:hover {--}}
{{--            background: lightpink;--}}
{{--        }--}}

{{--        .bt:disabled {--}}
{{--            cursor: not-allowed;--}}
{{--        }--}}

{{--    </style>--}}
{{--@endsection--}}

@extends('Admin.layouts.base')

@section('content')
    @php
        if($matchs->MatchDetail['0']->isBatting == '1'){
            $batting = $matchs->MatchDetail['0']->team_id;
            $bowling = $matchs->MatchDetail['1']->team_id;

            $isOver = $matchs->MatchDetail['0']->isOver;
            $current_over = $matchs->MatchDetail['0']->over;
        }
        else{
            $batting = $matchs->MatchDetail['1']->team_id;
            $bowling = $matchs->MatchDetail['0']->team_id;

            $isOver = $matchs->MatchDetail['1']->isOver;
            $current_over = $matchs->MatchDetail['1']->over;

        }

        $opening = true;
        foreach($matchs->MatchPlayers as $mp){
          if($mp->team_id == $batting)
            if($mp->bt_status == 10 || $mp->bt_status == 11)
              $opening = false;
        }
    @endphp
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            {{--              <li class="breadcrumb-item active">Product list</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    @if($matchs->status == '1' || $matchs->status == '3')
                        <a href="/admin/LiveScoreCard/{{$matchs->match_id}}/{{$matchs->tournament_id}}"
                           class="btn btn-info btn-sm"
                        >Scorecard</a>
                        <a class="btn btn-success btn-sm"
                           href="/admin/result/{{$matchs->tournament_id}}/{{$matchs->match_id}}/show">Edit</a>
                        <form id="endInningForm" style="display: inline-block; float: right;">
                            <input type="hidden" name="endInning" value="1">
                            <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                            <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">End
                                Inning
                            </button>
                        </form>
                    @elseif($matchs->status == '2')
                        <span>First Inning has Been ended</span>
                    @elseif($matchs->status == '4')
                        <span>Match has Been ended</span>

                    @endif
                </div>
                <div class="card-body pt-0">
                    <!-- Opening Modal -->
                    <div class="modal  " id="openingModal" tabindex="-1" data-backdrop="false" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Opening Batsman & Bowler</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="modal">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 single-div">
                                                <h5>Select opening batsman</h5><br>

                                                <label for="exampleFormControlSelect2">Select Striker</label>
                                                <select class="form-control" id="exampleFormControlSelect2"
                                                        name="strike_id"
                                                        required>
                                                    <option disabled selected>Select Striker</option>
                                                    @foreach($matchs->MatchPlayers as $mp)
                                                        @if($mp->team_id == $batting)
                                                            <option
                                                                value="{{$mp->player_id}}">{{$mp->Players->player_name}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <label for="exampleFormControlSelect2">Select Non Striker</label>
                                                <select class="form-control" id="exampleFormControlSelect2"
                                                        name="nonstrike_id"
                                                        required>
                                                    <option selected disabled>Select Non Striker</option>
                                                    @foreach($matchs->MatchPlayers as $mp)
                                                        @if($mp->team_id == $batting)
                                                            <option
                                                                value="{{$mp->player_id}}">{{$mp->Players->player_name}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-6 single-div">
                                                <h5>Select Bowler</h5><br>

                                                <label for="exampleFormControlSelect2">Select Bowler</label>
                                                <select class="form-control" id="exampleFormControlSelect2"
                                                        name="attacker_id"
                                                        required>
                                                    <option selected disabled>Select Bowler</option>
                                                    @foreach($matchs->MatchPlayers as $mp)
                                                        @if($mp->team_id == $bowling)
                                                            <option
                                                                value="{{$mp->player_id}}">{{$mp->Players->player_name}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                                        <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">
                                        <input type="hidden" name="bw_team_id" value="{{$bowling}}">
                                        <input type="hidden" name="bt_team_id" value="{{$batting}}">
                                        <input type="hidden" name="startInning" value="1">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if($matchs->status == '0' || $matchs->status == '2')
                        {{--            <from id="startInningForm" class="text-center" style="display: block">--}}
                        {{--                <input type="hidden" name="startInning" value="1">--}}
                        {{--                <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">--}}
                        {{--                <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">--}}
                        @if($matchs->status == '0')
                            <button class="btn btn-success btn-md startInningButton">Start 1st Inning</button>
                        @elseif($matchs->status == '2')
                            <button class="btn btn-success btn-md startInningButton">Start 2nd Inning</button>
                            <button id="undo" type="submit" value="reverse_inning" class="bt mt-1 btn btn-sm">Undo
                            </button>
                        @endif


                        {{--            </from>--}}
                    @endif

                    @if($matchs->status == '4')
                        {{--                <h4>xyz won by 20 runs</h4>--}}
                        <button id="undo" type="submit" value="reverse_inning" class="bt mt-1 btn btn-sm">Undo</button>
                @endif

                @if($matchs->status == '1' || $matchs->status == '3')
                    <!-- <div class="container"> -->

                        <!-- Over Modal -->
                        <div class="modal  " id="overModal" tabindex="-1" data-backdrop="false" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Select New Bowler</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="bowlerForm">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{--                                        <label for="exampleFormControlSelect2">Select Bowler</label>--}}
                                                    <select class="form-control" id="exampleFormControlSelect2"
                                                            name="newBowler_id"
                                                            required>
                                                        <option disabled selected>Select Bowler</option>
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $bowling)
                                                                @if($mp->bw_status != 11)
                                                                    <option
                                                                        value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                                            <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">
                                            <input type="hidden" name="bw_team_id" value="{{$bowling}}">
                                            <input type="hidden" name="bt_team_id" value="{{$batting}}">
                                            <input type="hidden" name="newOver" value="1">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- wicketModal -->
                        <div class="modal" id="wicketModal" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Select New Batsman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="newBatsmanForm">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="wicket_type">Wicket Type</label>
                                                    <select class="form-control" id="wicket_type" name="wicket_type"
                                                            required="">
                                                        <option selected disabled>Select</option>
                                                        <option value="bold">Bowled</option>
                                                        <option value="lbw">LBW</option>
                                                        <option value="catch">Catch</option>
                                                        <option value="stump">Stump</option>
                                                        <option value="runout">Run Out</option>
                                                        <option value="hitwicket">Hit Wicket</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" id="div_wicket_primary">
                                                    <label for="wicket_primary" id="label_wicket_primary"></label>
                                                    <select class="form-control" style="display: none"
                                                            id="wicket_primary"
                                                            name="wicket_primary"
                                                            required>
                                                        {{--                                            <option disabled selected>Select</option>--}}
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $bowling)
                                                                @if($mp->bw_status == '11')
                                                                    <option selected
                                                                            value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="player_id" style="display: none">
                                                    <label for="wicket_primary" id="label_wicket_primary"></label>
                                                    <select class="form-control" id="wicket_primary"
                                                            name="player_id"
                                                            required>
                                                        {{--                                            <option disabled selected>Select</option>--}}
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $batting)
                                                                @if($mp->bt_status == '11')
                                                                    <option selected
                                                                            value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{--                                    wicket_primary for runout--}}
                                                <div class="col-md-6" id="div_wicket_primary_runout"
                                                     style="display: none">
                                                    <label for="wicket_primary" id="label_wicket_primary">Run Out
                                                        By</label>
                                                    <select class="form-control" id="wicket_primary"
                                                            name="wicket_primary"
                                                            required>
                                                        <option disabled selected>Select</option>
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $bowling)
                                                                <option selected
                                                                        value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="div_wicket_secondary">
                                                    <label for="wicket_secondary" id="label_wicket_secondary"></label>
                                                    <select class="form-control" id="wicket_secondary"
                                                            name="wicket_secondary"
                                                            required disabled>
                                                        <option disabled selected>Select</option>
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $bowling)
                                                                <option
                                                                    value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6" id="batsman_runout" style="display:none;">
                                                    <label for="wicket_primary" id="label_wicket_primary">Who got
                                                        out?</label>
                                                    <select class="form-control" id="wicket_primar"
                                                            name="batsman_runout">
                                                        <option disabled selected>Select</option>
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $batting)
                                                                @if($mp->bt_status == 11 || $mp->bt_status == 10)
                                                                    <option
                                                                        value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="where_batsman_runout" style="display:none;">
                                                    <label for="wicket_primary" id="where_batsman_runout_label">Where
                                                        got
                                                        out?</label>
                                                    <select class="form-control" id="wicket_primar"
                                                            name="where_batsman_runout">
                                                        <option disabled selected>Select</option>
                                                        <option value="strike">Strike</option>
                                                        <option value="non_strike">Non-Strike</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="run_scored" style="display:none;">
                                                    <label for="wicket_primary" id="run_scored_label">Run Scored</label>
                                                    <select class="form-control" id="wicket_primar"
                                                            name="run_scored">
                                                        <option disabled selected>Select</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                                {{--                                   this is for over check for bowler--}}
                                                @foreach($matchs->MatchPlayers as $mp)
                                                    @if($mp->team_id == $bowling)
                                                        @if($mp->bw_status == '11')
                                                            <input type="hidden" value="{{$mp->player_id}}"
                                                                   name="attacker_id"/>
                                                        @endif
                                                    @endif
                                                @endforeach

                                                {{--wicket secondary--}}

                                            </div>
                                            <div id="div_batsman_cross" class="custom-control custom-switch mt-2 mr-3"
                                                 style="display: none">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="input_batsman_cross"
                                                       name="isBatsmanCross">
                                                <label class="custom-control-label" for="input_batsman_cross"></label>did
                                                batsman
                                                crossed ?
                                            </div>


                                            <div class="row" id="select_new_batsman">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlSelect2">Select new Batsman</label>
                                                    <select class="form-control" id="select_new_batsman_input"
                                                            name="newBatsman_id" required>
                                                        <option disabled selected>Select</option>
                                                        @foreach($matchs->MatchPlayers as $mp)
                                                            @if($mp->team_id == $batting)
                                                                @if($mp->bt_status == 'DNB')
                                                                    <option
                                                                        value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{--                                    <div id="all_out">--}}
                                            {{--                                        <label for="input_batsman_cross" style="margin-top: 10px;margin-left: 20px">--}}
                                            {{--                                            All Out?</label>--}}
                                            {{--                                        <input type="checkbox" name="isBatsmanCross" id="input_batsman_cross"/>--}}
                                            {{--                                    </div>--}}

                                            <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                                            <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">
                                            <input type="hidden" name="bw_team_id" value="{{$bowling}}">
                                            <input type="hidden" name="bt_team_id" value="{{$batting}}">
                                            <input type="hidden" name="value" value="W">


                                            <div class="modal-footer">
                                                <div id="all_out" class="custom-control custom-switch mt-2 mr-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="input_all_out"
                                                           name="all_out" onchange="all_out_function(this)">
                                                    <label class="custom-control-label" for="input_all_out"></label>All
                                                    Out ?
                                                </div>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-success ">Submit</button>
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                      </div>

                <div class="modal" id="retiredHurtModal" tabindex="-1" data-backdrop="false" role="dialog"

                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select New Batsman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="retiredHurtBatsmanForm">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlSelect2">Select Retired Hurt
                                                Batsman</label>
                                            <select class="form-control" id="exampleFormControlSelect2"
                                                    name="retiredHurtBatsman_id"
                                                    required>
                                                <option disabled selected>Select</option>
                                                @foreach($matchs->MatchPlayers as $mp)
                                                    @if($mp->team_id == $batting)
                                                        @if($mp->bt_status == '10' || $mp->bt_status == '11')
                                                            <option
                                                                value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlSelect2">Select new Batsman</label>
                                            <select class="form-control" id="exampleFormControlSelect2"
                                                    name="newBatsman_id"
                                                    required>
                                                <option disabled selected>Select</option>
                                                @foreach($matchs->MatchPlayers as $mp)
                                                    @if($mp->team_id == $batting)
                                                        @if($mp->bt_status == 'DNB' || $mp->bt_status == '12')
                                                            <option
                                                                value="{{$mp->player_id}}">{{$mp->Players->player_name}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="match_id" value="{{$matchs['match_id']}}">
                                    <input type="hidden" name="tournament" value="{{$matchs['tournament_id']}}">
                                    <input type="hidden" name="bw_team_id" value="{{$bowling}}">
                                    <input type="hidden" name="bt_team_id" value="{{$batting}}">
                                    <input type="hidden" name="value" value="rh">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-success ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--        </div>--}}

                @if($matchs)

                    <div class="tables">
                        @foreach($matchs->MatchDetail as $md)
                            @if($md->team_id == $batting)
                                <div class="col-md-12 team-name"><h3>{{$md->Teams->team_code}}  {{$md->score}}
                                        /{{$md->wicket}} ({{$md->over}}.{{$md->overball}})</h3>

                                </div>
                            @endif
                        @endforeach

                        <form id="updateForm">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr class="bg-dark">
                                    <th>Batsman</th>
                                    <th>R</th>
                                    <th>B</th>
                                    <th>4</th>
                                    <th>6</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($matchs->MatchPlayers as $m)
                                    @if($m->team_id == $batting && ($m->bt_status == '10' || $m->bt_status == '11'))
                                        <tr>
                                            <td><input type="radio" id="player_id" name="player_id"
                                                       value="{{$m->player_id}}"
                                                       @if($m->bt_status==11) checked @endif> {{$m->Players->player_name}}
                                            </td>
                                            <input type="hidden" name="team_id" value="{{$m->team_id}}">
                                            <td>{{$m->bt_runs}}</td>
                                            <td>{{$m->bt_balls}}</td>
                                            <td>{{$m->bt_fours}}</td>
                                            <td>{{$m->bt_sixes}}</td>

                                        </tr>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>

                            <table class="table table-responsive-sm">
                                <thead>
                                <tr class="bg-dark">
                                    <th>Bowler</th>
                                    <th>O</th>
                                    <th>M</th>
                                    <th>R</th>
                                    <th>W</th>
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

                                        </tr>
                                    @endif
                                @endforeach
                                <input type="hidden" name="match_id" value="{{$matchs->match_id}}">
                                <input type="hidden" name="tournament" value="{{$matchs->tournament_id}}">
                                </tbody>
                            </table>
                            <div class="current_over">
                                        <span><h6
                                                style="display:inline-block;font-weight: bold">Current Over : </h6></span>
                                @foreach($over as $o)

                                    @if($o->action == 'zero')
                                        <span>0</span>
                                    @elseif($o->action == 'one')
                                        <span>1</span>
                                    @elseif($o->action == 'two')
                                        <span>2</span>
                                    @elseif($o->action == 'three')
                                        <span>3</span>
                                    @elseif($o->action == 'four')
                                        <span>4</span>
                                    @elseif($o->action == 'five')
                                        <span>5</span>
                                    @elseif($o->action == 'six')
                                        <span>6</span>
                                    @elseif($o->action == 'wicket')
                                        <span>W</span>
                                    @else
                                        <span>{{$o->action}}</span>
                                    @endif
                                    @if($o->overball == 6)
                                        <span style="font-weight: bold; color: red"> | </span>
                                    @endif

                                @endforeach
                            </div>

                            {{--                            <div class="custom-control custom-switch">--}}
                            {{--                                <form id="toggle_form">--}}
                            {{--                                    @csrf--}}
                            {{--                                    <input type="checkbox" class="custom-control-input" id="test" @if(true) checked @endif name="active" onchange="toggle_function(1)">--}}
                            {{--                                    <label class="custom-control-label" for="test"></label>--}}
                            {{--                                    <input type="hidden"  name="feedback_id" value="1">--}}
                            {{--                                </form>--}}
                            {{--                            </div>--}}
                            <button id="dot" type="submit"  value="8" class="bt">0</button>
                            <button id="single" type="submit" value="1" class="bt">1</button>
                            <button id="double" type="submit" value="2" class="bt">2</button>
                            <button id="triple" type="submit" value="3" class="bt">3</button>
                            <button id="four" type="submit" value="4" class="bt">4</button>
                            <button id="five" type="submit" value="5" class="bt ">5</button>
                            <button id="six" type="submit" value="6" class="bt ">6</button>
                            <br>
                            <br>
                            <button id="wide" type="submit" value="wd" class="bt ">Wide</button>
                            <button id="noball" type="submit" value="nb" class="bt">nb</button>
{{--                            <br><br>--}}
                            <button id="wicket_button btn btn-sm btn-danger" onclick="reset_form()">Wicket</button>
                            <button id="undo" type="submit" value="undo" class="bt">Undo</button>

                            <br><br>
                            <button id="strike_rotate" type="submit" value="sr" class="bt ">Strike Rotate</button>
                            <div id="retired_hurt" class="text-center btn ">Retired Hurt</div>


                            <br><br>


                            <button id="noball" type="submit" value="nb1" class="bt">nb + 1</button>
                            <button id="noball" type="submit" value="nb2" class="bt">nb + 2</button>
                            <button id="noball" type="submit" value="nb3" class="bt">nb + 3</button>
                            <button id="noball" type="submit" value="nb4" class="bt">nb + 4</button>
                            <button id="noball" type="submit" value="nb5" class="bt">nb + 5</button>
                            <button id="noball" type="submit" value="nb6" class="bt">nb + 6</button>
                            <br><br>
                            <button id="wide1" type="submit" value="wd1" class="bt">Wide + 1</button>
                            <button id="wide2" type="submit" value="wd2" class="bt">Wide + 2</button>
                            <button id="wide3" type="submit" value="wd3" class="bt">Wide + 3</button>
                            <button id="wide4" type="submit" value="wd4" class="bt">Wide + 4</button>


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


                        </form>
                    </div>
                    {{--                </div>--}}


                @endif


                @endif
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
                {{--var opening = {!! str_replace("'", "\'", json_encode($opening)) !!};--}}
            var isOver = {!! str_replace("'", "\'", json_encode($isOver)) !!};
            var total_over = {!! str_replace("'", "\'", json_encode($matchs->overs)) !!};
            var current_over = {!! str_replace("'", "\'", json_encode($current_over)) !!};

            if (current_over == total_over) {
                $('#endInningForm').submit();
            }


            if (isOver) {
                $("#overModal").modal('show');
            }

            $('.startInningButton').on('click', function () {
                $("#openingModal").modal('show');
            });


            $('#wicket_button').on('click', function () {
                $("#wicketModal").modal('show');

                $('#div_wicket_primary').hide();
                $('#div_wicket_secondary').hide();


                // $('#all_out').on('change',function(){
                //    $('#select_new_batsman').toggle();
                //    $('#select_new_batsman_input').prop('required',false);
                // });


                $('#wicket_type').on('change', function () {
                    var wicket_type = $("#wicket_type").val();
                    if (wicket_type === 'catch') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', true);
                        $('#label_wicket_secondary').html('Catch By');
                        // $('#label_wicket_primary').html('Bowl By');
                        // $('#div_wicket_primary').show();
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_secondary').show();
                        $('#div_batsman_cross').show();
                        $('#batsman_runout').hide();
                        $('#where_batsman_runout').hide();
                        $('#run_scored').hide();


                    }
                    if (wicket_type === 'stump') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', true);
                        $('#label_wicket_secondary').html('Stumped By');
                        // $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_primary_runout').hide();
                        // $('#div_wicket_primary').show();
                        $('#div_wicket_secondary').show();
                        $('#batsman_runout').hide();
                        $('#where_batsman_runout').hide();
                        $('#run_scored').hide();
                        $('#div_batsman_cross').hide();


                    }
                    if (wicket_type === 'runout') {
                        $('#wicket_secondary').prop('disabled', false);
                        $('#wicket_secondary').prop('required', false);
                        $('#label_wicket_secondary').html('Run out By(Optional)');
                        // $('#div_wicket_primary').hide();
                        $('#div_wicket_primary_runout').show();
                        $('#div_wicket_secondary').show();
                        $('#batsman_runout').show();
                        $('#where_batsman_runout').show();
                        $('#run_scored').show();
                        $('#batsman_runout').prop('required', true);
                        $('#where_batsman_runout').prop('required', true);
                        $('#run_scored_input').prop('required', true);
                        $('#div_batsman_cross').hide();


                    }
                    if (wicket_type === 'hitwicket') {
                        $('#wicket_secondary').prop('disabled', true);
                        // $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_secondary').hide();
                        $('#div_wicket_primary_runout').hide();
                        // $('#div_wicket_primary').show();
                        $('#batsman_runout').hide();
                        $('#where_batsman_runout').hide();
                        $('#run_scored').hide();
                        $('#div_batsman_cross').hide();


                    }
                    if (wicket_type === 'bold') {
                        $('#wicket_secondary').prop('disabled', true);
                        // $('#label_wicket_primary').html('Bowled By');
                        $('#div_wicket_secondary').hide();
                        $('#div_wicket_primary_runout').hide();
                        $('#div_wicket_primary').show();
                        $('#batsman_runout').hide();
                        $('#where_batsman_runout').hide();
                        $('#run_scored').hide();
                        $('#div_batsman_cross').hide();


                    }
                    if (wicket_type === 'lbw') {
                        $('#wicket_secondary').prop('disabled', true);
                        // $('#label_wicket_primary').html('Bowl By');
                        $('#div_wicket_primary_runout').hide();
                        // $('#div_wicket_primary').show();
                        $('#div_wicket_secondary').hide();
                        $('#batsman_runout').hide();
                        $('#where_batsman_runout').hide();
                        $('#run_scored').hide();
                        $('#div_batsman_cross').hide();


                    }
                });

            });


        });


        $('#retired_hurt').on('click', function () {
            $("#retiredHurtModal").modal('show');
        });

        {{--    </script>--}}
        {{----}}
        //     <script>

        $(document).ready(function () {
            resetForms();
        });

        function reset_form() {
            $('#newBatsmanForm').trigger('reset');
        }

        function resetForms() {
            $('#newBatsmanForm').trigger('reset');
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#endInningForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    // $('#overModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });

        $('#bowlerForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#overModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });

        // for wicket
        $('#newBatsmanForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#wicketModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });

        $('#retiredHurtBatsmanForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#retiredHurtModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });


        //for opening batsman selection
        $('#modal').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '{{Route('LiveUpdate')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#bowlerModal').modal('hide');
                    //  alert(data.message);
                    location.reload();
                }
            });
        });


        //for live update
        $(".bt").on('click', function (e) {
            e.preventDefault();
            var bt_team_id = "{{$batting}}";
            var bw_team_id = "{{$bowling}}";
            var match_id = $("input[name=match_id]").val();
            var tournament = $("input[name=tournament]").val();
            var attacker_id = $("input[name=attacker_id]").val();
            var player_id = $("input[name=player_id]:checked").val();
            var value = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{route('LiveUpdate')}}",
                // headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: {
                    player_id: player_id,
                    attacker_id: attacker_id,
                    bt_team_id: bt_team_id,
                    bw_team_id: bw_team_id,
                    match_id: match_id,
                    tournament: tournament,
                    value: value
                },
                success: function (data) {
                    $('#newBatsmanForm').trigger('reset');
                    location.reload(true);
                }
            });
        });


        $('.bt').on('click', function () {
            $('.bt').prop('disabled', true);
        });


        function all_out_function(object) {
            if ($(object).is(':checked')) {
                $('#select_new_batsman_input').prop('required', false);
            } else {
                $('#select_new_batsman_input').prop('required', true);
            }
        }
    </script>
@endsection
