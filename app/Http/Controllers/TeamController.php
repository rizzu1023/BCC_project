<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\PointsTable;
use App\Tournament;


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
        return view('admin/Team/index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = Tournament::all();
        return view('admin/Team/create',compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $t = Teams::create(request(['team_code','team_name','team_title']));
        $t->id;
        
        $team = Teams::find($t->id);
        
        $tournament = Tournament::find(request('tournament_id'));
        $team->Tournaments()->syncWithoutDetaching($tournament);

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
        return view('admin/Team/edit',compact('team'));
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
        $team = Teams::find($id);

        $team->update(request(['team_id','team_name','team_won']));

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
