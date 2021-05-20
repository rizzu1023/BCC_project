<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TournamentTeamsResource;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentTeamsController extends Controller
{
    public function getTournamentTeams($tournament_id)
    {
        $tournament = Tournament::where('id',$tournament_id)->first();
        $teams = Teams::where('tournament_id', $tournament->id)->get();
        return response()->json(['status'=>true , 'data' => TournamentTeamsResource::collection($teams) ]);
    }

    public function deleteTeam($team_id)
    {
        $team = Teams::where('id',$team_id)->first();
        $team->delete();
        return response()->json(['status'=>true , 'message' => "Team Successfully Deleted." ]);
    }

    public function createTournamentTeam(Request $request)
    {
        $rules = [
            'tournament_id' => 'required|integer|exists:tournaments,id',
            'team_code' => 'required|string',
            'team_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
        else{
            $team = Teams::create([
                'team_code' => $request->team_code,
                'team_name' => $request->team_name,
                'tournament_id' => $request->tournament_id,
                'user_id' => 1,  //TODO : need to change
            ]);

            return response()->json(['status' => true, 'message' => 'Team Created Successfully.'],201);
        }

    }
}
