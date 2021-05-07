<?php

namespace App\Listeners;

use App\Events\strikeRotateEvent;
use App\MatchPlayers;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use function GuzzleHttp\Psr7\str;

class  strikeRotateListener
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
     * @param  strikeRotateEvent  $event
     * @return void
     */
    public function handle($event)
    {
        $query = MatchPlayers::select('player_id','bt_status')->where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)
            ->whereIn('bt_status', [10,11])->get();

        $nonstriker = $query->where('bt_status', 10)->first();

        $striker = $query->where('bt_status', 11)->first();

        DB::transaction(function() use ($nonstriker,$striker){
            $nonstriker->update(['bt_status' => 11]);
            $striker->update(['bt_status' => 10]);
        });





    }
}
