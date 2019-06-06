<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Teams;
use App\PointsTable;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Teams::all();
        return view('admin/Team/BrowseTeam',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/Team/AddTeam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Teams;
        $team->team_id = $request->team_id;
        $team->team_name = $request->team_name;
        $team->team_won = $request->team_won;

        $team->save();

        return redirect::route('Team.index')->with('message','Team has been successfully added');

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
        $team = Teams::find($id);
        return view('admin/Team/EditTeam',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Teams::find($id)->first();
        $team->team_id = $request->team_id;
        $team->team_name = $request->team_name;
        $team->team_won = $request->team_won;

        $team->save();

        return redirect::route('Team.index')->with('message','Team has been succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Teams::find($id);
        $team->delete();

        // $pointstable = PointsTable::where('team_id',$team->team_id)->first();
        // $pointstable->delete();

        return redirect::route('Team.index')->with('message','Team has been successfully deleted');
    }
}
