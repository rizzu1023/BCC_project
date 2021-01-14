<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupTeamResource;
use App\Http\Resources\PointsTableResource;
use App\Models\Group;
use App\Models\GroupTeam;
use App\Tournament;
use Illuminate\Http\Request;

class PointsTableController extends Controller
{
    public function index($tournament_id)
    {
        $groups = Group::where('tournament_id',$tournament_id)->orderBy('group_name','asc')->get();
        $points_table = collect();
        foreach ($groups as $g){
            $teams = GroupTeam::where('tournament_id',$g->tournament_id)->where('group_id',$g->id)->orderBy('points','desc')->orderBy('nrr','desc')->get();
            $t = GroupTeamResource::collection($teams);
            $points_table->push(['group_name' => $g->group_name, 'teams' => $t]);
        }
        return PointsTableResource::collection($points_table);
    }
}
