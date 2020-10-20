<?php

namespace App\Http\Controllers;


use App\Events\byesFourRunEvent;
use App\Events\byesOneRunEvent;
use App\Events\byesThreeRunEvent;
use App\Events\byesTwoRunEvent;
use App\Events\DeclareBatsmanEvent;
use App\Events\dotBallEvent;
use App\Events\endInningEvent;
use App\Events\fiveRunEvent;
use App\Events\fourRunEvent;
use App\Events\legByesFourRunEvent;
use App\Events\legByesOneRunEvent;
use App\Events\legByesThreeRunEvent;
use App\Events\legByesTwoRunEvent;
use App\Events\newOverEvent;
use App\Events\noballFiveRunEvent;
use App\Events\noballFourRunEvent;
use App\Events\noballOneRunEvent;
use App\Events\noballSixRunEvent;
use App\Events\noballThreeRunEvent;
use App\Events\noballTwoRunEvent;
use App\Events\noballZeroRunEvent;
use App\Events\oneRunEvent;
use App\Events\RetiredHurtBatsmanEvent;
use App\Events\reverseDotBallEvent;
use App\Events\reverseEndInningEvent;
use App\Events\reverseFiveRunEvent;
use App\Events\reverseFourRunEvent;
use App\Events\reverseNoballFiveRunEvent;
use App\Events\reverseNoballFourRunEvent;
use App\Events\reverseNoballOneRunEvent;
use App\Events\reverseNoballSixRunEvent;
use App\Events\reverseNoballThreeRunEvent;
use App\Events\reverseNoballTwoRunEvent;
use App\Events\reverseNoballZeroRunEvent;
use App\Events\reverseOneRunEvent;
use App\Events\reverseSixRunEvent;
use App\Events\reverseThreeRunEvent;
use App\Events\reverseTwoRunEvent;
use App\Events\reverseWicketEvent;
use App\Events\reverseWideZeroRunEvent;
use App\Events\sixRunEvent;
use App\Events\startInningEvent;
use App\Events\strikeRotateEvent;
use App\Events\testingEvent;
use App\Events\twoRunEvent;
use App\Events\threeRunEvent;
use App\Events\wicketEvent;
use App\Events\wideFourRunEvent;
use App\Events\wideOneRunEvent;
use App\Events\wideThreeRunEvent;
use App\Events\wideTwoRunEvent;
use App\Events\wideZeroRunEvent;
use App\Http\Resources\MatchDetailResource;
use App\Http\Resources\MatchResource;
use App\MatchTrack;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Teams;
use App\Schedule;
use App\Players;
use App\MatchPlayers;
use App\Match;
use App\MatchDetail;


class LiveScoreController extends Controller
{
    public function LiveScoreIndex()
    {
        $schedule = Schedule::WhereIn('tournament_id', function($query) {
            $query->select('id')
                ->from('tournaments')
                ->where('user_id', auth()->user()->id);
        })->get();
        $start = Match::all();
        return view('Admin/LiveScore/index', compact('schedule', 'start'));
    }

    public function StartScore($id)
    {
        $schedule = Schedule::where('id', $id)->first();
        $team1_id = $schedule->team1_id;
        $players1 = Players::whereHas('teams',function ($query) use($team1_id){
            $query->where('team_id',$team1_id);
        })->get();
        $team2_id = $schedule->team2_id;
        $players2 = Players::whereHas('teams',function ($query) use($team2_id){
            $query->where('team_id',$team2_id);
        })->get();

        return view('Admin/LiveScore/StartScore', compact('schedule', 'players1', 'players2'));
    }

