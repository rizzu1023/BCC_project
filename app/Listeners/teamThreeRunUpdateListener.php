<?php

namespace App\Listeners;

use App\Events\threeRunEvent;
use App\MatchDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class teamThreeRunUpdateListener
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
        MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->increment('score',3);

        /*MatchDetail::where('match_id', $request->match_id)
            ->where('tournament_id', $request->tournament)
            ->where('team_id', $request->bt_team_id)
            ->increment('score', $request->value, ['overball' => DB::raw('overball + 1')]);*/
    }
}
