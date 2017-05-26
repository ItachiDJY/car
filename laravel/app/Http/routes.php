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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
Route::auth();

Route::get('/home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
  Route::get('/', 'AdminHomeController@index');
  Route::resource('pages', 'PagesController');
});
*/
/*Route::get('/welcome', 'WelcomeController@index');
Route::get('/welcome_show', 'WelcomeController@show');*/

Route::group(['middleware' => ['web']], function()
{

});

//首页
Route::get('/index', 'Admin\IndexController@index');
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

