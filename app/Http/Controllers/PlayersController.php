<?php

namespace App\Http\Controllers;


use App\Tournament;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Players;
use App\Teams;
use App\Bowling;
use App\Batting;
use App\MatchPlayers;

class PlayersController extends Controller
{
    public function index()
    {
       $players = Players::where('user_id' , auth()->user()->id)->get();
       return view('Admin.Player.playerIndex',compact('players'));
    }

    public function create()
    {
        return view('Admin.Player.playerCreate');
    }
    public function show($id)
    {
        $player = Players::find($id);
        $bt = NULL;
        $bw = NULL;

        $player_teams = Teams::whereHas('players',function($query) use($id){
            $query->where('player_team.player_id',$id);
        })->get();

        $teams = Teams::all();

        return view('Admin.Player.playerShow',compact('player','bt','bw','player_teams','teams'));
    }

    public function store(Request $request)
    {
        Players::create([
            'player_id' => $request->player_id,
            'player_name' => $request->player_name,
            'player_role' => $request->player_role,
            'user_id' => auth()->user()->id,
        ]);

        Batting::create(request(['player_id']));
        Bowling::create(request(['player_id']));

        return back()->with('message','Player Added');
//        return redirect('/admin/player')->with('message','Player Added');

    }

    public function edit($id)
    {
        $player = Players::find($id);
        return view('Admin.Player.playerEdit',compact('player'));

    }

    public function update(Request $request,$id)
    {
        $player = Players::find($id);

        $data= request()->validate([
            'player_id' => 'required|min:2',
            'player_name' => 'required',
            'player_role' => 'required',
        ]);

        $player->update($data);
        return redirect('/admin/player')->with('message','Player Updated');
    }

    public function destroy($id)
    {
        $player = Players::find($id);
        $player->delete();

        $pid = $player->player_id;

        $bt_player = Batting::where('player_id', $pid)->first();
        $bt_player->delete();

        $bw_player = Bowling::where('player_id', $pid)->first();
        $bw_player->delete();

        $teams = Teams::all();
        $player->Teams()->detach($teams);

        return back()->with('message','Player Deleted');
    }


    public function add_in_team(Request $request)
    {
        $player = Players::find($request->player_id);
        $team = Teams::find($request->team_id);
        $player->Teams()->syncWithoutDetaching($team);
        return back()->with('message','Successfully added in Team');
    }

    public function remove_from_team(Request $request)
    {
        $player = Players::find($request->player_id);
        $team = Teams::find($request->team_id);
        $player->Teams()->detach($team);
        return back()->with('message','Successfully removed from Team');
    }

}


