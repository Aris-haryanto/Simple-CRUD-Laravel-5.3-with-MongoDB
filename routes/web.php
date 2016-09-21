<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/', ['uses' => 'PrimaryController@index', 'as' => 'route_home']);

Route::post('savedata', ['uses' => 'PrimaryController@save', 'as' => 'route_save']);

Route::post('generatefake', ['uses' => 'PrimaryController@generateFake', 'as' => 'route_generate']);

Route::get('deleteall', ['uses' => 'PrimaryController@deleteAll', 'as' => 'route_deleteall']);

Route::get('getdata/{id}', ['uses' => 'PrimaryController@getdata', 'as' => 'route_edit']);

Route::post('updatedata', ['uses' => 'PrimaryController@update', 'as' => 'route_update']);

Route::get('deletedata/{id}', ['uses' => 'PrimaryController@delete', 'as' => 'route_delete']);

Route::get('{template}', ['uses' => 'PrimaryController@pages']);