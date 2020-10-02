<?php

namespace App\Listeners;

use App\Events\DeclareBatsmanEvent;
use App\MatchPlayers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeclareBatsmanListener
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
     * @param  DeclareBatsmanEvent  $event
     * @return void
     */
    public function handle(DeclareBatsmanEvent $event)
    {
        $declared_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->declareBatsman_id)->first();

        $new_batsman = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->newBatsman_id)->first();

        $strike_status = $declared_batsman->bt_status;
        $declared_batsman->bt_status = 9;
        $declared_batsman->save();

        if($strike_status == 10){
            $new_batsman->bt_status = 10;
        }
        else{
            $new_batsman->bt_status = 11;
        }

        $new_batsman->save();
    }
}
