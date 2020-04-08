<?php

namespace App\Listeners;

use App\MatchDetail;
use App\MatchTrack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class matchTrackListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $match_detail = MatchDetail::select('score','wicket','over','overball')->where('team_id',$event->request->bt_team_id)->where('tournament_id',$event->request->tournament)->where('match_id',$event->request->match_id)->first();
        $action = '--';
        $run = 0;
        if($event->request->value == '8'){$action = 'zero';$run = 0;}
        elseif ($event->request->value == '1'){$action = 'one';$run = 1;}
        elseif ($event->request->value == '2'){$action = 'two';$run = 2;}
        elseif ($event->request->value == '3'){$action = 'three';$run = 3;}
        elseif ($event->request->value == '4'){$action = 'four';$run = 4;}
        elseif ($event->request->value == '5'){$action = 'five';$run = 5;}
        elseif ($event->request->value == '6'){$action = 'six';$run = 6;}

        elseif ($event->request->value == 'wd'){$action = 'wd';$run = 1;}
        elseif ($event->request->value == 'wd1'){$action = 'wd1';$run = 2;}
        elseif ($event->request->value == 'wd2'){$action = 'wd2';$run = 3;}
        elseif ($event->request->value == 'wd3'){$action = 'wd3';$run = 4;}
        elseif ($event->request->value == 'wd4'){$action = 'wd4';$run = 5;}

        elseif ($event->request->value == 'b1'){$action = 'b1';$run = 1;}
        elseif ($event->request->value == 'b2'){$action = 'b2';$run = 2;}
        elseif ($event->request->value == 'b3'){$action = 'b3';$run = 3;}
        elseif ($event->request->value == 'b4'){$action = 'b4';$run = 4;}

        elseif ($event->request->value == 'lb1'){$action = 'lb1';$run = 1;}
        elseif ($event->request->value == 'lb2'){$action = 'lb2';$run = 2;}
        elseif ($event->request->value == 'lb3'){$action = 'lb3';$run = 3;}
        elseif ($event->request->value == 'lb4'){$action = 'lb4';$run = 4;}

        elseif ($event->request->value == 'nb'){$action = 'nb';$run = 1;}
        elseif ($event->request->value == 'nb1'){$action = 'nb1';$run = 2;}
        elseif ($event->request->value == 'nb2'){$action = 'nb2';$run = 3;}
        elseif ($event->request->value == 'nb3'){$action = 'nb3';$run = 4;}
        elseif ($event->request->value == 'nb4'){$action = 'nb4';$run = 5;}
        elseif ($event->request->value == 'nb5'){$action = 'nb5';$run = 6;}
        elseif ($event->request->value == 'nb6'){$action = 'nob6';$run = 7;}

        elseif ($event->request->value == 'runout'){$action = 'wicket';$run = 0;}
        elseif ($event->request->value == 'lbw' || $event->request->value == 'bold' || $event->request->value == 'catch' || $event->request->value == 'stump'){$action = 'wicket';$run = 0;}

        if($match_detail) {
            MatchTrack::create([
                'match_id' => $event->request->match_id,
                'team_id' => $event->request->bt_team_id,
                'player_id' => $event->request->player_id,
                'attacker_id' => $event->request->attacker_id,
                'score' => $match_detail->score,
                'wickets' => $match_detail->wicket,
                'action' => $action,
                'run' => $run,
                'over' => $match_detail->over,
                'overball' => $match_detail->overball,
                'tournament_id' => $event->request->tournament,
            ]);
        }
    }
}
