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
use App\Match;
use App\MatchDetail;
use App\GameXI;


class AdminController extends Controller
{
    public function getDashboard(){
        return view('admin/dashboard');
    }


    public function filterPlayerByTeam(Request $request){
      $player = Players::where('team_id',$request->team_id)->get();
      $team = Teams::all();
      return view('admin/Player/index',compact('player','team'));
    }
    public function filterPlayerByRole(Request $request){
      $player = Players::where('player_role',$request->player_role)->get();
      $team = Teams::all();
      return view('admin/Player/index',compact('player','team'));
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
        $schedule->tournament = "BCC2019";
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













}
