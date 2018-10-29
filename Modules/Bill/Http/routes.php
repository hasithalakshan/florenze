<?php

Route::group(['middleware' => 'web', 'prefix' => 'bill', 'namespace' => 'Modules\Bill\Http\Controllers'], function()
{
    Route::get('/', 'BillController@index')->name('6');
    Route::get('/getDetail', 'BillController@getDetail');
    Route::get('/getMyDetail', 'BillController@getMyDetail');
    Route::get('/logout', 'BillController@logout');
    Route::post('/updateProfilePic','BillController@updateProfilePic');
    Route::get('/store', 'BillController@store');
    Route::get('/saveBill', 'BillController@saveBill');
    Route::get('/update','BillController@update');
    Route::get('/passwardreset','BillController@resetPassword');
    Route::get('/resetPassword','BillController@resetPassword');
    
});

Route::get('apple/{id}',function($id){
	return 'user'.$id;
});
Route::get('comment/{price}/{id}',function($price,$id){
	return view('bill::index')->with('price',$price)->with('id',$id);
});
