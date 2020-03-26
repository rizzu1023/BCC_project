<?php

namespace App\Listeners;

use App\Events\twoRunEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class teamTwoRunUpdateListener
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
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->increment('score',2);

        /*MatchDetail::where('match_id', $request->match_id)
            ->where('tournament_id', $request->tournament)
            ->where('team_id', $request->bt_team_id)
            ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);*/
    }
}
