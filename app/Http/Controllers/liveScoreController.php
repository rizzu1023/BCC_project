<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Teams;
use App\Schedule;
use App\Players;
use App\MatchPlayers;
use App\Match;
use App\MatchDetail;


class LiveScoreController extends Controller
{
    public function LiveScoreIndex(){
        $schedule = Schedule::all();
        $start = Match::all();
        return view('Admin/LiveScore/index',compact('schedule','start'));
    }

    public function StartScore($id){
        $schedule  = Schedule::where('id',$id)->first();
        $players1 = Players::where('team_id',$schedule->team1_id)->get();
        $players2 = Players::where('team_id',$schedule->team2_id)->get();
  
        return view('Admin/LiveScore/StartScore',compact('schedule','players1','players2'));
    }



    public function ScoreDetails(Request $request){
        $m = Match::create([
            'match_id' => request('id'),
            'overs' => request('overs'),
            'tournament' => request('tournament'),
            'toss' => request('toss'),
            'choose' => request('choose'),
        ]);
        MatchDetail::create([
            'match_id' => $m->match_id,
            'team_id' => request('team1_id'),
            'tournament' => request('tournament'),
        ]);

        MatchDetail::create([
            'match_id' => $m->match_id,
            'team_id' => request('team2_id'),
            'tournament' => request('tournament'),
        ]);

        for($i=1; $i<23; $i++){
    
            $var = "t1p".$i;
            if($request->$var != null){
                $obj = Players::where('player_id',$request->$var)->first();
            
                MatchPlayers::create([
                    'match_id' => $m->match_id,
                    'player_id' => $request->$var,
                    'team_id' => $obj->Teams->id,
                    'tournament' => request('tournament'),
                ]);
            }
          }
    
        return redirect::route('LiveScore.index');
    }
            
            
    public function LiveScoreShow($id,$tournament){
            $match_player = MatchPlayers::where('match_id',$id)->where('tournament',$tournament)->get();
        return view('Admin/LiveScore/show',compact('match_player')); 
    }

    public function LiveScore(Request $request){
            // return $request->all();
        if($request->strike1 && $request->strike2){
        MatchPlayers::where('match_id',$request->match_id)
                            ->where('tournament',$request->tournament)
                            ->where('team_id',$request->team_id)
                            ->where('player_id',$request->strike1)
                            ->update(['bt_status'=>1]);
        MatchPlayers::where('match_id',$request->match_id)
                            ->where('tournament',$request->tournament)
                            ->where('team_id',$request->team_id)
                            ->where('player_id',$request->strike2)
                            ->update(['bt_status'=>1]);
            }
        
        $matchs = Match::where('match_id',$request->match_id)->where('tournament',$request->tournament)->first();
        // return $match->MatchPlayers;
        $match_player = NULL;
        // return $matchs->toss;
        return view('Admin/LiveScore/show',compact('matchs','match_player'));
    }
    
}
