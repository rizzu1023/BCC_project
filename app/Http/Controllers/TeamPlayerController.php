<?php

namespace App\Http\Controllers;

use App\Batting;
use App\Bowling;
use App\MatchPlayers;
use App\Players;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamPlayerController extends Controller
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
        $players = Players::where('user_id',auth()->user()->id)->get();
        return view('Admin.Player.team-player-create', compact('team','players'));
    }


    public function store(Request $request, Teams $team)
    {
        $data = $this->validate($request,[
            'player_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'batting_style' => 'required',
            'bowling_style' => '',
            'team_id' => 'required',
        ]);

        $this->validate($request,[
            'player_id' => 'required|unique:players',
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'batting_style' => 'required',
            'bowling_style' => '',
            'team_id' => 'required',
        ]);

        if($request['image_path'])
            $image_path = $request['image_path'];
        else
            $image_path = 'default.png';


         $player = Players::create([
             'player_id' => $request['player_id'],
             'image_path' => $image_path,
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'role' => $request['role'],
             'batting_style' => $request['batting_style'],
             'bowling_style' => $request['bowling_style'],
             'dob' => $request['dob'],
             'user_id' => auth()->user()->id,
        ]);
//        $player = Players::find($request->player_id);
        $player->Teams()->syncWithoutDetaching($team);


        Batting::create(request(['player_id']));
        Bowling::create(request(['player_id']));

        return back()->with('message',"Player has been added");
//        return redirect::route('teams.players.index',$team->id)->with('message', 'Player has been added');
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
        return view('Admin.Player.edit', compact('player', 'team'));
    }


    public function update(Request $request,Teams $team, Players $player)
    {

        $bt = Batting::where('player_id', $player->player_id)->first();
        $bw = Bowling::where('player_id', $player->player_id)->first();

        $data= request()->validate([
            'player_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'batting_style' => 'required',
            'bowling_style' => '',
            'player_image' => 'sometimes|required|mimes:png,jpeg,jpg'

        ]);

        $player->update($data);

        if($request->hasFile('player_image')){
            $player->addMediaFromRequest('player_image')->toMediaCollection();
        }

        $bt->update(request(['player_id']));
        $bw->update(request(['player_id']));

        return redirect::route('teams.players.index',$team->id)->with('message', "Successfully Updated");
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

    public function exist_team_player_create(Teams $team)
    {

        $players = Players::where('user_id',auth()->user()->id)->get();
        return view('Admin.Player.create', compact('team','players'));
    }

    public function exist_team_player_store(Request $request, Teams $team)
    {
        $player = Players::find($request->player_id);
        $player->Teams()->syncWithoutDetaching($team);
        return back()->with('message','Player added');
    }

}
