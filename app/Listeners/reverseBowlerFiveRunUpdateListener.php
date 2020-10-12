<?php

namespace App\Listeners;

use App\Events\reverseFiveRunEvent;
use App\MatchPlayers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class reverseBowlerFiveRunUpdateListener
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
     * @param  reverseFiveRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        $striker = MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('bw_status', 11)->first();

        $striker->bw_runs = $striker->bw_runs - 5;
        $striker->save();
    }
}
