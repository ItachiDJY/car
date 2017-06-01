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
Route::group(['middleware'=>'web'], function (){

/*******前台路由区******/
Route::any('/','Home\IndexController@index');
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
//前台登录
Route::post('/login/login','Home\LoginController@login');
Route::get('/login/check_username','Home\LoginController@check_username');
Route::get('/login/check_pwd','Home\LoginController@check_pwd');
//前台注册
Route::post('/register/register','Home\RegisterController@register');
Route::get('/register/check_code','Home\RegisterController@check_code');
Route::get('/register/check_phone','Home\RegisterController@check_phone');


/*******后台路由区******/
//首页
Route::get('/index', 'Admin\IndexController@index');
//车辆管理
Route::get('/car', 'Admin\CarController@index');
Route::get('/car_add', 'Admin\CarController@add');
Route::post('/car_add_do', 'Admin\CarController@add_do');

//车辆删除
Route::get('/car_del', 'Admin\CarController@car_del');
Route::get('/car_update', 'Admin\CarController@car_update');
Route::post('/car_update_do', 'Admin\CarController@car_update_do');

Route::get('/deploy', 'Admin\CarController@deployList');
Route::get('/deploy_add', 'Admin\CarController@deploy_add');
Route::post('/deploy_add_do', 'Admin\CarController@deploy_add_do');
//配置删除
Route::get('/deploy_del', 'Admin\CarController@deploy_del');
//员工管理
Route::get('/staff','Admin\StaffController@index');
Route::get('/staff_add','Admin\StaffController@add');
Route::post('/staff_add_do','Admin\StaffController@add_do');
//司机管理
Route::get('/driver','Admin\DriverController@index');
Route::get('/driver_add','Admin\DriverController@add');
Route::get('/reg_select','Admin\DriverController@reg_select');
Route::post('/driver_add_do','Admin\DriverController@add_do');
//订单管理
Route::get('/order_index','Admin\OrderController@order_index');
Route::get('/recycle','Admin\OrderController@recycle');
Route::get('/dele_order','Admin\OrderController@dele_order');
Route::get('/search_order','Admin\OrderController@search_order');
Route::get('/recycle_add','Admin\OrderController@recycle_add');
Route::get('/recycle_index','Admin\OrderController@recycle_index');
Route::get('/restore','Admin\OrderController@restore');
Route::get('/empty_recycle','Admin\OrderController@empty_recycle');
Route::get('/delete_recycle','Admin\OrderController@delete_recycle');
Route::get('/add_order','Admin\OrderController@add_order');
Route::post('/add_order_do','Admin\OrderController@add_order_do');
Route::get('/order_detail','Admin\OrderController@order_detail');





});

