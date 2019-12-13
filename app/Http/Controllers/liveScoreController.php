<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Teams;
use App\Schedule;
use App\Players;
use App\MatchPlayers;
use App\Match;
use App\MatchDetail;
use DB;


class LiveScoreController extends Controller
{
    public function LiveScoreIndex()
    {
        $schedule = Schedule::all();
        $start = Match::all();
        return view('Admin/LiveScore/index', compact('schedule', 'start'));
    }

    public function StartScore($id)
    {
        $schedule = Schedule::where('id', $id)->first();
        $players1 = Players::where('team_id', $schedule->team1_id)->get();
        $players2 = Players::where('team_id', $schedule->team2_id)->get();

        return view('Admin/LiveScore/StartScore', compact('schedule', 'players1', 'players2'));
    }

    public function ScoreDetails(Request $request)
    {
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

        for ($i = 1; $i < 23; $i++) {

            $var = "t1p" . $i;
            if ($request->$var != null) {
                $obj = Players::where('player_id', $request->$var)->first();

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

    public function StrikeRotate($match_id, $team_id, $tournament)
    {
        $nonstriker = MatchPlayers::where('match_id', $match_id)
            ->where('tournament', $tournament)
            ->where('team_id', $team_id)
            ->where('bt_status', 10)->first();

        $striker = MatchPlayers::where('match_id', $match_id)
            ->where('tournament', $tournament)
            ->where('team_id', $team_id)
            ->where('bt_status', 11)->first();

        MatchPlayers::where('match_id', $match_id)
            ->where('tournament', $tournament)
            ->where('team_id', $team_id)
            ->where('player_id', $nonstriker->player_id)
            ->update(['bt_status' => 11]);

        MatchPlayers::where('match_id', $match_id)
            ->where('tournament', $tournament)
            ->where('team_id', $team_id)
            ->where('player_id', $striker->player_id)
            ->update(['bt_status' => 10]);

    }

    public function CheckForOver($tournament, $match_id, $team_id, $attacker_id = NULL)
    {

        if ($attacker_id) {

            $bw_overball = MatchPlayers::select('bw_overball')->where('match_id', $match_id)
                ->where('tournament', $tournament)
                ->where('team_id', $team_id)
                ->where('player_id', $attacker_id)->first();

            MatchDetail::where('match_id', $match_id)
                ->where('tournament', $tournament)
                ->where('team_id', $team_id)
                ->update(['isOver' => 0]);

            // $rem = fmod($bw_overs->bw_overs,1);
            // if($rem > 0.5){
            if ($bw_overball->bw_overball > 5) {


                MatchPlayers::where('match_id', $match_id)
                    ->where('tournament', $tournament)
                    ->where('team_id', $team_id)
                    ->where('player_id', $attacker_id)
                    ->update(['bw_overball' => 0]);

                MatchPlayers::where('match_id', $match_id)
                    ->where('tournament', $tournament)
                    ->where('team_id', $team_id)
                    ->where('player_id', $attacker_id)
                    ->increment('bw_over', 1);

                MatchDetail::where('match_id', $match_id)
                    ->where('tournament', $tournament)
                    ->where('team_id', $team_id)
                    ->update(['isOver' => 1]);

//                dump("match player + 4");

            }
        } else {
            $overball = MatchDetail::select('overball')->where('match_id', $match_id)
                ->where('tournament', $tournament)
                ->where('team_id', $team_id)->first();

            // $rem = fmod($bt_overs->overs_played,1);
            // if($rem > 0.5){
            if ($overball->overball > 5) {
                MatchDetail::where('match_id', $match_id)
                    ->where('team_id', $team_id)
                    ->where('tournament', $tournament)
                    ->update(['overball' => 0]);

                MatchDetail::where('match_id', $match_id)
                    ->where('team_id', $team_id)
                    ->where('tournament', $tournament)
                    ->increment('over', 1);

                $this->StrikeRotate($match_id, $team_id, $tournament);
            }
        }
    }

    public function LiveUpdateShow($id, $tournament)
    {
        $matchs = Match::where('match_id', $id)->where('tournament', $tournament)->first();
        return view('Admin/LiveScore/show', compact('matchs'));
    }

    public function LiveUpdate(Request $request)
    {
        if ($request->ajax()) {


//            ye inning start karke dega
            if ($request->startInning) {
//                dump("are haa bahiiii");

//                batsman ko striker select karega
                MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bt_team_id)
                    ->where('player_id', $request->strike_id)
                    ->update(['bt_status' => 11]);

//                batsman ko non striker select karega
                MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bt_team_id)
                    ->where('player_id', $request->nonstrike_id)
                    ->update(['bt_status' => 10]);

//                bowler ko select karega
                MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bw_team_id)
                    ->where('player_id', $request->attacker_id)
                    ->update(['bw_status' => 11]);
            }

//            new over start karne ke liye
            if ($request->newOver) {

//                dump("is over is true");

//              current bowler fetch karega
                $current_bowler = MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bw_team_id)
                    ->where('bw_status', 11)->first();

//              current bowler ko bowling se hatayega
                $current_bowler->bw_status = 1;
                $current_bowler->save();

//                naye bowler ko bowling pe layega
                MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bw_team_id)
                    ->where('player_id', $request->attacker_id)
                    ->update(['bw_status' => 11]);


                MatchDetail::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bw_team_id)
                    ->update(['isOver' => 0]);

            }

            if ($request->newBatsman) {

//                dump("are new batsman ka mene hu");

//              current batsman fetch karega
                $current_batsman = MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bt_team_id)
                    ->where('bt_status', 11)->first();

