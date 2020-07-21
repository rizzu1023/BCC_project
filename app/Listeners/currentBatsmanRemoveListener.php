<?php

namespace App\Listeners;

use App\Events\wicketEvent;
use App\MatchPlayers;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class currentBatsmanRemoveListener
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
     * @param wicketEvent $event
     * @return void
     */
    public function handle($event)
    {
            $current_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('bt_status', 11)->first();


            $current_batting_team = MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->first();

        if ($event->request->wicket_type == 'bold' || $event->request->wicket_type == 'lbw' || $event->request->wicket_type == 'hitwicket') {
            $current_batsman->wicket_type = $event->request->wicket_type;
            $current_batsman->wicket_primary = $event->request->wicket_primary;
            $current_batsman->bt_balls = $current_batsman->bt_balls + 1;
            $current_batsman->bt_status = 0;
            $current_batsman->save();
        }
        if ($event->request->wicket_type == 'catch' || $event->request->wicket_type == 'stump') {
            $current_batsman->wicket_type = $event->request->wicket_type;
            $current_batsman->wicket_primary = $event->request->wicket_primary;
            $current_batsman->wicket_secondary = $event->request->wicket_secondary;
            $current_batsman->bt_balls = $current_batsman->bt_balls + 1;
            $current_batsman->bt_status = 0;
            $current_batsman->save();
        }
        if ($event->request->wicket_type == 'runout' ) {

            $current_batsman->bt_runs = $current_batsman->bt_runs + $event->request->run_scored;
            $current_batsman->save();     
            
            $current_batting_team->score = $current_batting_team->score + $event->request->run_scored;
            $current_batting_team->save();

            $got_out_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->batsman_runout)->first();

            $got_out_batsman->bt_status = 0;
            $got_out_batsman->wicket_type = $event->request->wicket_type;
            $got_out_batsman->wicket_primary = $event->request->wicket_primary;
            if($event->request->wicket_scondary)
            $got_out_batsman->wicket_secondary = $event->request->wicket_secondary;
            else
            $got_out_batsman->wicket_secondary = '--';
            $got_out_batsman->bt_balls = $got_out_batsman->bt_balls + 1;
            $got_out_batsman->save();
        }
    }

}
