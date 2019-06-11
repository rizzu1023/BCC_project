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
        $team = Teams::all();
        return view('admin/Player/index',compact('player','team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        return view('admin/Player/create',compact('team'));
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
    public function show(Players $Player)
    {
        $bt = Batting::where('player_id',$Player->player_id)->first();
        $bw = Bowling::where('player_id',$Player->player_id)->first();
        return view('admin/Player/show',compact('Player','bt','bw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function edit(Players $Player)
    {
        $player = $Player;
        $team = Teams::all();
        return view('admin/Player/edit',compact('player','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Players $Player)
    {
        $data= request()->validate([
          'player_id' => 'required|min:2',
          'player_name' => 'required',
          'player_role' => 'required',
          'team_id' => 'required'
        ]);
        $bt = Batting::where('player_id',$Player->player_id)->first();
        $bw = Bowling::where('player_id',$Player->player_id)->first();

        $Player->update($data);

        $bt->player_id = $request->player_id;
        $bt->save();

        $bw->player_id = $request->player_id;
        $bw->save();

        return redirect::route('Players.index')->with('message',"Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function destroy(Players $Player)
    {
        // $player = Players::find($id);
        $Player->delete();

        $pid = $Player->player_id;

        $bt_player = Batting::where('player_id',$pid)->first();
        $bt_player->delete();

        $bw_player = Bowling::where('player_id',$pid)->first();
        $bw_player->delete();


        return redirect::route('Players.index')->with('message','Successfully Deleted');
    }
}
