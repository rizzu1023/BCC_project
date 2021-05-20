<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TournamentResource;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    public function createTournament(Request $request)
    {
        $rules = [
            'tournament_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
        else{
            $tournament = Tournament::create([
                'tournament_name' => $request->tournament_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => 1, //TODO : need to change
            ]);

            return response()->json(['status' => true, 'message' => 'Tournament Created Successfully.'],201);
        }


    }
    public function getTournaments()
    {
        $tournament = Tournament::get();
        return response()->json(['status'=>true , 'data' => TournamentResource::collection($tournament) ]);
    }

    public function getTournament($tournament_id)
    {
        $tournament = Tournament::where('id',$tournament_id)->first();
        return response()->json(['status' => true , 'data' => $tournament ]);
    }

    public function deleteTournament($tournament_id){
        $tournament = Tournament::where('id',$tournament_id)->first();
        $tournament->delete();
        return response()->json(['status'=>true , 'message' => "Tournament Successfully Deleted." ]);
    }
}
