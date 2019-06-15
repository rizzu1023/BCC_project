<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tournament = Tournament::all();
        // $teams = Teams::first();

        // $teams->Tournaments()->syncWithoutDetaching($tournament);
        $Tournament = Tournament::all();
        return view('Admin/Tournament/index',compact('Tournament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin/Tournament/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tournament::create([
            'tournament_name' => request('tournament_name'),
        ]);
        return redirect::route('Tournament.index')->with('message',"Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $Tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $Tournament)
    {
        return view('Admin/Tournament/edit',compact('Tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Tournament = Tournament::find($id);
        $Tournament->update(request(['id','tournament_name']));

        return redirect::route('Tournament.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $Tournament)
    {
        $Tournament->delete();
        return redirect::route('Tournament.index')->with('message','Deleted');
    }
}
