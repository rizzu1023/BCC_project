<?php

namespace App\Listeners;

use App\Events\OneRunEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class teamOneRunUpdateListener
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
     * @param  OneRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
       /* MatchDetail::where('match_id', $request->match_id)
            ->where('tournament', $request->tournament)
            ->where('team_id', $request->bt_team_id)
            ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);*/

        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->increment('score');
    }
}
