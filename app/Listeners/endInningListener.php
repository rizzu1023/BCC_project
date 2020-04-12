<?php

namespace App\Listeners;

use App\Match;
use App\MatchDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class endInningListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $match = Match::where('match_id',$event->request->match_id)
            ->where('tournament_id',$event->request->tournament)
            ->increment('status');

        $inning1 = MatchDetail::where('match_id',$event->request->match_id)
            ->where('tournament_id',$event->request->tournament)
            ->where('isBatting',1)
            ->first();

        $inning0 = MatchDetail::where('match_id',$event->request->match_id)
            ->where('tournament_id',$event->request->tournament)
            ->where('isBatting',0)
            ->first();

        $inning1->isBatting = 0;
        $inning0->isBatting = 1;
        $inning1->save();
        $inning0->save();

    }
}