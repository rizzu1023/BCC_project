<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/players','MainController@players');
Route::get('/data/{id}/{tournament}', 'LiveScoreController@MatchData');

Route::prefix('admin')->group(function () {

//    Route::apiResource('/Players', 'API\PlayersController');

    Route::apiResource('/Team', 'API\TeamController');

    Route::apiResource('/Schedule', 'API\ScheduleController');

    Route::apiResource('/Batting', 'API\BattingController');
    Route::apiResource('/Bowling', 'API\BowlingController');

});

Route::apiResource('/tournament', 'API\TournamentController');
Route::apiResource('/tournaments.teams', 'API\TeamController');
Route::apiResource('/tournaments.schedules', 'API\ScheduleController');
//Route::apiResource('/teams.players', 'API\PlayersController');


Route::get('/teams/{team}/players','API\PlayersController@index');
Route::get('/player/{player_id}','API\PlayersController@show');

Route::get('/stats/{tournament_id}/{type}', 'API\StatsController@data');

Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/matchInfo','API\MatchController@matchInfo');
Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/live','API\MatchController@live');
Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/scorecard','API\MatchController@scorecard');
Route::get('/tournament/{tournament_id}/match/{match_id}/{team1_id}/{team2_id}/overs','API\MatchController@overs');

