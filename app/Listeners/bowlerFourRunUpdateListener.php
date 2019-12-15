<?php

namespace App\Listeners;

use App\Events\fourRunEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class bowlerFourRunUpdateListener
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
     * @param  fourRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)
            ->increment('bw_runs',4);

        /*MatchPlayers::where('match_id', $request->match_id)
            ->where('tournament', $request->tournament)
            ->where('team_id', $request->bw_team_id)
            ->where('player_id', $request->attacker_id)
            ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);*/
    }
}
