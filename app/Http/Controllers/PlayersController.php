<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Players;
use App\Teams;
use App\Bowling;
use App\Batting;
use App\MatchPlayers;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $player = Players::orderBy('team_id', 'asc')->get();
        $team = Teams::all();
        // dd($team);
        $id = NULL;
        $player_role = NULL;

        return view('admin/Player/index', compact('player', 'team', 'id', 'player_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        return view('admin/Player/create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Players $Player)
    {

        $Player->addPlayer();

        Batting::create(request(['player_id']));
        Bowling::create(request(['player_id']));

        return redirect::route('Players.index')->with('message', 'Player has been added');
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Players $players
     * @return \Illuminate\Http\Response
     */
    public function show(Players $Player)
    {
        $bt = Batting::where('player_id', $Player->player_id)->first();
        $bw = Bowling::where('player_id', $Player->player_id)->first();
        $teams = MatchPlayers::where('player_id', $Player->player_id)->select('team_id')->distinct()->get();
        return view('admin/Player/show', compact('Player', 'bt', 'bw', 'teams'));
    }

    public function edit(Players $Player)
    {
        $player = $Player;
        $team = Teams::all();
        return view('admin/Player/edit', compact('player', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Players $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Players $Player)
    {

        $bt = Batting::where('player_id', $Player->player_id)->first();
        $bw = Bowling::where('player_id', $Player->player_id)->first();

        $Player->updatePlayer();

        $bt->update(request(['player_id']));
        $bw->update(request(['player_id']));

        return redirect::route('Players.index')->with('message', "Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Players $players
     * @return \Illuminate\Http\Response
     */
    public function destroy(Players $Player)
    {
        // $player = Players::find($id);
        $Player->delete();

        $pid = $Player->player_id;

        $bt_player = Batting::where('player_id', $pid)->first();
        // $bt_player->delete();

        $bw_player = Bowling::where('player_id', $pid)->first();
        // $bw_player->delete();

        return back()->with('message', 'Succesfully Deleted');
    }

    public function playerFilter(Request $request)
    {
        if ($request->id && $request->player_role) {
            $player = Players::where('team_id', $request->id)->where('player_role', $request->player_role)->get();
        } elseif ($request->id || $request->player_role) {
            $player = Players::where('team_id', $request->id)->orWhere('player_role', $request->player_role)->get();
        } else {
            return redirect::route('Players.index')->with('message', 'select a filter');
        }
        $id = Teams::where('id', request('id'))->first();
        $player_role = request('player_role');
        $team = Teams::all();
        return view('admin/Player/index', compact('player', 'team', 'id', 'player_role'));
    }

}


