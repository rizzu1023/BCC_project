@extends('Admin.layouts.base')

@section('topbar_link')
    <a href="/admin/LiveUpdate/{{$matchs->match_id}}/{{$matchs->tournament_id}}" class="btn btn-primary"
       style="margin-top:10px ">Live Score</a>
@endsection

@section('css')
    <style>
        .team-heading {
            background: #333;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
        }

        .team-heading .score {
            float: right;
            letter-spacing: 1px;
        }

    </style>
@endsection

@section('content')
    @php
        if($matchs->MatchDetail['0']->isBatting){
            $batting = $matchs->MatchDetail['0']->team_id;
            $bowling = $matchs->MatchDetail['1']->team_id;
        }
        else{
            $batting = $matchs->MatchDetail['1']->team_id;
            $bowling = $matchs->MatchDetail['0']->team_id;
        }
    @endphp

    <div id="page-wrapper">
        <div class="main-page">
            <div class="team-heading">
                @foreach($matchs->MatchDetail as $md)
                    @if($md->team_id == $batting)
                        <span>{{$md->Teams->team_name}}</span>
                        <span class="score">{{$md->score}}-{{$md->wicket}} ({{$md->over}}.{{$md->overball}})<span>
                    @endif
                @endforeach
            </div>
            <table class="table bg-light">
                <thead>
                <tr class="bg-warning">
                    <th>Batsman</th>
                    <th></th>
                    <th>Runs</th>
                    <th>Balls</th>
                    <th>Fours</th>
                    <th>Sixes</th>
                    <th>SR</th>
                </tr>
                </thead>
                <tbody>
                @foreach($matchs->MatchPlayers as $m)
                    @if($m->team_id == $batting)
                        <tr>
                            <td>
                                @if($m->bt_status == 10 || $m->bt_status == 11)
                                    <b>{{$m->Players->player_name}}</b>
                                @else
                                    {{$m->Players->player_name}}
                                @endif
                            </td>
                            <td style="font-size: 13px">
                                @if($m->bt_status == 'DNB')
                                    DNB
                                @elseif($m->bt_status == 0 && $m->wicket_type == 'bold')
                                    <b>b</b> {{$m->wicketPrimary->player_name}}
                                @elseif($m->bt_status == 0 && $m->wicket_type == 'lbw')
                                    <b>lbw</b> {{$m->wicketPrimary->player_name}}
                                @elseif($m->bt_status == 0 && $m->wicket_type == 'catch')
                                    <b>c</b> {{$m->wicketSecondary->player_name}}
                                    <b>b</b> {{$m->wicketPrimary->player_name}}
                                @elseif($m->bt_status == 0 && $m->wicket_type == 'stump')
                                    <b>st</b> {{$m->wicketSecondary->player_name}}
                                    <b>b</b> {{$m->wicketPrimary->player_name}}
                                @elseif($m->bt_status == 0 && $m->wicket_type == 'runout')
                                    @if($m->wicket_secondary == '--')
                                        <b>runout</b>({{$m->wicketPrimary->player_name}})
                                    @else
                                        <b>runout</b>({{$m->wicketPrimary->player_name}}/{{$m->wicketSecondary->player_name}})
                                    @endif
                                @elseif($m->bt_status == 10 || $m->bt_status == 11)
                                    batting
                                @endif
                            </td>
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

                <tr style="border-top: 1.5px solid black;">
                    <td>Total</td>
                    <td></td>
                    @foreach($matchs->MatchDetail as $md)
                        @if($md->team_id == $batting)
                            <td colspan="4">
                                {{$md->score}} ({{$md->wicket}} wickets, {{$md->over}}.{{$md->overball}} overs)
                            </td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td>Extras</td>
                    <td></td>
                    @foreach($matchs->MatchDetail as $md)
                        @if($md->team_id == $batting)
                            <td colspan="4">
                                {{$md->byes + $md->legbyes + $md->no_ball + $md->wide}} (b {{$md->byes}},
                                lb {{$md->legbyes}}, w {{$md->wide}}, nb {{$md->no_ball}})
                            </td>
                        @endif
                    @endforeach
                </tr>
                </tbody>
            </table>
            <table class="table bg-light">
                <thead>
                <tr class="bg-warning">
                    <th>Bowler</th>
                    <th></th>
                    <th>Overs</th>
                    <th>Maiden</th>
                    <th>Runs</th>
                    <th>Wicket</th>
                    <th>NB</th>
                    <th>WD</th>
                    <th>Eco</th>
                </tr>
                </thead>
                <tbody>
                @foreach($matchs->MatchPlayers as $m)
                    @if($m->team_id == $bowling)
                        @if($m->bw_status == 1 || $m->bw_status == 11)
                            <tr>
                                <td>
                                    @if($m->bw_status == 11)
                                        <b>{{$m->Players->player_name}}</b>
                                    @else
                                        {{$m->Players->player_name}}
                                    @endif
                                </td>
                                <input type="hidden" value="{{$m->player_id}}" name="attacker_id">
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                                <td>{{$m->bw_nb}}</td>
                                <td>{{$m->bw_wide}}</td>
                                <td>{{$sr}}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach

                </tbody>
            </table>


        </div>
    </div>

@endsection

@section('script')

@endsection
