<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupTeam;
use App\PointsTable;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PointsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Tournament $tournament
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Tournament $tournament)
    {
        $groups = Group::where('tournament_id',$tournament->id)->orderBy('group_name','asc')->get();
        $points_table = collect();
        foreach ($groups as $g){
            $teams = GroupTeam::where('tournament_id',$g->tournament_id)->where('group_id',$g->id)->get();
            $points_table->push(['group_name' => $g->group_name, 'teams' => $teams]);
        }
//        return  $points_table;
//        $points_table = GroupTeam::where('tournament_id',$tournament->id)->get();
        return view('Admin.Tournament.points-table-index',compact('points_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function show(PointsTable $pointsTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function edit(PointsTable $PointsTable)
    {
        return view('Admin/PointsTable/edit',compact('PointsTable'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointsTable $PointsTable)
    {
        $PointsTable->update([
            'match' => request('match'),
            'won' => request('won'),
            'lost' => request('lost'),
            'draw' => request('draw'),
            'points' => request('points'),
            'nrr' => request('nrr'),
        ]);

        return redirect::route('PointsTable.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointsTable $pointsTable)
    {
        //
    }
}
