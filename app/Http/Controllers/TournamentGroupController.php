<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $tournament
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Tournament $tournament)
    {
        $groups = Group::where('tournament_id',$tournament->id)->get();
        return view('Admin.Tournament.tournament-group-index',compact('tournament','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Admin.Tournament.tournament-group-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Tournament $tournament
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Tournament $tournament,Request $request)
    {
        $data = $this->validate_data($request);
        $group = Group::create([
            'tournament_id' => $tournament->id,
            'group_name' => $request->group_name,
        ]);
        return response()->json(['data' => 'success', 'group' => $group]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Group $group
     * @return string
     */
    public function update(Request $request, Group $group)
    {
        $data = $this->validate_data($request);
        $group->update([
            'group_name' => $request->group_name,
        ]);
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Group $group)
    {
        $grp = $group;
        $group->delete();
        return response()->json(['data' => 'success','group' => $grp]);
    }

    public function validate_data(Request $request)
    {
        return $request->validate([
            'group_name' => 'required',
        ]);
    }
}
