<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Teams;
use App\Schedule;
use App\Players;
use App\MatchPlayers;
use App\Match;
use App\MatchDetail;
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
