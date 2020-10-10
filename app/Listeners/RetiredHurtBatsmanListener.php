<?php

namespace App\Listeners;

use App\Events\RetiredHurtBatsmanEvent;
use App\MatchPlayers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RetiredHurtBatsmanListener
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
     * @param  RetiredHurtBatsmanEvent  $event
     * @return void
     */
    public function handle(RetiredHurtBatsmanEvent $event)
    {
        $retired_hurt_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->retiredHurtBatsman_id)->first();

        $new_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->newBatsman_id)->first();

        $highest_batting_order = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('bt_order','<',100)
            ->max('bt_order');

        $strike_status = $retired_hurt_batsman->bt_status;
        $retired_hurt_batsman->bt_status = 12;
        $retired_hurt_batsman->save();

        if($strike_status == 10){
            $new_batsman->bt_status = 10;
        }
        else{
            $new_batsman->bt_status = 11;
        }

        $new_batsman->bt_order = $highest_batting_order + 1;
        $new_batsman->save();
    }
}
