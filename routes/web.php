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
   
    Route::resource('/Team','TeamController');
    
    Route::resource('/Players','PlayersController');

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

    Route::get('/BrowseResult', 'AdminController@BrowseResult')->name('BrowseResult');
    Route::post('/Post_BrowseResult', 'AdminController@Post_BrowseResult')->name('Post_BrowseResult');
    Route::post('/Post_DeleteResult', 'AdminController@Post_DeleteResult')->name('Post_DeleteResult');

});