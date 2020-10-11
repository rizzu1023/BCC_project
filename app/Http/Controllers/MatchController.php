<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatchTrackResource;
use App\MatchTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Match;
use App\MatchDetail;
use App\Players;
use App\MatchPlayers;
use App\Schedule;
use DB;

class MatchController extends Controller
{

    public function BrowseResult(){
      $result= MatchDetail::orderBy('match_id','asc')->get();
      return view('Admin/Result/BrowseResult',compact('result'));
    }

    public function Post_BrowseResult(Request $request){
        $match = Match::where('tournament_id',$request->tournament)->where('match_id',$request->match_id)->first();
        $match_detail = MatchDetail::where('tournament_id',$request->tournament)->where('match_id',$request->match_id)->get();
        $single_result = MatchPlayers::where('match_id',$request->match_id)->get();
        return view('Admin/Result/SingleResult',compact('single_result','match','match_detail'));
    }

    public function Post_DeleteResult(Request $request){
        $result= MatchDetail::where('tournament_id',$request->tournament)->orderBy('match_id','asc')->get();
        $match_id = $request->match_id;
        $match = Match::where('match_id',$match_id)->where('tournament_id',$request->tournament)->first();
        $match->delete();
        // dd(count($match));
        $match_detail = MatchDetail::where('match_id',$match_id)->where('tournament_id',$request->tournament)->get();
        for($i=0; $i<count($match_detail); $i++){
          $m = MatchDetail::where('match_id',$match_id)->first();
          $m->delete();
        }

        $gamexi = MatchPlayers::where('match_id',$match_id)->get();
        for($j=0; $j<count($gamexi); $j++){
          $g = MatchPlayers::where('match_id',$match_id)->first();
          $g->delete();
        }

        $matchTrack = MatchTrack::where('match_id',$match_id)->where('tournament_id',$request->tournament)->get();
        for($j=0; $j<count($matchTrack); $j++){
            $g = MatchTrack::where('match_id',$match_id)->first();
            $g->delete();
        }
        return redirect::route('BrowseResult',compact('result'));
    }

    public function update_overs(Request $request)
    {
        $result= MatchDetail::orderBy('match_id','asc')->get();
        $match_detail = MatchDetail::where('match_id',$request->match_id)->get();
        foreach ($match_detail as $m){
            if($m->over > $request->overs){
                return redirect::route('BrowseResult')->with('error',"you can't set overs more than played");
            }
        }

        $match = Match::where('match_id',$request->match_id)->first();
        $match->overs = $request->overs;
        $match->save();

        return redirect::route('BrowseResult')->with('message','Success');

    }

    public function update_toss(Request $request)
    {
        $match = Match::where('match_id',$request->match_id)->first();
        $match->toss = $request->toss;
        $match->save();

        return redirect::route('BrowseResult')->with('message','Success');
    }

    public function update_choose(Request $request)
    {
        $match = Match::where('match_id',$request->match_id)->first();
        $match->choose = $request->choose;
        $match->save();

        return redirect::route('BrowseResult')->with('message','Success');
    }
}
