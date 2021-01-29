<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FowResource;
use App\Http\Resources\MatchDetailResource;
use App\Http\Resources\MatchPlayersResource;
use App\Http\Resources\MatchTrackResource;
use App\Http\Resources\PlayersResource;
use App\Game;
use App\MatchDetail;
use App\MatchPlayers;
use App\MatchTrack;
use App\Players;
use App\Schedule;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function calculating_balls($max_over, $min_over, $max_overball, $min_overball)
    {
        $min_over = $min_over . "." . $min_overball;
        $max_over = $max_over . "." . $max_overball;

        $max_int = (int)$max_over;
        $min_int = (int)$min_over;

        $max_frac = explode('.', number_format($max_over, 1))[1];
        $min_frac = explode('.', number_format($min_over, 1))[1];

        $min_balls = ($min_int * 6) + $min_frac;
        $max_balls = ($max_int * 6) + $max_frac;
        return $max_balls - $min_balls;
    }

    public function calculate_crr($runs, $overs, $balls){
        $over = $overs + ($balls * 10) / 60;
        if($overs == 0 && $balls == 0){
            return $crr = 0;
        }
        elseif($overs == 0){
            return ($runs/$balls) * 6;
        }
        else{
             $crr = $runs / $over;
             return (float)number_format((float)$crr, 2, '.', '');
        }
    }

    public function calculate_rrr($remaining_runs,$remaining_balls){
        $over = (int)( $remaining_balls / 6 );
        $balls = $remaining_balls % 6 ;
        $overs = $over + ($balls * 10) / 60;
        if($overs == 0){
            return $rrr = 0;
        }
        $rrr = ($remaining_runs / $overs);
        return (float)number_format((float)$rrr, 2, '.', '');
    }

    public function match_info(Tournament $tournament, $match_id)
    {
        $schedule = Schedule::where('id',$match_id)->where('tournament_id',$tournament->id)->first();
//        $team1 = Teams::select('id', 'team_code', 'team_name')->where('id', $team1_id)->first();
//        $team2 = Teams::select('id', 'team_code', 'team_name')->where('id', $team2_id)->first();

        $team1 = $schedule->Teams1;
        $team2 = $schedule->Teams2;

        $tournament = Tournament::select('tournament_name')->where('id', $tournament->id)->first();

        $match = Schedule::select('match_no', 'dates', 'times')->where('id', $match_id)->first();

        $format_time = date('h:i A', strtotime($match->times));
        $format_date = date('d M Y', strtotime($match->dates));
        $date = $match->dates;
        $d    = new \DateTime($date);
        $dy = $d->format('D');
        $day = strtoupper($dy);


        $toss = Game::where('match_id', $match_id)->first();
        $toss_team = NULL;
        $choose = NULL;
        if ($toss) {
            $toss_team = Teams::select('id', 'team_code', 'team_name')->where('id', $toss->toss)->first();
            $choose = $toss->choose;

            return [
                'match_status' => true,
                'team1' => $team1,
                'team2' => $team2,
                'match' => $match->match_no,
                'tournament' => $tournament->tournament_name,
                'dates' => $format_date,
                'day' => $day,
                'times' => $format_time,
                'toss' => $toss_team,
                'choose' => $choose,
            ];
        }

        return [
            'match_status' => false,
            'team1' => $team1,
            'team2' => $team2,
            'match' => $match->match_no,
            'tournament' => $tournament->tournament_name,
            'dates' => $format_date,
            'day' => $day,
            'times' => $format_time,
        ];
    }

    public function match_live(Tournament $tournament, $match_id)
    {
        $match = Game::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
        if (!$match) {
            $match_status = 0;
            return [
                'isMatch' => 'not_found',
                'match_status' => $match_status,
            ];
        } else {

            $match_status = $match->status;
            if ($match_status == 4) {
                $bowling_team = MatchDetail::where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('updated_at', 'desc')->get();
//                $batting_team = MatchDetail::where('match_id', $match_id)->where('tournament_id', $tournament_id)->first();
                $match_detail = Game::where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
                $match_won = Game::where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
                $won = $match_won->WON;
                return [
                    'match_status' => $match_status,
                    'team1' => new MatchDetailResource($bowling_team[0]),
                    'team2' => new MatchDetailResource($bowling_team[1]),
                    'won_match_detail' => $match_detail,
                    'won' => $won,
                ];
            }
            $total_overs = $match->overs;
            $match_detail = NULL;

            $current_batsman = [];
            $current_bowler = NULL;
            $bowling_team = MatchDetail::where('isBatting', 0)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            $target = $bowling_team->score;

            $batting_team  = MatchDetail::where('isBatting', 1)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            if ($batting_team) {
                $match_detail = new MatchDetailResource($batting_team);
                $batsman = MatchPlayers::whereIn('bt_status', ['10', '11'])->where('team_id', $batting_team->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('bt_order','asc')->get();
                if ($batsman)
                    $current_batsman = MatchPlayersResource::collection($batsman);

                $bowler = MatchPlayers::where('bw_status', '11')->where('team_id', '<>', $batting_team->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
                if ($bowler)
                    $current_bowler = new MatchPlayersResource($bowler);
//                else
//                    $current_bowler = 'not_found';

                $batting_team_overs = $batting_team->over;
                $batting_team_balls = $batting_team->overball;
                //calculating remaining ball of current team
                $remaining_balls = $this->calculating_balls($total_overs, $batting_team_overs, 0, $batting_team_balls);


                $partnership = [];

                $p1 = MatchTrack::select('score', 'over', 'overball')->where('wickets', $match_detail->wicket)->where('team_id', $match_detail->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('score', 'desc')->orderBy('over', 'desc')->orderBy('overball', 'desc')->first();
                $p0 = MatchTrack::select('score', 'over', 'overball')->where('wickets', $match_detail->wicket - 1)->where('team_id', $match_detail->team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('score', 'desc')->orderBy('over', 'desc')->orderBy('overball', 'desc')->first();
                if ($p1) {
                    if ($p1 && $p0) {
                        $score = $p1->score - $p0->score;
                        $balls = $this->calculating_balls($p1->over, $p0->over, $p1->overball, $p0->overball + 1);
                        $partnership['score'] = $score;
                        $partnership['balls'] = $balls;
                    } else {
                        $score = $p1->score - 0;
                        $balls = $this->calculating_balls($p1->over, 0, $p1->overball, 0);
                        $partnership['score'] = $score;
                        $partnership['balls'] = $balls;
                    }
                } else {
                    $partnership['score'] = 0;
                    $partnership['balls'] = 0;
                }


            }
            $remaining_runs = $target - $batting_team->score + 1;
            $crr = $this->calculate_crr($match_detail->score,$match_detail->over,$match_detail->overball);
            $rrr = $this->calculate_rrr($remaining_runs,$remaining_balls);

            //TODO :: only when inning breaks
            if($match_status == 2){
                $inning_break_team  = MatchDetail::where('isBatting', 0)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
                $match_detail = new MatchDetailResource($inning_break_team);
            }

            return [
//                'isMatch' => true,
                'partnership' => $partnership,
                'match_detail' => $match_detail,
                'current_batsman' => $current_batsman,
                'current_bowler' => $current_bowler,
                'match_status' => $match_status,
                'target' => $target + 1,
                'remaining_balls' => $remaining_balls,
                'remaining_runs' => $remaining_runs,
                'crr' => $crr,
                'rrr' => $rrr,
            ];

        }


    }

    public function match_scorecard(Tournament $tournament, $match_id)
    {
        $schedule = Schedule::where('id',$match_id)->where('tournament_id',$tournament->id)->first();

        $team1_id = $schedule->Teams1->id;
        $team2_id = $schedule->Teams2->id;


        $isMatch = 'not_found';
        $toss_winning_team = NULL;
        $match_status = null;
        $match = Game::where('match_id', $match_id)->first();

        if($match){
            if ($match->WON) {
                $team_won = $match->WON->team_name;
                $won_description = $match->description;
            }
            else
                $team_won = '0';
                $won_description = '';

        }
        else
            $team_won = '';
            $won_description = '';


        $match = Game::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
        if ($match) {
            $isMatch = true;
            $match_status = $match->status;
        }
        $match_detail = Game::where('match_id', $match_id)->first();
        if ($match_detail) {
            $toss_winning_team = Teams::where('id',$match_detail->toss)->first();
            if (($match_detail->toss == $team1_id && $match_detail->choose == 'Bat') || ($match_detail->toss == $team2_id && $match_detail->choose == 'Bowl')) {
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
        $team1_fow = NULL;

        $team2_detail = NULL;
        $team2_batsman = [];
        $team2_notout_batsman = [];
        $team2_bowler = [];
        $team2_extras = NULL;
        $team2_score = NULL;
        $team2_fow = NULL;


        if ($match_detail) {
            $team1_detail = Teams::where('id', $batting_team_id)->first();
            $team1_batsman = MatchPlayers::whereIn('bt_status', ['0', '10', '11','12'])->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('bt_order','asc')->get();
            $team1_notout_batsman = MatchPlayers::where('bt_status', 'DNB')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->get();
            $team1_bowler = MatchPlayers::whereIn('bw_status', ['1', '11'])->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->get();
            $team1_extras = MatchDetail::select('no_ball', 'wide', 'byes', 'legbyes')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            $team1_score = MatchDetail::select('score', 'wicket', 'over', 'overball')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            $team1_fow = MatchTrack::select('player_id', 'score', 'wickets', 'over', 'overball')->where('action', 'wicket')->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('wickets', 'asc')->get();


            $team2_detail = Teams::where('id', $bowling_team_id)->first();
            $team2_batsman = MatchPlayers::whereIn('bt_status', ['0', '10', '11','12'])->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('bt_order','asc')->get();
            $team2_notout_batsman = MatchPlayers::where('bt_status', 'DNB')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->get();
            $team2_bowler = MatchPlayers::whereIn('bw_status', ['1', '11'])->where('team_id', $batting_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->get();
            $team2_extras = MatchDetail::select('no_ball', 'wide', 'byes', 'legbyes')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            $team2_score = MatchDetail::select('score', 'wicket', 'over', 'overball')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            $team2_fow = MatchTrack::select('player_id', 'score', 'wickets', 'over', 'overball')->where('action', 'wicket')->where('team_id', $bowling_team_id)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->orderBy('wickets', 'asc')->get();
        }

        if(is_null($team1_fow)) $team1_fow = null;
        else $team1_fow = FowResource::collection($team1_fow);
        if(is_null($team2_fow)) $team2_fow = null;
        else $team2_fow = FowResource::collection($team2_fow);


        return [
            'isMatch' => $isMatch,
            'won' => $team_won,
            'description' => $won_description,
            'match_status' => $match_status,
            'toss_winning_team' => $toss_winning_team,
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

    public function match_overs(Tournament $tournament, $match_id)
    {
        $schedule = Schedule::where('id',$match_id)->where('tournament_id',$tournament->id)->first();

        $team1_id = $schedule->Teams1->id;
        $team2_id = $schedule->Teams2->id;


        if (!Game::where('status', '>', 0)->where('match_id', $match_id)->where('tournament_id', $tournament->id)->first()) {
            return [
                'isMatch' => 'not_found',
            ];
        } else {

            $match_detail = Game::where('match_id', $match_id)->where('tournament_id', $tournament->id)->first();
            if ($match_detail) {
                if ($match_detail->toss == $team1_id && $match_detail->choose == 'Bat') {
                    $batting_team_id = $team1_id;
                    $bowling_team_id = $team2_id;
                } else {
                    $batting_team_id = $team2_id;
                    $bowling_team_id = $team1_id;
                }
            }

            $overs = MatchTrack::select('over', DB::raw('Min(attacker_id) as attacker_id, SUM(wickets) as wickets,SUM(run) as runs'))
                ->groupBy('over')
                ->where('match_id', $match_id)
                ->where('team_id', $bowling_team_id)
                ->where('tournament_id', $tournament->id)
                ->orderBy('over', 'desc')
                ->get();


            $over_detail = MatchTrack::select('over', 'action', 'run', 'overball')
                ->where('match_id', $match_id)
                ->where('team_id', $bowling_team_id)
                ->where('tournament_id', $tournament->id)
                ->orderBy('over', 'desc')
                ->orderBy('overball', 'asc')
                ->get();

            $result_collection = MatchTrackResource::collection($overs);
            $over_details = collect($over_detail)->groupBy('over');
            $result = collect();
            foreach ($result_collection as $rc) {
                $r = collect($rc)->merge(['over_detail' => $over_details[$rc->over]]);
                $result->push($r);
            }

//            return $result_collection;

//            $overs2 = MatchTrack::selectRaw('Min(attacker_id) as attacker_id, SUM(run) as runs, SUM(wickets) as wickets ',)
//                ->groupBy('over')
//                ->where('match_id', $match_id)
//                ->where('team_id', $batting_team_id)
//                ->where('tournament_id', $tournament->id)
//                ->orderBy('over', 'desc')
//                ->get();

            $overs2 = MatchTrack::select('over', DB::raw('Min(attacker_id) as attacker_id, SUM(wickets) as wickets,SUM(run) as runs'))
                ->groupBy('over')
                ->where('match_id', $match_id)
                ->where('team_id', $batting_team_id)
                ->where('tournament_id', $tournament->id)
                ->orderBy('over', 'desc')
                ->get();



            $over_detail2 = MatchTrack::select('over', 'action', 'run', 'overball')
                ->where('match_id', $match_id)
                ->where('team_id', $batting_team_id)
                ->where('tournament_id', $tournament->id)
                ->orderBy('over', 'desc')
                ->orderBy('overball', 'asc')
                ->get();

            $result_collection2 = MatchTrackResource::collection($overs2);
            $over_details2 = collect($over_detail2)->groupBy('over');
            $result2 = collect();
            foreach ($result_collection2 as $rc) {
                $r = collect($rc)->merge(['over_detail' => $over_details2[$rc->over]]);
                $result2->push($r);
            }

            return [
                'isMatch' => true,
                'overs' => $result->merge($result2),
            ];

        }

    }
}
