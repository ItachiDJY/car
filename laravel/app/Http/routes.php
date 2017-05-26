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


//首页
Route::get('/admin', 'Admin\IndexController@index');
//车辆管理
Route::get('/car', 'Admin\CarController@index');
Route::get('/car_add', 'Admin\CarController@add');
Route::post('/car_add_do', 'Admin\CarController@add_do');
Route::get('/deploy', 'Admin\CarController@deployList');
Route::get('/deploy_add', 'Admin\CarController@deploy_add');
Route::post('/deploy_add_do', 'Admin\CarController@deploy_add_do');
Route::get('/brand', 'Admin\CarController@car_brand');
Route::get('/brand_add', 'Admin\CarController@car_brand_add');
Route::post('/brand_add_do', 'Admin\CarController@car_brand_add_do');



