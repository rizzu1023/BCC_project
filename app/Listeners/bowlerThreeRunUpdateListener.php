<?php

namespace App\Listeners;

use App\Events\threeRunEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class bowlerThreeRunUpdateListener
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
     * @param  threeRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)
            ->increment('bw_runs',3);

        /*MatchPlayers::where('match_id', $request->match_id)
            ->where('tournament_id', $request->tournament)
            ->where('team_id', $request->bw_team_id)
            ->where('player_id', $request->attacker_id)
            ->increment('bw_runs', $request->value, ['bw_overball' => DB::raw('bw_overball + 1')]);*/
    }
}
