<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TournamentScheduleResource;
use App\Schedule;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentScheduleController extends Controller
{
    public function getTournamentSchedules(Tournament $tournament)
    {
        $schedules = Schedule::with('Teams1','Teams2','Game')->where('tournament_id',$tournament->id)->orderBy('dates','desc')->orderBy('times','desc')->get();
        return response()->json(['status' => true, 'data' => TournamentScheduleResource::collection($schedules)]);
    }

    public function deleteSchedule($schedule_id)
    {
        $schedule = Schedule::where('id',$schedule_id)->first();
        if($schedule){
            $schedule->delete();
            return response()->json(['status' => true, 'message' => 'Schedule Successfully Deleted']);
        }
        else{
            return response()->json(['status'=>false, 'message' => 'This Schedule is Already Deleted.']);
        }

    }
}
