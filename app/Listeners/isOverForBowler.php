<?php

namespace App\Listeners;

use App\Events\strikeRotateEvent;
use App\MatchDetail;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class isOverForBowler
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
     * @param  strikeRotateEvent  $event
     * @return void
     */
    public function handle($event)
    {
        $bw_overball = MatchPlayers::select('bw_overball')->where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)->first();

        if ($bw_overball->bw_overball > 5) {

            MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bw_team_id)
                ->where('player_id', $event->request->attacker_id)
                ->update(['bw_overball' => 0]);

            MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bw_team_id)
                ->where('player_id', $event->request->attacker_id)
                ->increment('bw_over');

        }
    }
}
