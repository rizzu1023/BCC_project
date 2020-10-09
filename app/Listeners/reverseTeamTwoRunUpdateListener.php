<?php

namespace App\Listeners;

use App\Events\reverseTwoRunEvent;
use App\MatchDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class reverseTeamTwoRunUpdateListener
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
     * @param  reverseTwoRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->decrement('score',2);
    }
}
