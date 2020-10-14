<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchPlayersResource;
use App\Http\Resources\StatsForOppositeTeamResource;
use App\Http\Resources\StatsResource;
use App\Match;
use App\MatchPlayers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function data($tournament_id,$type){
        $stats = NULL;
        if($type == "mostRuns"){
//            DB::enableQueryLog();
//            return DB::getQueryLog();

            $mostRuns = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);
            return StatsResource::collection($mostRuns);

        }
        if($type == "highestScores"){
            $highestScores = MatchPlayers::select('player_id','bt_runs','bt_balls','match_id', 'team_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);
            return StatsForOppositeTeamResource::collection($highestScores);
        }

        if($type == "bestBattingAverage"){
            $bestBattingAverage = MatchPlayers::selectRaw('player_id, COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, SUM(Case when bt_status IN ("0") then 1 else 0 end) as out_innings,  SUM(bt_runs) as bt_runs, round((SUM(bt_runs) / SUM(Case when bt_status IN ("0") then 1 else 0 end)),2) as bt_average')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->get()->take(20);
            return StatsResource::collection($bestBattingAverage);
        }

        if($type == "bestBattingStrikeRate"){
            $bestBattingStrikeRate = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_balls) as bt_balls')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);
            return StatsResource::collection($bestBattingStrikeRate);
        }

        if($type == "mostFours"){
            $mostFours = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_fours) as bt_fours')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_fours','desc')->get()->take(20);
            return StatsResource::collection($mostFours);
        }

        if($type == "mostSixes"){
            $mostSixes = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_sixes) as bt_sixes')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_sixes','desc')->get()->take(20);
            return StatsResource::collection($mostSixes);
        }

        if($type == "mostHundreds"){
            $mostHundreds = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, COUNT(bt_runs) as bt_hundreds')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->where('bt_runs', '>=' ,100)
                ->orderBy('bt_hundreds','desc')->orderBy('bt_runs','desc')->get()->take(20);
            return StatsResource::collection($mostHundreds);
        }

        if($type == "mostFifties"){
            $mostFifties = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, COUNT(bt_runs) as bt_fifties')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->where('bt_runs', '>=' ,50)
                ->where('bt_runs', '<', 100)
                ->orderBy('bt_fifties','desc')->orderBy('bt_runs','desc')->get()->take(20);
            return StatsResource::collection($mostFifties);
        }

        if($type == "bestBowling"){
            $bestBowling = MatchPlayers::select('bw_wickets','bw_runs','team_id','player_id','match_id')
                ->where('tournament_id',$tournament_id)
                ->where('bw_wickets', '>', 0)
                ->orderBy('bw_wickets','desc')->orderBy('bw_runs','asc')
                ->get()->take(20);
            return StatsForOppositeTeamResource::collection($bestBowling);
        }

        if($type == "mostWickets"){
            $mostWickets = MatchPlayers::selectRaw('player_id, round(SUM(bw_runs) / SUM(bw_wickets),2) as bw_average, COUNT(match_id) as matches, SUM(bw_over) as bw_over, SUM(bw_overball) as bw_overball, SUM(bw_wickets) as bw_wickets, SUM(bw_runs) as bw_runs')
                ->where('tournament_id',$tournament_id)
                ->groupBy('player_id')
                ->orderBy('bw_wickets','desc')
                ->get()->take(20);
            return StatsResource::collection($mostWickets);
        }

        if($type == "bestBowlingAverage"){
            $bestBowlingAverage = MatchPlayers::selectRaw('player_id, round(SUM(bw_runs) / SUM(bw_wickets),2) as bw_average, COUNT(match_id) as matches, SUM(bw_over) as bw_over, SUM(bw_overball) as bw_overball, SUM(bw_wickets) as bw_wickets, SUM(bw_runs) as bw_runs')
                ->where('tournament_id',$tournament_id)
                ->where('bw_wickets', '>', 0)
                ->groupBy('player_id')
                ->orderBy('bw_average','asc')
                ->get()->take(20);
            return StatsResource::collection($bestBowlingAverage);
        }
    }
}
