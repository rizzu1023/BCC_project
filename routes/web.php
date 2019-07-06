<?php



//frontend Routes
Route::get('/', 'MainController@GetIndex');
Route::get('/pointsTable', 'MainController@GetPointsTable');
Route::get('/teams', 'MainController@GetTeams');
Route::get('/schedule', 'MainController@GetSchedule');
Route::get('/stats', 'MainController@GetStats');


//Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@GetDashboard')->name('GetDashboard');

    Route::resource('/Tournament','TournamentController');  //Tournament
    Route::post('/Tournament/addTeam','TournamentController@Tournament_add_Team')->name('Tournament_add_Team');
    Route::post('/Tournament/destroyTeam','TournamentController@Tournament_destroy_Team')->name('Tournament_destroy_Team');

    Route::resource('/Team','TeamController');
    Route::post('/Team/filter','TeamController@teamFilter')->name('teamFilter');  //Team

    Route::resource('/Players','PlayersController');    //Player
    Route::post('/Players/filter','PlayersController@playerFilter')->name('playerFilter');

    Route::resource('/Schedule','ScheduleController');  //Schedule

    Route::resource('/PointsTable','PointsTableController');  //PointsTable

    Route::resource('/Batting','BattingController');  //Batting

    Route::resource('/Bowling','BowlingController'); //Bowling

    Route::get('/BrowseResult', 'MatchController@BrowseResult')->name('BrowseResult');
    Route::post('/Post_BrowseResult', 'MatchController@Post_BrowseResult')->name('Post_BrowseResult');
    Route::post('/Post_DeleteResult', 'MatchController@Post_DeleteResult')->name('Post_DeleteResult');

    
    
    
    Route::get('/LiveScore','LiveScoreController@LiveScoreindex')->name('LiveScore.index');

    Route::get('/StartScore/{id}','LiveScoreController@StartScore')->name('StartScore');
    Route::post('/ScoreDetails','LiveScoreController@ScoreDetails')->name('ScoreDetails');
    
    // Route::get('/LiveScore/{id}/{tournament}','LiveScoreController@LiveScoreShow')->name('LiveScore.show');
    // Route::put('/LiveScore','LiveScoreController@LiveScore')->name('LiveScore');        

    Route::get('/LiveUpdate/{id}/{tournament}','LiveScoreController@LiveUpdateShow')->name('LiveUpdate.show');
    Route::post('/LiveUpdate','LiveScoreController@LiveUpdate')->name('LiveUpdate');

});

