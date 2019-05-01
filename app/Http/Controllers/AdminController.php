<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\Players;
use App\Bowling;
use App\Schedule;
use App\Batting;
use App\PointsTable;
use App\Game;
use App\GameXI;


class AdminController extends Controller
{
    public function getDashboard(){
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

        $pointstable = new PointsTable;
        $pointstable->team_id = $request->team_id;
        $pointstable->save();

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

        $pointstable = PointsTable::where('team_id',$team->team_id)->first();
        $pointstable->delete();

        return Redirect::Route('BrowseTeam')->with('message','Successfully Deleted');
    }
    

    
    //PointsTable BREAD Function
        public function BrowsePointsTable(){
            $pointstable = PointsTable::all();
            return view('admin/PointsTable/BrowsePointsTable', compact('pointstable'));
        }
    
        public function EditPointsTable($id){
            $pointstable = PointsTable::find($id);
            return view('admin/PointsTable/EditPointsTable',compact('pointstable'));
        }
    
        public function Post_EditPointsTable(Request $request , Response $response){
            $pointstable = PointsTable::where('id',$request->id)->first();
            $pointstable->match = $request->match;
            $pointstable->won = $request->won;
            $pointstable->lost = $request->lost;
            $pointstable->draw = $request->draw;
            $pointstable->points = $request->points;
            $pointstable->nrr = $request->nrr;
            $pointstable->save();
            return Redirect::Route('BrowsePointsTable')->with('message','Successfully Updated');
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

        $batting = new Batting;
        $batting->player_id = $request->player_id;
        $batting->save();

        $bowling = new Bowling;
        $bowling->player_id = $request->player_id;
        $bowling->save();

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
        
        $pid = $player->player_id;

        $bt_player = Batting::where('player_id',$pid)->first();
        $bt_player->delete();
        
        $bw_player = Bowling::where('player_id',$pid)->first();
        $bw_player->delete();
        
        return Redirect::Route('BrowsePlayer')->with('message','Successfully Deleted');
    }

//Batting BREAD Function
     public function BrowseBatting(){
        $batting = Batting::all();
        return view('admin/Batting/BrowseBatting', compact('batting'));
    }

    // public function AddBatting(){
    //     return view('admin/Batting/AddBatting');
    // }

    // public function Post_AddBatting(Request $request , Response $response){
    //     $batting = new Batting;
    //     $batting->player_id = $request->player_id;
    //     $batting->bt_matches = $request->bt_matches;
    //     $batting->bt_innings = $request->bt_innings;
    //     $batting->bt_balls = $request->bt_balls;
    //     $batting->bt_fours = $request->bt_fours;
    //     $batting->save();
    //     return Redirect::Route('BrowseBatting')->with('message','Successfully Added');
    // }


    
    public function EditBatting($id){
        $batting = Batting::find($id);
        return view('admin/Batting/EditBatting',compact('batting'));
    }
    
    public function Post_EditBatting(Request $request , Response $response){
        $batting = Batting::where('id',$request->id)->first();
        $batting->bt_matches = $request->bt_matches;
        $batting->bt_innings = $request->bt_innings;
        $batting->bt_balls = $request->bt_balls;
        $batting->bt_fours = $request->bt_fours;
        $batting->save();
        return Redirect::Route('BrowseBatting')->with('message','Successfully Updated');
    }
    
    // public function Post_DeleteBatting(Request $request , Response $response){
    //     $id = $request->id;
    //     $batting = Batting::find($id);
    //     $batting->delete();
    //     return Redirect::Route('BrowseBatting')->with('message','Successfully Deleted');
    // }


//Bowling BREAD Function
    public function BrowseBowling(){
        $bowling = Bowling::all();
        return view('admin/Bowling/BrowseBowling', compact('bowling'));
    }


    
    public function EditBowling($id){
        $bowling = Bowling::find($id);
        return view('admin/Bowling/EditBowling',compact('bowling'));
    }
    
    public function Post_EditBowling(Request $request , Response $response){
        $bowling = Bowling::where('id',$request->id)->first();
        $bowling->bw_matches = $request->bw_matches;
        $bowling->bw_innings = $request->bw_innings;
        $bowling->bw_balls = $request->bw_balls;
        $bowling->bw_wickets = $request->bw_wickets;
        $bowling->save();
        return Redirect::Route('BrowseBowling')->with('message','Successfully Updated');
    }


    
    public function StartMatch($match_no){

        $schedule  = Schedule::where('match_no',$match_no)->first();
        

        $players1 = Players::where('team_id',$schedule->team1_id)->get();
        $players2 = Players::where('team_id',$schedule->team2_id)->get();
        // dd($team1);

        return view('Admin/Match/StartMatch',compact('schedule','players1','players2'));
    }

    public function StartScore(Request $request, Response $response){
        
        for($i=1; $i<23; $i++){
            
            $var = "t1p".$i;
            if($request->$var != null){
                $obj = Players::where('player_id',$request->$var)->first();
                
                $gamexi = new GameXI;
                $gamexi->match_no = $request->match_no;
                $gamexi->team_id = $obj->Teams->team_id;
                $gamexi->player_id = $request->$var;

                $gamexi->save();

            }
        }





        $game1 = new Game;
        $game1->match_no = $request->match_no;
        $game1->team_id = $request->team1_id;
        if($request->toss == $request->team1_id){
            $game1->toss = 1;
            $game1->choose = $request->choose; 
        }
        else{
            $game1->toss = 0;
                if($request->choose == 'Bat'){
                    $game1->choose = 'Bowl';
                }
                else{
                    $game1->choose = 'Bat';
                }
        }
     
        $game1->save();

        $game2 = new Game;
        $game2->match_no = $request->match_no;
        $game2->team_id = $request->team2_id;
        if($request->toss == $request->team2_id){
            $game2->toss = 1;
            $game2->choose = $request->choose; 

        }
        else{
            $game2->toss = 0;
                if($request->choose == 'Bat'){
                    $game2->choose = 'Bowl';
                }
                else{
                    $game2->choose = 'Bat';
                }
        }
       
        $game2->save();

        dd("Done");

        
    }
}
