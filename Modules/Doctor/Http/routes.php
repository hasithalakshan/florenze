<?php

Route::group(['middleware' => 'web', 'prefix' => 'doctor', 'namespace' => 'Modules\Doctor\Http\Controllers'], function()
{



Route::get('/', 'DoctorController@home')->name('4');

Route::get('/logout', 'DoctorController@logout');

Route::get('/updateInfor', 'DoctorController@updateInfor');

Route::get('/updateDetails', 'DoctorController@updateDetails');

Route::get('/patientDetails', 'DoctorController@patientDetails');

Route::get('/history', 'DoctorController@history');

Route::get('/appointments', 'DoctorController@appointments');

Route::get('/reset', 'DoctorController@reset');

Route::get('/profilePicture','DoctorController@profilePicture');

Route::get('/resetPassword', 'DoctorController@resetPassword');

Route::get('/getDetail', 'DoctorController@getDetail');

Route::get('/getPatientDetail', 'DoctorController@getPatientDetail');

Route::get('/doctorCame', 'DoctorController@doctorCame');

Route::get('/getMedicalRecords','DoctorController@getMedicalRecords');

Route::get('/getAppointmentCount','DoctorController@getAppointmentCount');

Route::get('/getEmployeeDetails','DoctorController@getEmployeeDetails');

Route::post('/update', 'DoctorController@update');


});
