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

//Route::get('/admin/index','IndexController@index');

Route::group(['namespace' => 'admin'],function(){
	Route::controller('/admin/index','IndexController');
});

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('test/{info}',function($info = null){
	echo $info;
});

Route::get('demo',function(){
	return view('demo');
});

Route::get('home',function(){
	return view('home');
});
//Route::get('home', 'HomeController@index');
//Route::auth();

Route::get('/home', 'HomeController@index');
*/
