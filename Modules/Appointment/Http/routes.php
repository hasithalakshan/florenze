<?php

Route::group(['middleware' => 'web', 'prefix' => 'appointment', 'namespace' => 'Modules\Appointment\Http\Controllers'], function()
{
    Route::get('/', 'AppointmentController@index');
    Route::get('/search', 'AppointmentController@search');
    Route::get('/getLastForDate', 'AppointmentController@getLastForDate');
    Route::get('/getAppointments', 'AppointmentController@getAppointments');
    Route::get('/store', 'AppointmentController@store');
     Route::get('/update', 'AppointmentController@update');
     Route::get('/destroy', 'AppointmentController@destroy');
    Route::get('/getById', 'AppointmentController@getById');
    Route::get('/getDoctorTotalAppointments', 'AppointmentController@getDoctorTotalAppointments');
});
