<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/test', 'IndexController@test');

Route::get('/', 'IndexController@index');

Route::get('/index', 'IndexController@index');

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/user/info', 'UserController@get_user_info');
	Route::get('/user/info/update', 'UserController@update_user_info');
});