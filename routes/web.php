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

    Route::resource('/Team','TeamController');  //Team

    Route::resource('/Players','PlayersController');    //Player
    Route::post('/Players/filter','PlayersController@playerFilter')->name('playerFilter');

    Route::resource('/Schedule','ScheduleController');  //Schedule

    //Batting
    Route::get('/BrowseBatting','AdminController@BrowseBatting')->name('BrowseBatting');
    Route::get('/EditBatting/{id}','AdminController@EditBatting')->name('EditBatting');
    Route::post('/Post_EditBatting','AdminController@Post_EditBatting')->name('Post_EditBatting');
    Route::post('/Post_DeleteBatting','AdminController@Post_DeleteBatting')->name('Post_DeleteBatting');


    //Bowling
    Route::get('/BrowseBowling','AdminController@BrowseBowling')->name('BrowseBowling');
    Route::get('/EditBowling/{id}','AdminController@EditBowling')->name('EditBowling');
    Route::post('/Post_EditBowling','AdminController@Post_EditBowling')->name('Post_EditBowling');
    Route::post('/Post_DeleteBowling','AdminController@Post_DeleteBowling')->name('Post_DeleteBowling');

    //PointsTable
    Route::get('/BrowsePointsTable','AdminController@BrowsePointsTable')->name('BrowsePointsTable');
    Route::get('/EditPointsTable/{id}','AdminController@EditPointsTable')->name('EditPointsTable');
    Route::post('/Post_EditPointsTable','AdminController@Post_EditPointsTable')->name('Post_EditPointsTable');
    Route::post('/Post_DeletePointsTable','AdminController@Post_DeletePointsTable')->name('Post_DeletePointsTable');
    
    Route::get('/BrowseResult', 'MatchController@BrowseResult')->name('BrowseResult');
    Route::post('/Post_BrowseResult', 'MatchController@Post_BrowseResult')->name('Post_BrowseResult');
    Route::post('/Post_DeleteResult', 'MatchController@Post_DeleteResult')->name('Post_DeleteResult');

    
    
    
    Route::get('/LiveScore','LiveScoreController@LiveScoreindex')->name('LiveScore.index');

    Route::get('/StartScore/{match_no}','LiveScoreController@StartScore')->name('StartScore');
    Route::post('/ScoreDetails','LiveScoreController@ScoreDetails')->name('ScoreDetails');
    
    Route::get('/LiveScore/{match}/{tournament}','LiveScoreController@LiveScoreShow')->name('LiveScore.show');
    Route::put('/LiveScore','LiveScoreController@LiveScore')->name('LiveScore');        

});
