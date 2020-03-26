<?php

namespace App\Listeners;

use App\Events\byesFourRunEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class teamFourByesUpdateListener
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
     * @param  byesFourRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->increment('byes',4);
    }
}
