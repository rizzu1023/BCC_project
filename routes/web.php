<?php





Route::get('/', 'MainController@GetIndex');
Route::get('/pointsTable', 'MainController@GetPointsTable');
Route::get('/teams', 'MainController@GetTeams');
Route::get('/schedule', 'MainController@GetSchedule');
Route::get('/stats', 'MainController@GetStats');



//Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@GetDashboard')->name('GetDashboard');
});