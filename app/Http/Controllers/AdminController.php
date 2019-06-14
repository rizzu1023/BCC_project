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




//Batting BREAD Function
     public function BrowseBatting(){
        $batting = Batting::all();
        return view('admin/Batting/BrowseBatting', compact('batting'));
    }

   


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
