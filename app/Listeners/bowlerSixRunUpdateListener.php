<?php

namespace App\Listeners;

use App\Events\sixRunEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class bowlerSixRunUpdateListener
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
     * @param  sixRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)
            ->increment('bw_runs',6);

        /*MatchPlayers::where('match_id', $request->match_id)
            ->where('tournament', $request->tournament)
            ->where('team_id', $request->bw_team_id)
            ->where('player_id', $request->attacker_id)
            ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);*/
    }
}
