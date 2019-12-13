<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;

class MainController extends Controller
{
    public function GetIndex(){
    
        return view('Main/index');
    }

    public function GetPointsTable(){
        return view('Main/pointsTable');
    }

    public function GetTeams(){
        return view('Main/teams');
    }

    public function GetSchedule(){
        return view('Main/schedule');
    }

    public function GetStats(){
        return view('Main/stats');
    }

    public function players(){
        return Players::all();
    }

}
