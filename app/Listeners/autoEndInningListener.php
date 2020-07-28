<?php

namespace App\Listeners;

use App\Events\autoEndInningEvent;
use App\Match;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class autoEndInningListener
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
     * @param  autoEndInningEvent  $event
     * @return void
     */
    public function handle($event)
    {
//        $match = Match::where('match_id',$event->request->match_id)
//            ->where('tournament_id',$event->request->tournament)
//            ->increment('status');

//        if($match->status == 2){
//
//        }
    }
}
