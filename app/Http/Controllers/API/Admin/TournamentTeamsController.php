<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TournamentTeamsResource;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentTeamsController extends Controller
{
    public function getTournamentTeams($tournament_id)
    {
        $tournament = Tournament::where('id',$tournament_id)->first();
        $teams = Teams::where('tournament_id', $tournament->id)->get();
        return response()->json(['status'=>true , 'data' => TournamentTeamsResource::collection($teams) ]);
    }
}
