<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\Players;

class AdminController extends Controller
{
    public function getDashboard(){
        $var = Teams::find(1);
        return view('admin/dashboard');
    }
    
    //Team function
    public function BrowseTeam(){
        $team = Teams::all();
        return view('admin/Team/BrowseTeam', compact('team'));
    }

    public function AddTeam(){
        return view('admin/Team/AddTeam');
    }

    public function Post_AddTeam(Request $request , Response $response){
        $team = new Teams;
        $team->team_id = $request->team_id;
        $team->team_name = $request->team_name;
        $team->team_won = $request->team_won;
        $team->save();
        return Redirect::Route('BrowseTeam');
    }


    
    public function EditTeam($id){
        $team = Teams::find($id);
        return view('admin/Team/EditTeam',compact('team'));
    }
    
    public function Post_EditTeam(Request $request , Response $response){
        $team = Teams::where('id',$request->id)->first();
        $team->team_id = $request->team_id;
        $team->team_won = $request->team_won;
        $team->team_name = $request->team_name;
        $team->save();
        return Redirect::Route('BrowseTeam');
    }
    
    public function Post_DeleteTeam(Request $request , Response $response){
        $id = $request->id;
        $team = Teams::find($id);
        $team->delete();
        return Redirect::Route('BrowseTeam');
    }
    


    //Player Function
    public function BrowsePlayer(){
        $player = Players::all();
        return view('admin/Player/BrowsePlayer', compact('player'));
    }

    public function AddPlayer(){
        return view('admin/Player/AddPlayer');
    }

    public function Post_AddPlayer(Request $request , Response $response){
        $player = new Players;
        $player->player_id = $request->player_id;
        $player->player_name = $request->player_name;
        $player->player_role = $request->player_role;
        $player->team_id = $request->team_id;
        $player->save();
        return Redirect::Route('BrowsePlayer');
    }


    
    public function EditPlayer($id){
        $player = Players::find($id);
        return view('admin/Player/EditPlayer',compact('player'));
    }
    
    public function Post_EditPlayer(Request $request , Response $response){
        $player = Players::where('id',$request->id)->first();
        $player->player_id = $request->player_id;
        $player->player_name = $request->player_name;
        $player->player_role = $request->player_role;
        $player->team_id = $request->team_id;
        $player->save();
        return Redirect::Route('BrowsePlayer');
    }
    
    public function Post_DeletePlayer(Request $request , Response $response){
        $id = $request->id;
        $player = Players::find($id);
        $player->delete();
        return Redirect::Route('BrowsePlayer');
    }
     
}
