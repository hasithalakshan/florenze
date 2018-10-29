<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index')->name('1');
    Route::get('/logout', 'UserController@logout');
    Route::post('/create','UserController@insert');
    Route::get('/search', 'UserController@search');
    Route::post('/updateProfilePic','UserController@updateProfilePic');
    Route::get('getById','UserController@getById');
    Route::post('create1','UserController@edit');
    Route::post('create3','UserController@roomEdit');
    Route::get('getByIdo', 'UserController@getByIdo');
    Route::get('getByRoleId', 'UserController@getByRoleId');
    Route::post('roleInsert', 'UserController@roleInsert');
    Route::post('roleedit', 'UserController@roleedit');
    Route::post('/userdrop', 'UserController@destroy');
    Route::post('/adduesrenable', 'UserController@adduesrenable');
    Route::get('/adduesrenablemodal', 'UserController@adduesrenablemodal');
    Route::get('roomInsert','UserController@roomInsert');
    Route::get('/getNextRoomNo', 'UserController@getNextRoomNo');
    Route::post('/login', 'AuthController@authenticate');
      Route::get('/resetPassword','UserController@resetPassword');
});
