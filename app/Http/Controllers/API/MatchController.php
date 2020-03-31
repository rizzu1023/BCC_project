<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Schedule;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function matchInfo($tournament_id,$match_id,$team1_id,$team2_id){
        $team1 = Teams::select('id','team_code','team_name')->where('id',$team1_id)->first();
        $team2 = Teams::select('id','team_code','team_name')->where('id',$team2_id)->first();

        $tournament = Tournament::where('id',$tournament_id)->first();

        $match = Schedule::where('id',$match_id)->first();

        return "hello from match info";
    }
}
