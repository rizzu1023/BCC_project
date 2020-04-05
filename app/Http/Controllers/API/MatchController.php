<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchDetailResource;
use App\Http\Resources\MatchPlayersResource;
use App\Http\Resources\PlayersResource;
use App\Match;
use App\MatchDetail;
use App\MatchPlayers;
use App\Players;
use App\Schedule;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function matchInfo($tournament_id,$match_id,$team1_id,$team2_id){
        $team1 = Teams::select('id','team_code','team_name')->where('id',$team1_id)->first();
        $team2 = Teams::select('id','team_code','team_name')->where('id',$team2_id)->first();

//        $team1_players = Players::whereHas('teams', function($query) use($team1_id){
//            $query->where('team_id', $team1_id);
//        })->get();

        $tournament = Tournament::select('tournament_name')->where('id',$tournament_id)->first();

        $match = Schedule::select('match_no','dates','times')->where('id',$match_id)->first();

        $toss = Match::where('match_id',$match_id)->first();
        $toss_team = NULL;
        if($toss)
        $toss_team = Teams::select('id','team_code','team_name')->where('id',$toss->toss)->first();

        return [
            'team1' => $team1,
            'team2' => $team2,
            'match' => $match->match_no,
            'tournament' => $tournament->tournament_name,
            'dates' => $match->dates,
            'times' => $match->times,
            'toss' => $toss_team,
        ];
    }

    public function scorecard($tournament_id,$match_id,$team1_id,$team2_id){

        $match_detail = Match::where('match_id',$match_id)->first();
        if($match_detail){
            if($match_detail->toss == $team1_id && $match_detail->choose == 'Bat'){
                $batting_team_id = $team1_id;
                $bowling_team_id = $team2_id;
            }
            else{
                $batting_team_id = $team2_id;
                $bowling_team_id = $team1_id;
            }
        }

        $team1_detail = NULL;
        $team1_batsman = [];
        $team1_notout_batsman = [];
        $team1_bowler = [];
        $team1_extras = NULL;
        $team1_score = NULL;

        $team2_detail = NULL;
        $team2_batsman = [];
        $team2_notout_batsman = [];
        $team2_bowler = [];
        $team2_extras = NULL;
        $team2_score = NULL;

        if($match_detail) {
            $team1_detail = Teams::where('id', $batting_team_id)->first();
            $team1_batsman = MatchPlayers::whereIn('bt_status', ['0', '10', '11'])->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_notout_batsman = MatchPlayers::where('bt_status', 'DNB')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_bowler = MatchPlayers::whereIn('bw_status', ['1', '11'])->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_extras = MatchDetail::select('no_ball', 'wide', 'byes', 'legbyes')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            $team1_score = MatchDetail::select('score', 'wicket', 'over', 'overball')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();


            $team2_detail = Teams::where('id',$bowling_team_id)->first();
            $team2_batsman = MatchPlayers::whereIn('bt_status',['0','10','11'])->where('team_id',$bowling_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->get();
            $team2_notout_batsman = MatchPlayers::where('bt_status','DNB')->where('team_id',$bowling_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->get();
            $team2_bowler = MatchPlayers::whereIn('bw_status',['1','11'])->where('team_id',$batting_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->get();
            $team2_extras = MatchDetail::select('no_ball','wide','byes','legbyes')->where('team_id',$bowling_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->first();
            $team2_score = MatchDetail::select('score','wicket','over','overball')->where('team_id',$bowling_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->first();

        }

        return [
            'match_detail' => $match_detail,
            'team1' => [
                'detail' => $team1_detail,
                'batsman' => MatchPlayersResource::collection($team1_batsman),
                'notout_batsman' => MatchPlayersResource::collection($team1_notout_batsman),
                'bowler' => MatchPlayersResource::collection($team1_bowler),
                'extras' => $team1_extras,
                'score' => $team1_score,
            ],
            'team2' => [
                'detail' => $team2_detail,
                'batsman' => MatchPlayersResource::collection($team2_batsman),
                'notout_batsman' => MatchPlayersResource::collection($team2_notout_batsman),
                'bowler' => MatchPlayersResource::collection($team2_bowler),
                'extras' => $team2_extras,
                'score' => $team2_score,
            ],
        ];

    }

    public function live($tournament_id,$match_id,$team1_id,$team2_id){
       $match_detail = NULL;

       $current_batsman = [];
       $current_bowler = NULL;

       $batting_team = MatchDetail::where('isBatting',1)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->first();
        if($batting_team){
            $match_detail = new MatchDetailResource($batting_team);
            $batsman = MatchPlayers::whereIn('bt_status',['10','11'])->where('team_id',$batting_team->team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->get();
            if($batsman)
            $current_batsman = MatchPlayersResource::collection($batsman);

            $bowler = MatchPlayers::where('bw_status','11')->where('team_id','<>',$batting_team->team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->first();
            if($bowler)
             $current_bowler = new MatchPlayersResource($bowler);
        }
        return [
            'match_detail' => $match_detail,
            'current_batsman' => $current_batsman,
            'current_bowler' => $current_bowler,
           ];

    }
}