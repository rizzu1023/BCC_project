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
});