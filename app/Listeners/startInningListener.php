<?php

namespace App\Listeners;

use App\Events\startInningEvent;
use App\Match;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class startInningListener
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
     * @param  startInningEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->strike_id)
            ->update(['bt_status' => 11]);

//                batsman ko non striker select karega
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->nonstrike_id)
            ->update(['bt_status' => 10]);

//                bowler ko select karega
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bw_team_id)
            ->where('player_id', $event->request->attacker_id)
            ->update(['bw_status' => 11]);

        $match = Match::where('match_id',$event->request->match_id)
            ->where('tournament_id',$event->request->tournament)
            ->increment('status');
    }
}
