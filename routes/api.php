<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

////Route::get('/players','MainController@players');
//Route::get('/data/{id}/{tournament}', 'LiveScoreController@MatchData');
//
//Route::prefix('admin')->group(function () {
//
////    Route::apiResource('/Players', 'API\PlayersController');
//
//    Route::apiResource('/Team', 'API\TeamController');
//
//    Route::apiResource('/Schedule', 'API\ScheduleController');
//
//    Route::apiResource('/Batting', 'API\BattingController');
//    Route::apiResource('/Bowling', 'API\BowlingController');
//
//});
//
//Route::apiResource('/tournament', 'API\TournamentController');
//Route::apiResource('/tournaments.teams', 'API\TeamController');
//Route::apiResource('/tournaments.schedules', 'API\ScheduleController');
////Route::apiResource('/teams.players', 'API\PlayersController');
//Route::get('/tournaments/{tournament_id}/results','API\ScheduleController@results');
//
//Route::get('/teams/{team}/players','API\PlayersController@index');
//Route::get('/player/{player_id}','API\PlayersController@show');
//
//Route::get('/stats/{tournament_id}/{type}', 'API\StatsController@data');
//
//Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/matchInfo','API\MatchController@matchInfo');
//Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/live','API\MatchController@live');
//Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/scorecard','API\MatchController@scorecard');
//Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/overs','API\MatchController@overs');
//
//Route::get('/tournament/{tournament_id}/points-table','API\PointsTableController@index');



Route::get('/tournaments', [\App\Http\Controllers\API\TournamentController::class,'index']);

Route::get('/tournaments/{tournament}/schedules',[\App\Http\Controllers\API\ScheduleController::class,'schedules']);
Route::get('/tournaments/{tournament}/results',[\App\Http\Controllers\API\ScheduleController::class,'results']);
Route::get('/tournaments/{tournament}/teams',[\App\Http\Controllers\API\TournamentController::class,'teams']);
Route::get('/tournaments/{tournament}/stats/{stats_type}',[\App\Http\Controllers\API\StatsController::class,'data']);
Route::get('/tournaments/{tournament}/points-table',[\App\Http\Controllers\API\TournamentController::class,'points_table']);

Route::get('/tournaments/{tournament}/matches/{match_id}/match-info',[\App\Http\Controllers\API\MatchController::class,'match_info']);
Route::get('/tournaments/{tournament}/matches/{match_id}/match-live',[\App\Http\Controllers\API\MatchController::class,'match_live']);
Route::get('/tournaments/{tournament}/matches/{match_id}/match-scorecard',[\App\Http\Controllers\API\MatchController::class,'match_scorecard']);
Route::get('/tournaments/{tournament}/matches/{match_id}/match-overs',[\App\Http\Controllers\API\MatchController::class,'match_overs']);

Route::get('/teams/{team}/players',[\App\Http\Controllers\API\PlayersController::class,'index']);
Route::get('/players/{player}',[\App\Http\Controllers\API\PlayersController::class,'show']);

Route::post('/feedback',[\App\Http\Controllers\API\FeedbackController::class,'store']);






//Admin Api Routes

Route::get('/admin/tournaments',[\App\Http\Controllers\API\Admin\TournamentController::class,'getTournaments']);
Route::get('/admin/tournament/{tournament}/teams',[\App\Http\Controllers\API\Admin\TournamentTeamsController::class,'getTournamentTeams']);
