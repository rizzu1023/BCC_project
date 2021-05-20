<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\GroupResource;
use App\Http\Resources\Admin\PointsTableResource;
use App\Models\Group;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentPointsTableController extends Controller
{
    public function getPointsTable(Tournament $tournament)
    {
        $groups = Group::with('Teams')->where('tournament_id',$tournament->id)->get();
        return response()->json(['status'=>true, 'data' => PointsTableResource::collection($groups)]);
    }
}
