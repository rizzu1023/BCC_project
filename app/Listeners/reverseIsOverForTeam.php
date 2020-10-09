<?php

namespace App\Listeners;

use App\Events\reverseOneRunEvent;
use App\MatchDetail;
use App\MatchPlayers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class reverseIsOverForTeam
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
     * @param  reverseOneRunEvent  $event
     * @return void
     */
    public function handle($event)
    {
        $overball = MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)->first();



        if ($overball->overball == 0) {
            MatchDetail::where('match_id', $event->request->match_id)
                ->where('team_id', $event->request->bt_team_id)
                ->where('tournament_id', $event->request->tournament)
                ->update(['overball' => 6]);

            MatchDetail::where('match_id', $event->request->match_id)
                ->where('team_id', $event->request->bt_team_id)
                ->where('tournament_id', $event->request->tournament)
                ->decrement('over');

//            MatchDetail::where('match_id', $event->request->match_id)
//                ->where('tournament_id', $event->request->tournament)
//                ->where('team_id', $event->request->bt_team_id)
//                ->update(['isOver' => 1]);

            //strike Rotation

            $nonstriker = MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bt_team_id)
                ->where('bt_status', 10)->first();

            $striker = MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bt_team_id)
                ->where('bt_status', 11)->first();

            MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bt_team_id)
                ->where('player_id', $nonstriker->player_id)
                ->update(['bt_status' => 11]);

            MatchPlayers::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bt_team_id)
                ->where('player_id', $striker->player_id)
                ->update(['bt_status' => 10]);
        }
    }
}
