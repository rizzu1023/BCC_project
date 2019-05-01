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

    //Team
    Route::get('/BrowseTeam','AdminController@BrowseTeam')->name('BrowseTeam');
    Route::get('/AddTeam','AdminController@AddTeam')->name('AddTeam');
    Route::post('/Post_AddTeam','AdminController@Post_AddTeam')->name('Post_AddTeam');
    Route::get('/EditTeam/{id}','AdminController@EditTeam')->name('EditTeam');
    Route::post('/Post_EditTeam','AdminController@Post_EditTeam')->name('Post_EditTeam');
    Route::post('/Post_DeleteTeam','AdminController@Post_DeleteTeam')->name('Post_DeleteTeam');


    //Player
    Route::get('/BrowsePlayer','AdminController@BrowsePlayer')->name('BrowsePlayer');
    Route::get('/AddPlayer','AdminController@AddPlayer')->name('AddPlayer');
    Route::post('/Post_AddPlayer','AdminController@Post_AddPlayer')->name('Post_AddPlayer');
    Route::get('/EditPlayer/{id}','AdminController@EditPlayer')->name('EditPlayer');
    Route::post('/Post_EditPlayer','AdminController@Post_EditPlayer')->name('Post_EditPlayer');
    Route::post('/Post_DeletePlayer','AdminController@Post_DeletePlayer')->name('Post_DeletePlayer');

    //Schedule
    Route::get('/BrowseSchedule','AdminController@BrowseSchedule')->name('BrowseSchedule');
    Route::get('/AddSchedule','AdminController@AddSchedule')->name('AddSchedule');
    Route::post('/Post_AddSchedule','AdminController@Post_AddSchedule')->name('Post_AddSchedule');
    Route::get('/EditSchedule/{id}','AdminController@EditSchedule')->name('EditSchedule');
    Route::post('/Post_EditSchedule','AdminController@Post_EditSchedule')->name('Post_EditSchedule');
    Route::post('/Post_DeleteSchedule','AdminController@Post_DeleteSchedule')->name('Post_DeleteSchedule');

    //Batting
    Route::get('/BrowseBatting','AdminController@BrowseBatting')->name('BrowseBatting');
    // Route::get('/Batting','AdminController@AddBatting')->name('AddBatting');
    // Route::post('/Post_AddBatting','AdminController@Post_AddBatting')->name('Post_AddBatting');
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

    Route::get('/StartMatch/{match_no}','AdminController@StartMatch')->name('StartMatch');    

    Route::post('/StartScore','AdminController@StartScore')->name('StartScore');
});