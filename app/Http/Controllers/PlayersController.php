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


    public function show(Teams $team,Players $player)
    {
        $bt = Batting::where('player_id', $player->player_id)->first();
        $bw = Bowling::where('player_id', $player->player_id)->first();
        $teams = MatchPlayers::where('player_id', $player->player_id)->select('team_id')->distinct()->get();

        return view('Admin/Player/show', compact('player', 'bt', 'bw', 'teams','team'));
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
//        $player->delete();

//        $pid = $player->player_id;

//        $bt_player = Batting::where('player_id', $pid)->first();
//         $bt_player->delete();
//
//        $bw_player = Bowling::where('player_id', $pid)->first();
//         $bw_player->delete();
        $player->Teams()->detach($team);

        return back()->with('message', 'Player Removed from team');
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








    public function player_index()
    {
       $players = Players::all();
       return view('Admin.Player.playerIndex',compact('players'));
    }

    public function player_create()
    {
        return view('Admin.Player.playerCreate');
    }
    public function player_show($id)
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

    public function player_store(Request $request)
    {
        Players::create([
            'player_id' => $request->player_id,
            'player_name' => $request->player_name,
            'player_role' => $request->player_role,
        ]);

        Batting::create(request(['player_id']));
        Bowling::create(request(['player_id']));

        return redirect('/admin/players')->with('message','Player Added');

    }

    public function player_edit($id)
    {
        $player = Players::find($id);
        return view('Admin.Player.playerEdit',compact('player'));

    }

    public function player_update(Request $request,$id)
    {
        $player = Players::find($id);

        $data= request()->validate([
            'player_id' => 'required|min:2',
            'player_name' => 'required',
            'player_role' => 'required',
        ]);

        $player->update($data);
        return redirect('/admin/players')->with('message','Player Updated');
    }

    public function player_destroy($id)
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


