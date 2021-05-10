<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ScheduleResource;
use App\MatchDetail;
use App\Schedule;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    public function schedules(Tournament $tournament)
    {
        $schedule = Schedule::with('Game.Toss','MatchDetail','Teams1','Teams2')->where('tournament_id',$tournament->id)->orderBy('dates','asc')->orderBy('times','asc')->get();
        return ScheduleResource::collection($schedule);
    }


    public function results(Tournament $tournament){
        $results = Schedule::with('Game.Toss','MatchDetail','Teams1','Teams2')->join('games','schedules.id','games.match_id')
            ->select('schedules.id', 'games.status','schedules.team1_id','schedules.team2_id','schedules.times','schedules.dates','schedules.match_no','schedules.tournament_id')
            ->where('schedules.tournament_id',$tournament->id)
            ->where('games.status', '>', 3)
            ->get();
        return ScheduleResource::collection($results);
    }
}
