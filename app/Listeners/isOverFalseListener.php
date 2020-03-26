<?php

namespace App\Listeners;

use App\Events\newOverEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class isOverFalseListener
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
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->update(['isOver' => 0]);
    }
}
