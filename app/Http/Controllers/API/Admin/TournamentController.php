<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TournamentResource;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function getTournaments()
    {
        $tournament = Tournament::all();
        return TournamentResource::collection($tournament);
    }
}
