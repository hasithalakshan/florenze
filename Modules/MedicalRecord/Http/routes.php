<?php

Route::group(['middleware' => 'web', 'prefix' => 'medicalrecord', 'namespace' => 'Modules\MedicalRecord\Http\Controllers'], function()
{
    Route::get('/', 'MedicalRecordController@index');
});
