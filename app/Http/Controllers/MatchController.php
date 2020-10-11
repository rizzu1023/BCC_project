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
        $team1_id = $match_detail['0']['team_id'];
        $team2_id = $match_detail['1']['team_id'];
        $subs1_players = Players::whereHas('teams',function($query) use($team1_id){
            $query->where('team_id',$team1_id);
        })->get();
        $subs2_players = Players::whereHas('teams',function($query) use($team2_id){
            $query->where('team_id',$team2_id);
        })->get();
        return view('Admin/Result/SingleResult',compact('single_result','match','match_detail','subs1_players','subs2_players'));
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

    public function update_player(Request $request)
    {
        $player = MatchPlayers::where('player_id',$request->sub_player)
            ->where('team_id',$request->team_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->first();
        if($player)
            return redirect::route('BrowseResult')->with('error',"this player already playing in this match");

        $player = MatchPlayers::where('player_id',$request->player_id)
            ->where('team_id',$request->team_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->update(['player_id' => $request->sub_player]);

        $wicket_primary = MatchPlayers::where('wicket_primary',$request->player_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->get();

        foreach ($wicket_primary as $mt)
        {
            $mt->wicket_primary = $request->sub_player;
            $mt->save();
        }

        $wicket_secondary = MatchPlayers::where('wicket_secondary',$request->player_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->get();

        foreach ($wicket_secondary as $mt)
        {
            $mt->wicket_secondary = $request->sub_player;
            $mt->save();
        }

        $match_track = MatchTrack::where('player_id',$request->player_id)
            ->where('team_id',$request->team_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->get();

        foreach ($match_track as $mt)
        {
            $mt->player_id = $request->sub_player;
            $mt->save();
        }

        $match_track2 = MatchTrack::where('attacker_id',$request->player_id)
            ->where('match_id',$request->match_id)
            ->where('tournament_id',$request->tournament_id)
            ->get();

        foreach ($match_track2 as $mt)
        {
            $mt->attacker_id = $request->sub_player;
            $mt->save();
        }

        return redirect::route('BrowseResult')->with('message','Success');
    }
}
