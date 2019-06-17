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
            
                MatchPlayers::create([
                    'match_no' => request('match_no'),
                    'player_id' => $request->$var,
                    'team_id' => $obj->Teams->id,
                    'tournament' => request('tournament'),
                ]);
            }
          }
    
        Match::create([
            'match_no' => request('match_no'),
            'team1_id' => request('team1_id'),
            'team2_id' => request('team2_id'),
            'overs' => request('overs'),
            'tournament' => request('tournament'),
            'toss' => request('toss'),
            'choose' => request('choose'),
        ]);
    
        MatchDetail::create([
            'match_no' => request('match_no'),
            'team_id' => request('team1_id'),
            'tournament' => request('tournament'),
        ]);

        MatchDetail::create([
            'match_no' => request('match_no'),
            'team_id' => request('team2_id'),
            'tournament' => request('tournament'),
        ]);
    
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
