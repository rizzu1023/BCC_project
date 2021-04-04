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

    public function index(Tournament $tournament)
    {
        $schedule = Schedule::with('Game','MatchDetail','Teams1','Teams2')->where('tournament_id',$tournament->id)->orderBy('dates','asc')->orderBy('times','asc')->get();
        return ScheduleResource::collection($schedule);
    }


    public function results($tournament_id){
        $schedule = Schedule::with('Game','MatchDetail','Teams1','Teams2')->where('tournament_id',$tournament_id)->get();
        return ScheduleResource::collection($schedule);
    }
}
