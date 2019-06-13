<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Match;
use App\MatchDetail;
use App\Players;
use App\GameXI;
use App\Schedule;

class MatchController extends Controller
{
  public function StartMatch($match_no){

      $schedule  = Schedule::where('match_no',$match_no)->first();


      $players1 = Players::where('team_id',$schedule->team1_id)->get();
      $players2 = Players::where('team_id',$schedule->team2_id)->get();

      return view('Admin/Match/StartMatch',compact('schedule','players1','players2'));
  }


  public function StartScore(Request $request){
    for($i=1; $i<23; $i++){

        $var = "t1p".$i;
        if($request->$var != null){
            $obj = Players::where('player_id',$request->$var)->first();
            $gamexi = new GameXI;
            $gamexi->match_no = $request->match_no;
            $gamexi->team_id = $obj->Teams->team_id;
            $gamexi->player_id = $request->$var;
            $gamexi->tournament = 'BCC2019';

            $gamexi->save();

        }
      }

           $match = new Match;
           $match->match_no = $request->match_no;
           $match->overs = $request->overs;
           $match->tournament = 'BCC2019';
           $match->toss = $request->toss;
           $match->choose = $request->choose;


           // $match->won = $request->won;
           // $match->description = $request->description;
           // $match->mom = $request->mom;
           $match->save();

           $game_d1 = new MatchDetail;
           $game_d1->match_no = $request->match_no;
           $game_d1->team_id = $request->team1_id;
           $game_d1->tournament = "BCC2019";
           // $game_d1->score = $request->score;
           // $game_d1->wicket = $request->wicket;
           // $game_d1->overs_played = $request->overs_played;
           $game_d1->save();

           $game_d2 = new MatchDetail;
           $game_d2->match_no = $request->match_no;
           $game_d2->team_id = $request->team2_id;
           $game_d2->tournament = "BCC2019";

           $game_d2->save();


          return "done";
    }

    public function BrowseResult(){
        $result= MatchDetail::where('tournament','BCC2019')->orderBy('match_no','asc')->get();
        // return $result;
        return view('Admin/Result/BrowseResult',compact('result'));
    }

    public function Post_BrowseResult(Request $request){
        $match = Match::where('tournament',$request->tournament)->where('match_no',$request->match_no)->get();
        $match_detail = MatchDetail::where('tournament',$request->tournament)->where('match_no',$request->match_no)->get();
        $single_result = GameXI::where('match_no',$request->match_no)->get();
        return view('Admin/Result/SingleResult',compact('single_result','match','match_detail'));
    }

    public function Post_DeleteResult(Request $request){
        $result= MatchDetail::where('tournament','BCC2019')->orderBy('match_no','asc')->get();
        $match_no = $request->match_no;
        $match = Match::where('match_no',$match_no)->where('tournament','BCC2019')->first();
        $match->delete();
        // dd(count($match));
        $match_detail = MatchDetail::where('match_no',$match_no)->where('tournament','BCC2019')->get();
        for($i=0; $i<count($match_detail); $i++){
          $m = MatchDetail::where('match_no',$match_no)->first();
          $m->delete();
        }

        $gamexi = GameXI::where('match_no',$match_no)->get();
        for($j=0; $j<count($gamexi); $j++){
          $g = GameXI::where('match_no',$match_no)->first();
          $g->delete();
        }

        return redirect::route('BrowseResult',compact('result'));
    }
}
