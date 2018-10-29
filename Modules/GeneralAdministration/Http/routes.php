<?php

Route::group(['middleware' => 'web', 'prefix' => 'generaladministration', 'namespace' => 'Modules\GeneralAdministration\Http\Controllers'], function()
{
    Route::get('/', 'GeneralAdministrationController@index')->name('2');
    Route::get('/scheduleForWeek', 'GeneralAdministrationController@scheduleForWeek');
	Route::get('/mySchedule', 'GeneralAdministrationController@mySchedule');
	Route::get('/updateschedule', 'GeneralAdministrationController@updateschedule');
	Route::get('/getMyShedule', 'GeneralAdministrationController@getMyShedule');
	
	Route::get('/logout', 'GeneralAdministrationController@logout');
	Route::get('/checkAssignedRA', 'GeneralAdministrationController@checkAssignedRA');
	Route::get('/checkAssignedDoctor', 'GeneralAdministrationController@checkAssignedDoctor');




Route::get('/update', 'GeneralAdministrationController@update');	
	



});



