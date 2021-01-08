<?php



//frontend Routes
Route::get('/index', 'MainController@GetIndex');
Route::get('/pointsTable', 'MainController@GetPointsTable');
Route::get('/teams', 'MainController@GetTeams');
Route::get('/schedule', 'MainController@GetSchedule');
Route::get('/stats', 'MainController@GetStats');

Route::view('/blank','Main.layouts.layout');


//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class,'getDashboard'])->name('GetDashboard');
    Route::resource('/Tournament','TournamentController');  //Tournament
    Route::post('/Tournament/addTeam','TournamentController@Tournament_add_Team')->name('Tournament_add_Team');
    Route::post('/Tournament/destroyTeam','TournamentController@Tournament_destroy_Team')->name('Tournament_destroy_Team');

    Route::resource('/teams','TeamController');
//    Route::post('/Team/filter','TeamController@teamFilter')->name('teamFilter');  //Team
//    Route::resource('/Players','PlayersController');    //Player
//    Route::post('/Players/filter','PlayersController@playerFilter')->name('playerFilter');
//    Route::resource('/Schedule','ScheduleController');  //Schedule
//    Route::post('/Schedule/create/tournament','ScheduleController@scheduleTournament')->name('scheduleTournament');

    Route::resource('/PointsTable','PointsTableController');  //PointsTable
    Route::resource('/Batting','BattingController');  //Batting
    Route::resource('/Bowling','BowlingController'); //Bowling
    //TODO :: update this to get route
//    Route::get('/BrowseResult', 'ResultController@BrowseResult')->name('BrowseResult');
    Route::post('/Post_BrowseResult', 'ResultController@Post_BrowseResult')->name('Post_BrowseResult');

    Route::get('/tournaments/{tournament}/results','ScheduleController@results');
    Route::get('/result/{tournament_id}/{match_id}/show', 'ResultController@result_show');
    Route::delete('/result', 'ResultController@result_destroy')->name('result.destroy');

    Route::post('/update-overs','ResultController@update_overs')->name('update.overs');
    Route::post('/update-toss','ResultController@update_toss')->name('update.toss');
    Route::post('/update-choose','ResultController@update_choose')->name('update.choose');
    Route::post('/update-player','ResultController@update_player')->name('update.player');
    Route::post('/update-score','ResultController@update_score')->name('update.score');


    Route::get('/LiveScore','LiveScoreController@LiveScoreindex')->name('LiveScore.index');

    Route::get('/StartScore/{id}','LiveScoreController@StartScore')->name('StartScore');
    Route::post('/ScoreDetails','LiveScoreController@ScoreDetails')->name('ScoreDetails');

    Route::get('/LiveUpdate/{id}/{tournament}','LiveScoreController@LiveUpdateShow')->name('LiveUpdate.show');
    Route::get('/LiveScoreCard/{id}/{tournament}','LiveScoreController@LiveScoreCard')->name('LiveScoreCard');
    Route::post('/LiveUpdate','LiveScoreController@LiveUpdate')->name('LiveUpdate');


    Route::resource('tournaments.schedules','ScheduleController');
    Route::resource('tournaments.teams','TeamTournamentController');
    Route::resource('teams.players','PlayersController');

    Route::get('players','PlayersController@player_index');
    Route::get('player/create','PlayersController@player_create');
    Route::post('player','PlayersController@player_store');
    Route::get('player/{id}','PlayersController@player_show');
    Route::get('player/{id}/edit','PlayersController@player_edit');
    Route::put('player/{id}','PlayersController@player_update');
    Route::delete('player/{id}','PlayersController@player_destroy');

    Route::post('player/add-in-team','PlayersController@add_in_team');
    Route::post('player/remove-from-team','PlayersController@remove_from_team');
});

Route::group(['prefix' => 'super-admin', 'middleware' => ['auth']], function() {
    Route::get('user','SuperAdminController@user_index');
    Route::get('admin','SuperAdminController@admin_index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{any}', 'AppController@index')->where('any','.*');
