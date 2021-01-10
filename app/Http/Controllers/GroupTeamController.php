<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupTeam;
use App\Models\rf;
use App\Http\Controllers\Controller;
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
        $group_teams = GroupTeam::where('group_id',$group->id)->get();
        return view('Admin.Group.group-team-index',compact('group_teams','group'));
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
        $teams = Teams::whereHas('tournaments',function($query) use($tournament_id){
            $query->where('tournament_id',$tournament_id);
        })->get();
        return view('Admin.Group.group-team-create',compact('group','teams'));
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
        $group_team = GroupTeam::where('group_id',$group->id)->where('team_id',$request->team_id)->first();
        if($group_team){
            return back()->with('error','Team is Already in Group');
        }
        GroupTeam::create([
            'group_id' => $group->id,
            'team_id' => $request->team_id,
        ]);
        return back()->with('message','Team Added in Group');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rf  $rf
     * @return \Illuminate\Http\Response
     */
    public function show(rf $rf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rf  $rf
     * @return \Illuminate\Http\Response
     */
    public function edit(rf $rf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rf  $rf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rf $rf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @param Teams $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group,Teams $team)
    {
        $team = GroupTeam::where('group_id',$group->id)->where('team_id',$team->id)->first();
        $team->delete();
        return back()->with('message','Successfully Deleted');
    }
}
