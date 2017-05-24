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

Route::get('/','Home\IndexController@index');
Route::get('/register','Home\RegisterController@index');
Route::get('/login','Home\LoginController@index');
Route::get('/door','Home\DoorController@index');
Route::get('/shop','Home\ShopController@index');
Route::get('/long','Home\LongRentController@index');
Route::get('/company','Home\CompanyController@index');
Route::get('/free','Home\FreeController@index');
Route::get('/store','Home\StoreController@index');
Route::get('/activity','Home\ActivityController@index');
Route::get('/country','Home\CountryController@index');