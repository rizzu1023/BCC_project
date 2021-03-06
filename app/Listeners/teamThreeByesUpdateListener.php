<?php

namespace App\Listeners;

use App\Events\byesThreeRunEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class teamThreeByesUpdateListener
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
     * @param  byesThreeRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->increment('byes',3);

        /* MatchDetail::where('match_id', $request->match_id)
             ->where('tournament_id', $request->tournament)
             ->where('team_id', $request->bt_team_id)
             ->increment('score', 1, ['overball' => DB::raw('overball + 1'), 'legbyes' => DB::raw('legbyes + 1')]);*/
    }
}
