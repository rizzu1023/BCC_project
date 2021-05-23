<?php

namespace App\Http\Controllers\API\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ScheduleDetailResource;
use App\MatchDetail;
use App\MatchPlayers;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatchLiveScoreController extends Controller
{
    public function getScheduleDetail($schedule_id)
    {
        $schedule = Schedule::with('Teams1','Teams2')->where('id',$schedule_id)->first();
        if($schedule){
            return response()->json(['status' => true, 'data' => new ScheduleDetailResource($schedule)]);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Match not found']);
        }
    }


    public function selectPlayingXI(Request $request)
    {
        $rules = [
            'match_id' => 'required|integer|exists:schedules,id',
            'overs' => 'required|integer',
            'toss' => 'required',
            'choose' => 'required|string',
            'team1_id' => 'required|integer',
            'team2_id' => 'required|integer',
            'team1_players' => 'required|array',
            'team2_players' => 'required|array',
            'team1_player.*.player_id' => 'required',
            'team2_player.*.player_id' => 'required',
            'tournament_id' => 'required|integer|exists:tournaments,id'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
        else{
            DB::transaction( function() use($request){
                $game = Game::create([
                    'match_id' => $request->match_id,
                    'overs' => $request->overs,
                    'tournament_id' => $request->tournament_id,
                    'toss' => $request->toss,
                    'choose' => $request->choose == '1' ? 'Bat' : 'Bowl',
                ]);

                if ($request->choose == '1')   // 1 => Batting, 0 => Bowling
                    if ((int)$request->toss == $request->team1_id) {
                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team1_id,
                            'isBatting' => 1,
                            'tournament_id' => $request->tournament_id,
                        ]);

                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team2_id,
                            'isBatting' => 0,
                            'tournament_id' => $request->tournament_id,
                        ]);
                    } else {
                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team1_id,
                            'isBatting' => 0,
                            'tournament_id' => $request->tournament_id,
                        ]);

                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team2_id,
                            'isBatting' => 1,
                            'tournament_id' => $request->tournament_id,
                        ]);
                    }

                else {
                    if ((int)$request->toss == $request->team1_id) {
                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team1_id,
                            'isBatting' => 0,
                            'tournament_id' => $request->tournament_id,
                        ]);

                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team2_id,
                            'isBatting' => 1,
                            'tournament_id' => $request->tournament_id,
                        ]);
                    } else {
                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team1_id,
                            'isBatting' => 1,
                            'tournament_id' => $request->tournament_id,
                        ]);

                        MatchDetail::create([
                            'match_id' => $game->match_id,
                            'team_id' => $request->team2_id,
                            'isBatting' => 0,
                            'tournament_id' => $request->tournament_id,
                        ]);
                    }
                }

                foreach ($request->team1_players as $t1) {
                    MatchPlayers::create([
                        'match_id' => $game->match_id,
                        'player_id' => $t1['player_id'],
                        'team_id' => $request->team1_id,
                        'tournament_id' => request('tournament_id'),
                    ]);
                }
                foreach ($request->team2_players as $t2) {
                    MatchPlayers::create([
                        'match_id' => $game->match_id,
                        'player_id' => $t2['player_id'],
                        'team_id' => $request->team2_id,
                        'tournament_id' => request('tournament_id'),
                    ]);
                }
            });


            return response()->json(['status' => true, 'data' => $request->all()],201);
        }


    }
}
