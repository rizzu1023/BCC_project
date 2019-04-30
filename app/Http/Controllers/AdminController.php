<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\Players;
use App\Schedule;


class AdminController extends Controller
{
    public function getDashboard(){
        // $var = Schedule::all()->first();
        // dd($var->Teams2->team_name);
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
        return Redirect::Route('BrowseTeam')->with('message','Successfully Added');
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
        return Redirect::Route('BrowseTeam')->with('message','Successfully Updated');
    }
    
    public function Post_DeleteTeam(Request $request , Response $response){
        $id = $request->id;
        $team = Teams::find($id);
        $team->delete();
        return Redirect::Route('BrowseTeam')->with('message','Successfully Deleted');
    }
    


    //Player Function
    public function BrowsePlayer(){
        $player = Players::all();
        return view('admin/Player/BrowsePlayer', compact('player'));
    }

    public function AddPlayer(){
        $team = Teams::all();
        return view('admin/Player/AddPlayer',compact('team'));
    }

    public function Post_AddPlayer(Request $request , Response $response){
        $player = new Players;
        $player->player_id = $request->player_id;
        $player->player_name = $request->player_name;
        $player->player_role = $request->player_role;
        $player->team_id = $request->team_id;
        $player->save();
        return Redirect::Route('BrowsePlayer')->with('message','Successfully Added');
    }


    
    public function EditPlayer($id){
        $player = Players::find($id);
        $team = Teams::all();
        return view('admin/Player/EditPlayer',compact('player','team'));
    }
    
    public function Post_EditPlayer(Request $request , Response $response){
        $player = Players::where('id',$request->id)->first();
        $player->player_id = $request->player_id;
        $player->player_name = $request->player_name;
        $player->player_role = $request->player_role;
        $player->team_id = $request->team_id;
        $player->save();
        return Redirect::Route('BrowsePlayer')->with('message','Successfully Updated');
    }
    
    public function Post_DeletePlayer(Request $request , Response $response){
        $id = $request->id;
        $player = Players::find($id);
        $player->delete();
        return Redirect::Route('BrowseSchedule')->with('message','Successfully Deleted');
    }


     //Schedule BREAD Function
     public function BrowseSchedule(){
        $schedule = Schedule::all();
        return view('admin/Schedule/BrowseSchedule', compact('schedule'));
    }

    public function AddSchedule(){
        $team = Teams::all();
        return view('admin/Schedule/AddSchedule',compact('team'));
    }

    public function Post_AddSchedule(Request $request , Response $response){
        $schedule = new Schedule;
        $schedule->match_no = $request->match_no;
        $schedule->team1_id = $request->team1_id;
        $schedule->team2_id = $request->team2_id;
        $schedule->times = $request->times;
        $schedule->dates = $request->dates;
        $schedule->tournament = "BCC";
        $schedule->save();
        return Redirect::Route('BrowseSchedule')->with('message','Successfully Added');
    }


    
    public function EditSchedule($id){
        $schedule = Schedule::find($id);
        $team = Teams::all();
        return view('admin/Schedule/EditSchedule',compact('schedule','team'));
    }
    
    public function Post_EditSchedule(Request $request , Response $response){
        $schedule = Schedule::where('id',$request->id)->first();
        $schedule->match_no = $request->match_no;
        $schedule->team1_id = $request->team1_id;
        $schedule->team2_id = $request->team2_id;
        $schedule->times = $request->times;
        $schedule->dates = $request->dates;
        $schedule->save();
        return Redirect::Route('BrowseSchedule')->with('message','Successfully Updated');
    }
    
    public function Post_DeleteSchedule(Request $request , Response $response){
        $id = $request->id;
        $schedule = Schedule::find($id);
        $schedule->delete();
        return Redirect::Route('BrowseSchedule')->with('message','Successfully Deleted');
    }
     
}
