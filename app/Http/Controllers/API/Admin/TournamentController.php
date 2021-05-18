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
        return response()->json(['status'=>true , 'data' => TournamentResource::collection($tournament) ]);
    }

    public function deleteTournament($tournament_id){
        $tournament = Tournament::where('id',$tournament_id)->first();
        $tournament->delete();
        return response()->json(['status'=>true , 'message' => "Tournament Successfully Deleted." ]);
    }
}
