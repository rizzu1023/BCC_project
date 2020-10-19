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

            $mostRuns = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(Case when bt_status IN ("0") then 1 else 0 end) as out_innings, round((SUM(bt_runs) / SUM(Case when bt_status IN ("0") then 1 else 0 end)),2) as bt_average')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);

            $filteredMostRuns = $mostRuns->reject(function($element) {
                return $element->bt_runs <= 0;
            });
            $filteredMostRuns->map(function ($element) {
                if($element->out_innings == 0){
                    return $element->bt_average = $element->bt_runs ;
                }
            });
            return StatsResource::collection($filteredMostRuns);

        }
        if($type == "highestScores"){
            $highestScores = MatchPlayers::select('player_id','bt_runs','bt_balls','match_id', 'team_id')
                ->where('tournament_id',$tournament_id)
                ->where('bt_runs','>',0)
                ->where('bt_balls','>',0)
                ->orderBy('bt_runs','desc')
                ->orderBy('bt_balls','asc')->get()->take(20);

            $highestScores->map(function ($element) {
                    $bt_sr = ($element->bt_runs / $element->bt_balls) * 100 ;
                    $bt_strike_rate = (float)number_format((float)$bt_sr, 2, '.', '');
                    return $element->bt_sr = $bt_strike_rate;
            });
            return StatsForOppositeTeamResource::collection($highestScores);
        }

        if($type == "bestBattingAverage"){
            $bestBattingAverage = MatchPlayers::selectRaw('player_id, COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, SUM(Case when bt_status IN ("0") then 1 else 0 end) as out_innings,  SUM(bt_runs) as bt_runs, round((SUM(bt_runs) / SUM(Case when bt_status IN ("0") then 1 else 0 end)),2) as bt_average')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->get()->take(20);

            $filteredBestBattingAverage = $bestBattingAverage->reject(function($element) {
                return $element->bt_runs <= 0;
            });

            $filteredBestBattingAverage->map(function ($element) {
                if($element->out_innings == 0){
                    return $element->bt_average = $element->bt_runs ;
                }
            });

            $sortedBestBattingAverage = $filteredBestBattingAverage->sortByDesc('bt_average');

            return StatsResource::collection($sortedBestBattingAverage);
        }

        if($type == "bestBattingStrikeRate"){
            $bestBattingStrikeRate = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_balls) as bt_balls')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);

            $bestBattingStrikeRate = $bestBattingStrikeRate->reject(function($element) {
                return $element->bt_runs <= 0;
            });

            $bestBattingStrikeRate->map(function ($element) {
                $bt_sr = ($element->bt_runs / $element->bt_balls) * 100 ;
                $bt_strike_rate = (float)number_format((float)$bt_sr, 2, '.', '');
                return $element->bt_sr = $bt_strike_rate;
            });

            $sortedBestBattingStrikeRate = $bestBattingStrikeRate->sortByDesc('bt_sr');
            return StatsResource::collection($sortedBestBattingStrikeRate);
        }

        if($type == "mostFours"){
            $mostFours = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_fours) as bt_fours')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_fours','desc')->get()->take(20);

            $mostFours = $mostFours->reject(function($element) {
                return $element->bt_fours <= 0;
            });
            return StatsResource::collection($mostFours);
        }

        if($type == "mostSixes"){
            $mostSixes = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_sixes) as bt_sixes')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_sixes','desc')->get()->take(20);

            $mostSixes = $mostSixes->reject(function($element) {
                return $element->bt_sixes <= 0;
            });
            return StatsResource::collection($mostSixes);
        }

        if($type == "mostHundreds"){
            $mostHundreds = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs,SUM(Case when bt_runs > 99 then 1 else 0 end) as bt_hundreds')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);

            $mostHundreds = $mostHundreds->reject(function($element) {
                return $element->bt_hundreds <= 0;
            });

            $mostHundreds = $mostHundreds->sortByDesc('bt_hundreds');
            return StatsResource::collection($mostHundreds);
        }

        if($type == "mostFifties"){
            $mostFifties = MatchPlayers::selectRaw('COUNT(match_id) as matches,  SUM(Case when bt_status IN ("11","10","0","12") then 1 else 0 end) as bt_innings, player_id, SUM(bt_runs) as bt_runs, SUM(Case when bt_runs > 49 and bt_runs < 100 then 1 else 0 end) as bt_fifties')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bt_runs','desc')->get()->take(20);

            $mostFifties = $mostFifties->reject(function($element) {
                return $element->bt_fifties <= 0;
            });

            $mostFifties = $mostFifties->sortByDesc('bt_fifties');
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

            $filteredMostWickets = $mostWickets->reject(function($element) {
                return $element->bw_wickets <= 0;
            });

            return StatsResource::collection($filteredMostWickets);
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

        if($type == "bestBowlingStrikeRate"){

            //balls conceded / wicket taken

            $bestBowlingStrikeRate = MatchPlayers::selectRaw('COUNT(match_id) as matches, SUM(Case when bw_status IN ("11","1") then 1 else 0 end) as bw_innings, player_id, SUM(bt_runs) as bt_runs, SUM(bt_balls) as bt_balls, SUM(bw_over * 6 + bw_overball) as total_balls, SUM(bw_wickets) as bw_wickets')
                ->groupBy('player_id')
                ->where('tournament_id',$tournament_id)
                ->orderBy('bw_wickets','desc')->get()->take(20);


            $bestBowlingStrikeRate = $bestBowlingStrikeRate->reject(function($element) {
                return $element->bw_wickets <= 0;
            });

            $bestBowlingStrikeRate->map(function ($element) {
                $bw_sr = $element->total_balls / $element->bw_wickets;
                $bw_strike_rate = (float)number_format((float)$bw_sr, 2, '.', '');
                $element->bw_over = (int)($element->total_balls / 6);
                $element->bw_overball = $element->total_balls % 6;
                return $element->bw_sr = $bw_strike_rate;
            });
//            return $bestBowlingStrikeRate;

            $sortedBestBowlingStrikeRate = $bestBowlingStrikeRate->sortByDesc('bt_sr');
            return StatsResource::collection($sortedBestBowlingStrikeRate);
        }
    }
}
