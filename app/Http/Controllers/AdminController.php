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
        // dd($var->Players->find(1)->player_name);
        return view('admin/dashboard');
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

    public function BrowseTeam(){
        $team = Teams::all();
        return view('admin/Team/BrowseTeam', compact('team'));
    }

    public function Post_DeleteTeam(Request $request , Response $response){
        $id = $request->id;
        $team = Teams::find($id);
        $team->delete();
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

    
}