    public function ScoreDetails(Request $request)
    {
//        return $request->all();
            $m = Match::create([
            'match_id' => request('id'),
            'overs' => request('overs'),
            'tournament_id' => request('tournament_id'),
            'toss' => request('toss'),
            'choose' => request('choose'),
        ]);

        if($request->choose == 'Bat')
            if($request->toss == $request->team1_id){
                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team1_id'),
                    'isBatting' => 1,
                    'tournament_id' => request('tournament_id'),
                ]);

                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team2_id'),
                    'isBatting' => 0,
                    'tournament_id' => request('tournament_id'),
                ]);
            }
            else{
                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team1_id'),
                    'isBatting' => 0,
                    'tournament_id' => request('tournament_id'),
                ]);

                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team2_id'),
                    'isBatting' => 1,
                    'tournament_id' => request('tournament_id'),
                ]);
            }

        else{
            if($request->toss == $request->team1_id){
                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team1_id'),
                    'isBatting' => 0,
                    'tournament_id' => request('tournament_id'),
                ]);

                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team2_id'),
                    'isBatting' => 1,
                    'tournament_id' => request('tournament_id'),
                ]);
            }
            else{
                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team1_id'),
                    'isBatting' => 1,
                    'tournament_id' => request('tournament_id'),
                ]);

                MatchDetail::create([
                    'match_id' => $m->match_id,
                    'team_id' => request('team2_id'),
                    'isBatting' => 0,
                    'tournament_id' => request('tournament_id'),
                ]);
            }
        }
        foreach($request->team1 as $t1){
            MatchPlayers::create([
                'match_id' => $m->match_id,
                'player_id' => $t1,
                'team_id' => $request->team1_id,
                'tournament_id' => request('tournament_id'),
            ]);
        }
        foreach($request->team2 as $t2){
            MatchPlayers::create([
                'match_id' => $m->match_id,
                'player_id' => $t2,
                'team_id' => $request->team2_id,
                'tournament_id' => request('tournament_id'),
            ]);
        }
        return redirect('/admin/tournaments/'.request('tournament_id').'/schedules');
    }



    public function LiveUpdateShow($id, $tournament)
    {
        $matchs = Match::where('match_id', $id)->where('tournament_id', $tournament)->first();
        $over = MatchTrack::where('match_id',$id)->where('tournament_id',$tournament)->latest()->get()->take(10);
        $over = $over->reverse();
        return view('Admin/LiveScore/show', compact('over','matchs'));
    }

    public function LiveScoreCard($id, $tournament)
    {

        $matchs = Match::where('match_id', $id)->where('tournament_id', $tournament)->first();

        return view('Admin/LiveScore/scorecard', compact('matchs'));
    }

    public function MatchData($id, $tournament){
        $data = Match::where('match_id', $id)->where('tournament_id', $tournament)->first();
        return new MatchResource($data);
    }

    public function LiveUpdate(Request $request)
    {

        if ($request->ajax()) {
            if ($request->startInning) event(new startInningEvent($request));
            if ($request->newOver) event(new newOverEvent($request));

             if($request->endInning){event(new endInningEvent($request));}
        }

        if ($request->value) {
            if ($request->value == 'W') {event(new wicketEvent($request));}

            if ($request->value == 8) event(new dotBallEvent($request));
            if ($request->value == 1) event(new oneRunEvent($request));
            if ($request->value == 2) event(new twoRunEvent($request));
            if ($request->value == 3) event(new threeRunEvent($request));
            if ($request->value == 4) event(new fourRunEvent($request));
            if ($request->value == 5) event(new fiveRunEvent($request));
            if ($request->value == 6) event(new sixRunEvent($request));

            if ($request->value == 'wd') event(new wideZeroRunEvent($request));
            if ($request->value == 'wd1') event(new wideOneRunEvent($request));
            if ($request->value == 'wd2') event(new wideTwoRunEvent($request));
            if ($request->value == 'wd3') event(new wideThreeRunEvent($request));
            if ($request->value == 'wd4') event(new wideFourRunEvent($request));

            if ($request->value == 'b1') event(new byesOneRunEvent($request));
            if ($request->value == 'b2') event(new byesTwoRunEvent($request));
            if ($request->value == 'b3') event(new byesThreeRunEvent($request));
            if ($request->value == 'b4') event(new byesFourRunEvent($request));

            if ($request->value == 'lb1') event(new legByesOneRunEvent($request));
            if ($request->value == 'lb2') event(new legByesTwoRunEvent($request));
            if ($request->value == 'lb3') event(new legByesThreeRunEvent($request));
            if ($request->value == 'lb4') event(new legByesFourRunEvent($request));

            if ($request->value == 'nb') event(new noballZeroRunEvent($request));
            if ($request->value == 'nb1') event(new noballOneRunEvent($request));
            if ($request->value == 'nb2') event(new noballTwoRunEvent($request));
            if ($request->value == 'nb3') event(new noballThreeRunEvent($request));
            if ($request->value == 'nb4') event(new noballFourRunEvent($request));
            if ($request->value == 'nb5') event(new noballFiveRunEvent($request));
            if ($request->value == 'nb6') event(new noballSixRunEvent($request));

            if ($request->value == 'rh') event(new RetiredHurtBatsmanEvent($request));
            if ($request->value == 'sr') event(new strikeRotateEvent($request));

            if($request->value == 'reverse_inning') event(new reverseEndInningEvent($request));

            if ($request->value == 'undo'){
                $previous_ball = MatchTrack::where('team_id',$request->bt_team_id)->where('match_id',$request->match_id)->where('tournament_id',$request->tournament)->latest()->first();
                if ($previous_ball->action == 'zero') event(new reverseDotBallEvent($request,$previous_ball));
                if ($previous_ball->action == 'one') event(new reverseOneRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'two') event(new reverseTwoRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'three') event(new reverseThreeRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'four') event(new reverseFourRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'five') event(new reverseFiveRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'six') event(new reverseSixRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'wd') event(new reverseWideZeroRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'wicket') event(new reverseWicketEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb') event(new reverseNoballZeroRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb1') event(new reverseNoballOneRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb2') event(new reverseNoballTwoRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb3') event(new reverseNoballThreeRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb4') event(new reverseNoballFourRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb5') event(new reverseNoballFiveRunEvent($request,$previous_ball));
                if ($previous_ball->action == 'nb6') event(new reverseNoballSixRunEvent($request,$previous_ball));
            }

            $userjobs = "true";
            // $returnHTML = view('Admin/LiveScore/show')->with('userjobs', $userjobs)->render();
            // return response()->json(array('success' => true, 'html'=>$returnHTML));

             return response()->json(['message'=>'done']);
//            return response()->json(compact('userjobs'), 200);
        }
    }
}

// bt_status
// 11 = striker
// 10 = non striker
// DNB = Did not bat

// 12 = retired hurt
// 0 = out
// 1 = notout

//bw_status
// 11 = attacker
// 1 = inning yes
// DNB = Did not ball



