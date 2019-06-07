<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Players;
use App\Teams;
use App\Bowling;
use App\Batting;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Players::all();
        return view('admin/Player/BrowsePlayer',compact('player'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        return view('admin/Player/AddPlayer',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Players::create([
            'player_id' => request('player_id'),
            'player_name' => request('player_name'),
            'player_role' => request('player_role'),
            'team_id' => request('team_id')
        ]);

        $batting = new Batting;
        $batting->player_id = $request->player_id;
        $batting->save();

        $bowling = new Bowling;
        $bowling->player_id = $request->player_id;
        $bowling->save();

        return redirect::route('Players.index')->with('message','Player has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function show(Players $players)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function edit(Players $players, $id)
    {
        $player = Players::find($id);
        $team = Teams::all();
        return view('admin/Player/EditPlayer',compact('player','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $player = Players::find($id);
        $player->update([
            'player_id' => request('player_id'),
            'player_name' => request('player_name'),
            'player_role' => request('player_role'),
            'team_id' => request('team_id')
        ]);


        return redirect::route('Players.index')->with("Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Players $players)
    {
        $player = Players::find($id);
        $player->delete();

        $pid = $player->player_id;

        $bt_player = Batting::where('player_id',$pid)->first();
        $bt_player->delete();

        $bw_player = Bowling::where('player_id',$pid)->first();
        $bw_player->delete();


        return redirect::route('Players.index')->with('message','Successfully Deleted');
    }
}
