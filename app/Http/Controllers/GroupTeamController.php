<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupTeam;
use App\Models\rf;
use App\Http\Controllers\Controller;
use App\PointsTable;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;

class GroupTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Group $group)
    {
        $group_teams = GroupTeam::where('group_id', $group->id)->orderBy('points','desc')->orderBy('nrr','desc')->get();
        return view('Admin.Group.group-team-index', compact('group_teams', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Group $group)
    {
        $tournament_id = $group->tournament_id;
        $teams = Teams::whereHas('tournaments', function ($query) use ($tournament_id) {
            $query->where('tournament_id', $tournament_id);
        })->get();
        return view('Admin.Group.group-team-create', compact('group', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Group $group)
    {
        $group_team = GroupTeam::where('group_id', $group->id)->where('team_id', $request->team_id)->first();
        $team_another_group = GroupTeam::where('team_id',$request->team_id)->where('tournament_id',$group->tournament_id)->first();
        if ($group_team) {
            return back()->with('error', 'Team is Already in Group');
        }
        elseif($team_another_group){
            return back()->with('error', 'Team is Already in Another Group');
        }
        else {

            GroupTeam::create([
                'group_id' => $group->id,
                'team_id' => $request->team_id,
                'tournament_id' => $group->tournament_id,
            ]);
        }
        return back()->with('message', 'Team Added in Group');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\rf $rf
     * @return \Illuminate\Http\Response
     */
    public function show(rf $rf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @param Teams $team
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Group $group, Teams $team)
    {
        $team = GroupTeam::where('team_id',$team->id)->where('group_id',$group->id)->where('tournament_id',$group->tournament_id)->first();
        return view('Admin.Group.group-team-edit', compact('group', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Group $group
     * @param Teams $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group, Teams $team)
    {
        $data = $this->validate_data($request);
        $group_team = GroupTeam::where('team_id',$team->id)->where('group_id',$group->id)->first();
        $group_team->update($data);
        return back()->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @param Teams $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group, Teams $team)
    {
        $team = GroupTeam::where('group_id', $group->id)->where('team_id', $team->id)->first();
        $team->delete();
        return back()->with('message', 'Successfully Removed from Group');
    }

    public function validate_data(Request $request)
    {
        return $request->validate([
            'match' => 'required|numeric',
            'won' => 'required|numeric',
            'lost' => 'required|numeric',
            'points' => 'required|numeric',
            'draw' => 'required|numeric',
            'nrr' => 'required|numeric',
        ]);
    }
}
