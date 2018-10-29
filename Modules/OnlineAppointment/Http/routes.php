<?php

Route::group(['middleware' => 'web', 'prefix' => 'onlineappointment', 'namespace' => 'Modules\OnlineAppointment\Http\Controllers'], function()
{
    Route::get('/', 'OnlineAppointmentController@index');
    Route::get('/search', 'OnlineAppointmentController@search');
    Route::get('/store', 'OnlineAppointmentController@store');
    Route::get('/regPatient', 'OnlineAppointmentController@regPatient');
    Route::get('/findPatient', 'OnlineAppointmentController@findPatient');
    
});
