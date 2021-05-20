<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\GroupResource;
use App\Models\Group;
use App\Models\GroupTeam;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentGroupController extends Controller
{


    public function getTournamentGroups(Tournament $tournament)
    {
        $groups = Group::where('tournament_id', $tournament->id)->get();
        return response()->json(['status' => true, 'data' => GroupResource::collection($groups)]);
    }

    public function createTournamentGroup(Request $request)
    {
        $rules = [
            'tournament_id' => 'required|integer|exists:tournaments,id',
            'group_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $group = Group::create([
                'tournament_id' => $request->tournament_id,
                'group_name' => $request->group_name,
            ]);

            return response()->json(['status' => true, 'message' => 'Group Created Successfully.'], 201);
        }
    }

    public function updateTournamentGroup(Request $request)
    {
        $data = $this->validate_data($request);
        $group->update([
            'group_name' => $request->group_name,
        ]);
        return "success";
    }


    public function deleteGroup($group_id)
    {
        $group = Group::find($group_id);
        if($group){
            $group_team = GroupTeam::where('group_id', $group_id)->first();
            if ($group_team) {
                return response()->json(['status' => false, 'message' => 'First remove teams from this group.']);
            } else {
                $group->delete();
                return response()->json(['status' => true, 'message' => 'Group Deleted Successfully.']);
            }
        }
        else{
            return response()->json(['status' => false, 'message' => 'Group does not exists.']);
        }

    }
}
