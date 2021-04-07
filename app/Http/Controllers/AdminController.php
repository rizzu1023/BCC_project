<?php

namespace App\Http\Controllers;

use App\Players;
use App\Schedule;
use App\Teams;
use App\Tournament;


class AdminController extends Controller
{

    public function getDashboard(){
        $teams = Teams::all()->count();
        $players = Players::all()->count();
        $tournaments = Tournament::all()->count();
        $matches = Schedule::all()->count();
        return view('Admin/dashboard',compact('teams','players','tournaments','matches'));
    }
}
