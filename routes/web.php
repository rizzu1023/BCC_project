<?php





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
});