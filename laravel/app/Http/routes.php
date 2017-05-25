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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/','AdminController@index');

Route::group(['namespace' => 'Home'],function(){
	Route::get('/','IndexController@index');
	Route::get('/register','RegisterController@index');
	Route::get('/login','LoginController@index');
	Route::get('/door','DoorController@index');
	Route::get('/shop','ShopController@index');
	Route::get('/long','LongRentController@index');
	Route::get('/company','CompanyController@index');
	Route::get('/free','FreeController@index');
	Route::get('/store','StoreController@index');
	Route::get('/activity','ActivityController@index');
	Route::get('/country','CountryController@index');
});


Route::group(['namespace' => 'Admin'],function(){
	Route::controller('/admin','IndexController');
});