//              current batsman ko batting se hatayega
                $current_batsman->wicket_type = $request->wicket_type;
                $current_batsman->wicket_primary = $request->wicket_primary;
                $current_batsman->bt_status = 0;
                $current_batsman->save();

//                naye batsman ko batting pe layega
                MatchPlayers::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bt_team_id)
                    ->where('player_id', $request->newBatsman_id)
                    ->update(['bt_status' => 11]);


                MatchDetail::where('match_id', $request->match_id)
                    ->where('tournament', $request->tournament)
                    ->where('team_id', $request->bt_team_id)
                    ->update(['isWicket' => 0]);

            }

            if ($request->value) {
                //for dot ball
                if ($request->value == 8) {
                    //Batsman update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_balls');

                    //Bowler update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    //Check for over
                    $this->CheckForOver($request->tournament, $request->match_id, $request->bw_team_id, $request->attacker_id);

                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('overball', 1);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 1 or $request->value == 2 or $request->value == 3) {

//                    ye run add karega aur ek ball add karega
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_runs', $request->value, ['bt_balls' => DB::raw('bt_balls + 1')]);

//                    ye strike rotate karega
                    if ($request->value == 1 or $request->value == 3)
                        $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

//                    ye bowler ke run add karega aur ball add karega
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);

//                    ye over ke liye check karega
                    $this->CheckForOver($request->tournament, $request->match_id, $request->bw_team_id, $request->attacker_id);

//                    ye team k score ko update karega aur ball bhi
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);

//                    ye team ke liye over check karega
                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 4) {
                    // dump($request->value);
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_runs', $request->value, ['bt_balls' => DB::raw('bt_balls + 1'),
                            'bt_fours' => DB::raw('bt_fours + 1')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bw_team_id, $request->attacker_id);

                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 6) {
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_runs', $request->value, ['bt_balls' => DB::raw('bt_balls + 1'),
                            'bt_sixes' => DB::raw('bt_sixes + 1')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bw_team_id, $request->attacker_id);

                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }

                if($request->value == "W"){
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->update(['isWicket' => 1]);

//                    team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('wicket', 1, ['overball' => DB::raw('overball + 1')]);

//                    batsman update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_balls');

//                    bowler update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1, ['bw_wickets' => DB::raw('bw_wickets + 1')]);
                }

                if ($request->value == 'wd') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 1, ['wide' => DB::raw('wide + 1')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 1, ['bw_wide' => DB::raw('bw_wide + 1')]);
                }
                if ($request->value == 'wd1') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 2, ['wide' => DB::raw('wide + 2')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 2, ['bw_wide' => DB::raw('bw_wide + 2')]);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                }
                if ($request->value == 'wd2') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 3, ['wide' => DB::raw('wide + 3')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 3, ['bw_wide' => DB::raw('bw_wide + 3')]);
                }
                if ($request->value == 'wd3') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 4, ['wide' => DB::raw('wide + 4')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 4, ['bw_wide' => DB::raw('bw_wide + 4')]);
                }
                if ($request->value == 'wd4') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 5, ['wide' => DB::raw('wide + 5')]);

                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 5, ['bw_wide' => DB::raw('bw_wide + 5')]);
                }

                if ($request->value == 'b1') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 1, ['overball' => DB::raw('overball + 1'), 'byes' => DB::raw('byes + 1')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'b2') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 2, ['overball' => DB::raw('overball + 1'), 'byes' => DB::raw('byes + 2')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'b3') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 3, ['overball' => DB::raw('overball + 1'), 'byes' => DB::raw('byes + 3')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'b4') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 4, ['overball' => DB::raw('overball + 1'), 'byes' => DB::raw('byes + 4')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }

                if ($request->value == 'lb1') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 1, ['overball' => DB::raw('overball + 1'), 'legbyes' => DB::raw('legbyes + 1')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'lb2') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 2, ['overball' => DB::raw('overball + 1'), 'legbyes' => DB::raw('legbyes + 2')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'lb3') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 3, ['overball' => DB::raw('overball + 1'), 'legbyes' => DB::raw('legbyes + 3')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }
                if ($request->value == 'lb4') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 4, ['overball' => DB::raw('overball + 1'), 'legbyes' => DB::raw('legbyes + 4')]);


                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_overball', 1);

                    $this->CheckForOver($request->tournament, $request->match_id, $request->bt_team_id);
                }

                if ($request->value == 'nb') {
                    //Team update
                    MatchDetail::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->increment('score', 1, ['no_ball' => DB::raw('no_ball + 1')]);

                    //batsman update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bt_team_id)
                        ->where('player_id', $request->player_id)
                        ->increment('bt_runs', 1, ['bt_balls' => DB::raw('bt_balls + 1')]);

                    //bowler update
                    MatchPlayers::where('match_id', $request->match_id)
                        ->where('tournament', $request->tournament)
                        ->where('team_id', $request->bw_team_id)
                        ->where('player_id', $request->attacker_id)
                        ->increment('bw_runs', 1, ['bw_nb' => DB::raw('bw_nb + 1')]);

                    $this->StrikeRotate($request->match_id, $request->bt_team_id, $request->tournament);

                }

            }

            $userjobs = "true";
            // $returnHTML = view('Admin/LiveScore/show')->with('userjobs', $userjobs)->render();
            // return response()->json(array('success' => true, 'html'=>$returnHTML));

            return response()->json(compact('userjobs'), 200);
            // return response()->json(['message'=>$request->value]);
        }

        // $product = "heii";
        // return Response::json(array(view('Admin/LiveScore/show')->with('product',$product),'product'=>$product));
    }
}




// bt_status
// 11 = striker
// 10 = non striker
// DNB = Did not bat
// 0 = out
// 1 = notout

//bw_status
// 11 = attacker
// 10 = inning yes
// DNB = Did not ball
