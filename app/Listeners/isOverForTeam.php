<?php

namespace App\Listeners;

use App\Events\strikeRotateEvent;
use App\MatchDetail;
use App\Match;
use App\MatchPlayers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class isOverForTeam
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
     * @param strikeRotateEvent $event
     * @return void
     */
    public function handle($event)
    {
        $overball = MatchDetail::where('match_id', $event->request->match_id)
            ->where('tournament_id', $event->request->tournament)
            ->where('team_id', $event->request->bt_team_id)->first();



        if ($overball->overball > 5) {
            MatchDetail::where('match_id', $event->request->match_id)
                ->where('team_id', $event->request->bt_team_id)
                ->where('tournament_id', $event->request->tournament)
                ->update(['overball' => 0]);

            MatchDetail::where('match_id', $event->request->match_id)
                ->where('team_id', $event->request->bt_team_id)
                ->where('tournament_id', $event->request->tournament)
                ->increment('over');

            MatchDetail::where('match_id', $event->request->match_id)
                ->where('tournament_id', $event->request->tournament)
                ->where('team_id', $event->request->bt_team_id)
                ->update(['isOver' => 1]);

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


        // if($overball->over == '2'){
        //     MatchDetail::where('match_id', $event->request->match_id)
        //     ->where('team_id', $event->request->bt_team_id)
        //     ->where('tournament_id', $event->request->tournament)
        //     ->update(['isBatting' => 0]);

        //     MatchDetail::where('match_id', $event->request->match_id)
        //     ->where('team_id', $event->request->bw_team_id)
        //     ->where('tournament_id', $event->request->tournament)
        //     ->update(['isBatting' => 1]);
        // }


    }
}
