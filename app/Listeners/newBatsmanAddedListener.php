<?php

namespace App\Listeners;

use App\Events\wicketEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class newBatsmanAddedListener
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
     * @param  wicketEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->newBatsman_id)
            ->update(['bt_status' => 11]);

         if($event->request->isBatsmanCross){
             $nonstriker_batsman = MatchPlayers::where('match_id', $event->request->match_id)
                 ->where('tournament_id', $event->request->tournament)
                 ->where('team_id', $event->request->bt_team_id)
                 ->where('bt_status', 10)->first();
             $nonstriker_batsman->bt_status = 11;
             $nonstriker_batsman->save();

             MatchPlayers::where('match_id', $event->request->match_id)
                 ->where('tournament_id', $event->request->tournament)
                 ->where('team_id', $event->request->bt_team_id)
                 ->where('player_id', $event->request->newBatsman_id)
                 ->update(['bt_status' => 10]);
         }

    }
}
