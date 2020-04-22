<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchDetailResource;
use App\Http\Resources\MatchPlayersResource;
use App\Http\Resources\MatchTrackResource;
use App\Http\Resources\PlayersResource;
use App\Match;
use App\MatchDetail;
use App\MatchPlayers;
use App\MatchTrack;
use App\Players;
use App\Schedule;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function calculating_balls($max_over,$min_over,$max_overball,$min_overball)
    {
        $min_over = $min_over. "." .$min_overball;
        $max_over = $max_over. "." .$max_overball;

        $max_int = (int)$max_over;
        $min_int = (int)$min_over;

        $max_frac = explode('.', number_format($max_over, 1))[1];
        $min_frac = explode('.', number_format($min_over, 1))[1];

        $min_balls = ($min_int * 6) + $min_frac;
        $max_balls = ($max_int * 6) + $max_frac;
        return $max_balls - $min_balls;
    }

    public function matchInfo($tournament_id, $match_id, $team1_id, $team2_id)
    {
        $team1 = Teams::select('id', 'team_code', 'team_name')->where('id', $team1_id)->first();
        $team2 = Teams::select('id', 'team_code', 'team_name')->where('id', $team2_id)->first();

//        $team1_players = Players::whereHas('teams', function($query) use($team1_id){
//            $query->where('team_id', $team1_id);
//        })->get();

        $tournament = Tournament::select('tournament_name')->where('id', $tournament_id)->first();

        $match = Schedule::select('match_no', 'dates', 'times')->where('id', $match_id)->first();

        $toss = Match::where('match_id', $match_id)->first();
        $toss_team = NULL;
        if ($toss)
            $toss_team = Teams::select('id', 'team_code', 'team_name')->where('id', $toss->toss)->first();

        return [
            'team1' => $team1,
            'team2' => $team2,
            'match' => $match->match_no,
            'tournament' => $tournament->tournament_name,
            'dates' => $match->dates,
            'times' => $match->times,
            'toss' => $toss_team,
        ];
    }

    public function live($tournament_id, $match_id, $team1_id, $team2_id)
    {
        if (!Match::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first()) {
            return [
                'isMatch' => 'not_found',
            ];
        } else {

            $match_detail = NULL;

            $current_batsman = [];
            $current_bowler = NULL;

            $batting_team = MatchDetail::where('isBatting', 1)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            if ($batting_team) {
                $match_detail = new MatchDetailResource($batting_team);
                $batsman = MatchPlayers::whereIn('bt_status', ['10', '11'])->where('team_id', $batting_team->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
                if ($batsman)
                    $current_batsman = MatchPlayersResource::collection($batsman);

                $bowler = MatchPlayers::where('bw_status', '11')->where('team_id', '<>', $batting_team->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
                if ($bowler)
                    $current_bowler = new MatchPlayersResource($bowler);

                $partnership = [];
//                $pship = MatchTrack::selectRaw('max(score) as max_score, min(score) as min_score, max(over) as max_over, min(over) as min_over, max(overball) as max_overball, min(overball) as min_overball')
//                    ->groupBy('wickets')
//                    ->where('wickets',$match_detail->wicket)
//                    ->first();
                $p1 = MatchTrack::select('score','over','overball')->where('wickets',$match_detail->wicket)->where('team_id',$match_detail->team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->orderBy('score','desc')->orderBy('over','desc')->orderBy('overball','desc')->first();
                $p0 = MatchTrack::select('score','over','overball')->where('wickets',$match_detail->wicket - 1)->where('team_id',$match_detail->team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->orderBy('score','desc')->orderBy('over','desc')->orderBy('overball','desc')->first();
                if($p1){
                    if($p1 && $p0){
                        $score = $p1->score - $p0->score;
                        $balls = $this->calculating_balls($p1->over,$p0->over,$p1->overball ,$p0->overball + 1);
                        $partnership['score'] = $score;
                        $partnership['balls'] = $balls;
                    }
                    else{
                        $score = $p1->score - 0;
                        $balls = $this->calculating_balls($p1->over,0,$p1->overball - 1,0);
                        $partnership['score'] = $score;
                        $partnership['balls'] = $balls;
                    }
                }
                else{
                    $partnership['score'] = 0;
                    $partnership['balls'] = 0;
                }


            }
            return [
                'isMatch' => true,
                'partnership' => $partnership,
                'match_detail' => $match_detail,
                'current_batsman' => $current_batsman,
                'current_bowler' => $current_bowler,
            ];

        }


    }

    public function scorecard($tournament_id, $match_id, $team1_id, $team2_id)
    {
        $isMatch = 'not_found';
        if (Match::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first())
            $isMatch = true;
        $match_detail = Match::where('match_id', $match_id)->first();
        if ($match_detail) {
            if ($match_detail->toss == $team1_id && $match_detail->choose == 'Bat') {
                $batting_team_id = $team1_id;
                $bowling_team_id = $team2_id;
            } else {
                $batting_team_id = $team2_id;
                $bowling_team_id = $team1_id;
            }
        }

        $team1_detail = NULL;
        $team1_batsman = [];
        $team1_notout_batsman = [];
        $team1_bowler = [];
        $team1_extras = NULL;
        $team1_score = NULL;

        $team2_detail = NULL;
        $team2_batsman = [];
        $team2_notout_batsman = [];
        $team2_bowler = [];
        $team2_extras = NULL;
        $team2_score = NULL;

        if ($match_detail) {
            $team1_detail = Teams::where('id', $batting_team_id)->first();
            $team1_batsman = MatchPlayers::whereIn('bt_status', ['0', '10', '11'])->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_notout_batsman = MatchPlayers::where('bt_status', 'DNB')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_bowler = MatchPlayers::whereIn('bw_status', ['1', '11'])->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team1_extras = MatchDetail::select('no_ball', 'wide', 'byes', 'legbyes')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            $team1_score = MatchDetail::select('score', 'wicket', 'over', 'overball')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            $team1_fow = MatchTrack::select('player_id','score','wickets','over','overball')->where('action','wicket')->where('team_id',$batting_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->orderBy('wickets','asc')->get();



            $team2_detail = Teams::where('id', $bowling_team_id)->first();
            $team2_batsman = MatchPlayers::whereIn('bt_status', ['0', '10', '11'])->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team2_notout_batsman = MatchPlayers::where('bt_status', 'DNB')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team2_bowler = MatchPlayers::whereIn('bw_status', ['1', '11'])->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->get();
            $team2_extras = MatchDetail::select('no_ball', 'wide', 'byes', 'legbyes')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            $team2_score = MatchDetail::select('score', 'wicket', 'over', 'overball')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            $team2_fow = MatchTrack::select('player_id','score','wickets','over','overball')->where('action','wicket')->where('team_id',$bowling_team_id)->where('match_id',$match_id)->where('tournament_id',$tournament_id)->orderBy('wickets','asc')->get();

        }

        return [
            'isMatch' => $isMatch,
            'match_detail' => $match_detail,
            'team1' => [
                'detail' => $team1_detail,
                'batsman' => MatchPlayersResource::collection($team1_batsman),
                'notout_batsman' => MatchPlayersResource::collection($team1_notout_batsman),
                'bowler' => MatchPlayersResource::collection($team1_bowler),
                'extras' => $team1_extras,
                'score' => $team1_score,
                'fow' => $team1_fow,
            ],
            'team2' => [
                'detail' => $team2_detail,
                'batsman' => MatchPlayersResource::collection($team2_batsman),
                'notout_batsman' => MatchPlayersResource::collection($team2_notout_batsman),
                'bowler' => MatchPlayersResource::collection($team2_bowler),
                'extras' => $team2_extras,
                'score' => $team2_score,
                'fow' => $team2_fow,
            ],
        ];

    }

    public function overs($tournament_id, $match_id, $team1_id, $team2_id)
    {

        if (!Match::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament_id)->first()) {
            return [
                'isMatch' => 'not_found',
            ];
        } else {

            $match_detail = Match::where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
            if ($match_detail) {
                if ($match_detail->toss == $team1_id && $match_detail->choose == 'Bat') {
                    $batting_team_id = $team1_id;
                    $bowling_team_id = $team2_id;
                } else {
                    $batting_team_id = $team2_id;
                    $bowling_team_id = $team1_id;
                }
            }
            $overs = MatchTrack::selectRaw('Min(attacker_id) as attacker_id,over as over_no, SUM(run) as runs, SUM(wickets) as wickets')
                ->groupBy('over')
                ->where('match_id', $match_id)
                ->where('team_id', $bowling_team_id)
                ->where('tournament_id', $tournament_id)
                ->orderBy('over', 'desc')
                ->get();

            $over_detail = MatchTrack::select('over', 'action', 'run', 'overball')
                ->where('match_id', $match_id)
                ->where('team_id', $bowling_team_id)
                ->where('tournament_id', $tournament_id)
                ->orderBy('over', 'desc')
                ->orderBy('overball', 'asc')
                ->get();

            $result_collection = MatchTrackResource::collection($overs);
            $over_details = collect($over_detail)->groupBy('over');
            $result = collect();
            foreach ($result_collection as $rc) {
                $r = collect($rc)->merge(['over_detail' => $over_details[$rc->over_no]]);
                $result->push($r);
            }

            $overs2 = MatchTrack::selectRaw('Min(attacker_id) as attacker_id,over as over_no, SUM(run) as runs, SUM(wickets) as wickets')
                ->groupBy('over')
                ->where('match_id', $match_id)
                ->where('team_id', $batting_team_id)
                ->where('tournament_id', $tournament_id)
                ->orderBy('over', 'desc')
                ->get();

            $over_detail2 = MatchTrack::select('over', 'action', 'run', 'overball')
                ->where('match_id', $match_id)
                ->where('team_id', $batting_team_id)
                ->where('tournament_id', $tournament_id)
                ->orderBy('over', 'desc')
                ->orderBy('overball', 'asc')
                ->get();

            $result_collection2 = MatchTrackResource::collection($overs2);
            $over_details2 = collect($over_detail2)->groupBy('over');
            $result2 = collect();
            foreach ($result_collection2 as $rc) {
                $r = collect($rc)->merge(['over_detail' => $over_details2[$rc->over_no]]);
                $result2->push($r);
            }

            return [
                'isMatch' => true,
                'overs' => $result->merge($result2),
            ];

        }

    }
}
