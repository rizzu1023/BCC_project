<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Schedule;
use App\Players;
use App\GameXI;
use App\Match;
use App\MatchDetail;


class LiveScoreController extends Controller
{
    public function LiveScoreIndex(){
        $schedule = Schedule::all();
        $start = Match::all();
        return view('Admin/LiveScore/index',compact('schedule','start'));
    }

    public function StartScore($match_no){

        $schedule  = Schedule::where('match_no',$match_no)->first();
  
  
        $players1 = Players::where('team_id',$schedule->team1_id)->get();
        $players2 = Players::where('team_id',$schedule->team2_id)->get();
  
        return view('Admin/LiveScore/StartScore',compact('schedule','players1','players2'));
    }



    public function ScoreDetails(Request $request){
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
               $match = $request->match_no;
               $tournament = 'BCC2019';
               return redirect::route('LiveScore.index');
            }
            
            
    public function LiveScoreShow($match,$tournament){
        $match = MatchDetail::where('match_no',$match)->where('tournament',$tournament)->get();
        return view('Admin/LiveScore/show',compact('match'));
    }

    public function LiveScore(Request $request){
        MatchDetail::where('match_no',$request->match_no)
                        ->where('tournament',$request->tournament)
                        ->where('team_id',$request->team_id)
                        ->update(['score'=>$request->score]);
                        return $request->team_id;
        $match = MatchDetail::where('match_no',$request->match_no)->where('tournament',$request->tournament)->get();
        return view('Admin/LiveScore/show',compact('match'));
    }
    
}
