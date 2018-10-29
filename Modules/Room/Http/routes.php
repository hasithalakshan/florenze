<?php

Route::group(['middleware' => 'web', 'prefix' => 'room', 'namespace' => 'Modules\Room\Http\Controllers'], function()
{
        Route::get('/', 'RoomController@index')->name('5');
	Route::get('/getMyShedule', 'roomController@getMyShedule');
	Route::get('/mySchedule', 'roomController@mySchedule');
	Route::post('/uploadPrescription', 'roomController@uploadPrescription');
	Route::get('/logout', 'RoomController@logout');
	Route::get('/reset', 'RoomController@reset');
	Route::get('/resetPassword', 'RoomController@resetPassword');
});
