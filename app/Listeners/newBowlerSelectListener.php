<?php

namespace App\Listeners;

use App\Events\newOverEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class newBowlerSelectListener
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
     * @param  newOverEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->newBowler_id)
            ->update(['bw_status' => 11]);
    }
}
