<?php

namespace App\Listeners;

use App\Events\twoRunEvent;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class batsmanTwoRunUpdateListener
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
     * @param  twoRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchPlayers::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->where('player_id', $event->request->player_id)
            ->increment('bt_runs',2);


       /* MatchPlayers::where('match_id', $request->match_id)
            ->where('tournament_id', $request->tournament)
            ->where('team_id', $request->bt_team_id)
            ->where('player_id', $request->player_id)
            ->increment('bt_runs', $request->value, ['bt_balls' => DB::raw('bt_balls + 1')]);*/
    }
}
