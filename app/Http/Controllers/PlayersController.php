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

    public function index(Teams $team, Players $player)
    {
        $team_id = $team->id;
        $players = Players::whereHas('teams',function($query) use($team_id){
            $query->where('team_id',$team_id);
        })->get();
//        return $players;
//        $players = Players::where('team_id',$team->id)->orderBy('team_id', 'asc')->get();
        return view('Admin/Player/index', compact('players','team'));
    }


    public function create(Teams $team)
    {
        return view('Admin/Player/create', compact('team'));
    }


    public function store(Request $request, Teams $team)
    {
        $data = request()->validate([
            'player_id' => 'required',
            'player_name' => 'required',
            'player_role' => 'required',
        ]);

        $player = Players::create([
            'player_id' => $request->player_id,
            'player_name' => $request->player_name,
            'player_role' => $request->player_role,
        ]);

        $player->Teams()->syncWithoutDetaching($team);

        Batting::create(request(['player_id']));
        Bowling::create(request(['player_id']));

        return redirect::route('teams.players.index',$team->id)->with('message', 'Player has been added');
        // return back();
    }


    public function show(Players $Player)
    {
        $bt = Batting::where('player_id', $Player->player_id)->first();
        $bw = Bowling::where('player_id', $Player->player_id)->first();
        $teams = MatchPlayers::where('player_id', $Player->player_id)->select('team_id')->distinct()->get();
        return view('Admin/Player/show', compact('Player', 'bt', 'bw', 'teams'));
    }

    public function edit(Teams $team, Players $player)
    {
        return view('Admin/Player/edit', compact('player', 'team'));
    }


    public function update(Request $request,Teams $team, Players $player)
    {

        $bt = Batting::where('player_id', $player->player_id)->first();
        $bw = Bowling::where('player_id', $player->player_id)->first();

        $data= request()->validate([
            'player_id' => 'required|min:2',
            'player_name' => 'required',
            'player_role' => 'required',
        ]);

        $player->update($data);

        $bt->update(request(['player_id']));
        $bw->update(request(['player_id']));

        return redirect::route('teams.players.index',$team->id)->with('message', "Update Successfull");
    }


    public function destroy(Teams $team,Players $player)
    {
        // $player = Players::find($id);
        $player->delete();

        $pid = $player->player_id;

        $bt_player = Batting::where('player_id', $pid)->first();
         $bt_player->delete();

        $bw_player = Bowling::where('player_id', $pid)->first();
         $bw_player->delete();

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
        return view('Admin/Player/index', compact('player', 'team', 'id', 'player_role'));
    }

}


