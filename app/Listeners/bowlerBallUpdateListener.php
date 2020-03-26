<?php

namespace App\Listeners;

use App\Events\dotBallEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class bowlerBallUpdateListener
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
     * @param  dotBallEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)
            ->increment('bw_overball');
    }
}
