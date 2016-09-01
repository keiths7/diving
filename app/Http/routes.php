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

Route::get('/test', 'IndexController@test');

Route::get('/', 'IndexController@index');

Route::get('/index', 'IndexController@index');

Route::get('/product/{id}', 'IndexController@product');

Route::get('/search/', 'IndexController@search');

Route::get('/home', 'HomeController@index');

Route::get('/destination', 'IndexController@country_word');

Route::auth();


Route::get('/user/login', 'UserController@login');
Route::get('/user/logout', 'UserController@logout');
Route::get('/user/register', 'UserController@register');
Route::get('/user/profile', 'UserController@user_profile');
Route::get('/user/pay_info', 'UserController@get_user_credit');
Route::get('/user/update_pay_info', 'UserController@update_user_pay');
Route::get('/user/init_password', 'UserController@init_password');
Route::get('/search/get_more', 'IndexController@get_more_product');

Route::group([/*'middleware' => 'auth'*/], function () {
	Route::get('/user/info', 'UserController@get_user_info');
	Route::get('/user/info/update', 'UserController@update_user_info');
});

Event::listen('illuminate.query', function($query,$binding,$time,$connections){

  $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

  foreach ($backtrace as $trace) {
    if(array_key_exists('file',$trace) && array_key_exists('line',$trace)){
      if( strpos($trace['file'],base_path().'/app') !== false ){
        var_dump(array(
          'query'    => $query
          ,'binding' => $binding
          ,'time'    => $time
          ,'connection' => $connections
          ,'file' => $trace['file']
          ,'line' => $trace['line']
        ));
        break;
      }
    }
  }
});