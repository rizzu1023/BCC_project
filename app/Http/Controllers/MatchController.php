<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Match;
use App\MatchDetail;
use App\Players;
use App\MatchPlayers;
use App\Schedule;

class MatchController extends Controller
{
  
    public function BrowseResult(){
        $result= MatchDetail::where('tournament','BCC2019')->orderBy('match_no','asc')->get();
        // return $result;
        return view('Admin/Result/BrowseResult',compact('result'));
    }

    public function Post_BrowseResult(Request $request){
        $match = Match::where('tournament',$request->tournament)->where('match_no',$request->match_no)->get();
        $match_detail = MatchDetail::where('tournament',$request->tournament)->where('match_no',$request->match_no)->get();
        $single_result = MatchPlayers::where('match_no',$request->match_no)->get();
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

        $gamexi = MatchPlayers::where('match_no',$match_no)->get();
        for($j=0; $j<count($gamexi); $j++){
          $g = MatchPlayers::where('match_no',$match_no)->first();
          $g->delete();
        }

        return redirect::route('BrowseResult',compact('result'));
    }
}
