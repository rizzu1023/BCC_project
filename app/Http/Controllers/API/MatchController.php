<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Match;
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
}
