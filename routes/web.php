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

    Route::resource('/feedbacks','FeedbackController');

//    Route::resource('/teams','TeamController');

//    Route::post('/Team/filter','TeamController@teamFilter')->name('teamFilter');  //Team
//    Route::resource('/Players','PlayersController');    //Player
//    Route::post('/Players/filter','PlayersController@playerFilter')->name('playerFilter');
//    Route::resource('/Schedule','ScheduleController');  //Schedule
//    Route::post('/Schedule/create/tournament','ScheduleController@scheduleTournament')->name('scheduleTournament');

    Route::get('/teams/{team}/players/exist_create','TeamPlayerController@exist_team_player_create');
    Route::post('/teams/{team}/players/exist_store','TeamPlayerController@exist_team_player_store');

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


    Route::resource('tournaments.schedules','TournamentScheduleController');
    Route::resource('tournaments.teams', 'TournamentTeamController');
    Route::resource('teams.players','TeamPlayerController');

    Route::resource('tournaments.groups','TournamentGroupController')->shallow();
    Route::resource('groups.teams','GroupTeamController');

    //Points Table
    Route::get('tournaments/{tournament}/points-table','PointsTableController@index');
    Route::get('tournaments/{tournament}/points-table/edit','PointsTableController@edit');

    Route::post('tournaments/{tournament}/points-table/match_selected','PointsTableController@match_selected');
    Route::post('tournaments/{tournament}/points-table/nrr','PointsTableController@nrr');



    Route::resource('player','PlayersController');

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
