<?php

Route::group(['middleware' => 'web', 'prefix' => 'reception', 'namespace' => 'Modules\Reception\Http\Controllers'], function()
{
    Route::get('/', 'ReceptionController@index')->name('3');
    Route::get('/store', 'ReceptionController@store');
    Route::post('/updateProfilePic', 'ReceptionController@updateProfilePic');
    Route::get('/searchPatient', 'ReceptionController@searchPatient');
    Route::get('/searchDoctor', 'ReceptionController@searchDoctor');
    
    Route::get('/getPatientByUserId', 'ReceptionController@getPatientByUserId');
    Route::get('/getDoctorsByDay', 'ReceptionController@getDoctorsByDay');
    Route::get('/getDoctorById', 'ReceptionController@getDoctorById');
    Route::get('/resetPassword', 'ReceptionController@resetPassword');
    
    
    
    Route::get('/logout', 'ReceptionController@logout');
    Route::get('/test', function(){
        //testing commands
        $appointment= Modules\Appointment\Entities\Appointment::create(["date" => $request->doa,"time" =>$request->toa,"doctor_id" =>$request->doctor,"patient_id"=>$patient->id]);
    });
});
