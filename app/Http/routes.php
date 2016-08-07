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

Route::auth();

Route::group(['middleware' => 'auth'], function () {
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