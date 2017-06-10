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
    Route::get('/login/out_login','Home\LoginController@out_login');
	//前台注册
	Route::post('/register/register','Home\RegisterController@register');
	Route::get('/register/check_code','Home\RegisterController@check_code');
	Route::get('/register/check_phone','Home\RegisterController@check_phone');

    //前台 个人中心
    Route::get('/person/account','Home\PersonController@account');
    Route::get('/person/check','Home\PersonController@check');


    //前台门店
    Route::get('/store/get_cat_son','Home\StoreController@get_cat_son');
    Route::get('/store/index','Home\StoreController@index');

    //前台首页
    Route::get('/Index/get_city','Home\IndexController@get_city');

/*******后台路由区******/
Route::group(['middleware'=>['web','illegal_login']],function(){
    //首页
    Route::get('/admin_index', 'Admin\IndexController@index');
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
    //员工管理
    Route::get('/staff','Admin\StaffController@index');
    Route::get('/staff_add','Admin\StaffController@add');
    Route::post('/staff_add_do','Admin\StaffController@add_do');
    Route::get('/admin_delete','Admin\StaffController@admin_delete');
    //会员管理
    Route::get('member','Admin\MemberController@index');//会员列表
    Route::get('member_delete','Admin\MemberController@delete');//会员删除
    Route::get('member_change_name','Admin\MemberController@change_name');//修改会员名称
    Route::get('member_change_phone','Admin\MemberController@change_phone');//修改会员电话
    Route::get('member_change_email','Admin\MemberController@change_email');//修改会员邮箱
    Route::get('level','Admin\MemberController@level');//会员级别列表
    Route::get('level_delete','Admin\MemberController@level_delete');//会员级别删除
    Route::get('level_name','Admin\MemberController@level_name');//修改会员级别名称
    Route::get('level_min','Admin\MemberController@level_min');//修改最低消费金额
    Route::get('level_max','Admin\MemberController@level_max');//修改最高消费金额
    Route::get('level_point','Admin\MemberController@level_point');//修改积分兑换比例
    Route::get('level_add','Admin\MemberController@add');//添加会员级别页面
    Route::post('level_add_to','Admin\MemberController@add_to');//添加会员级别操作
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
    //门店管理
	Route::get('/store_index','Admin\StoreController@index');
    Route::get('/store_add','Admin\StoreController@add');
	Route::post('/store_add_do','Admin\StoreController@add_do');
	Route::get('/store_select','Admin\StoreController@store_select');
	Route::get('/store_list','Admin\StoreController@store_list');
    //活动管理
    Route::get('/active_index','Admin\ActiveController@active_index');
    Route::get('/active_add','Admin\ActiveController@active_add');
    Route::post('/active_add_do','Admin\ActiveController@active_add_do');
    Route::get('/active_delete','Admin\ActiveController@active_delete');
    Route::get('/active_change_name','Admin\ActiveController@active_change_name');
    //代金券管理
    Route::get('/voucher_index','Admin\VoucherController@voucher_index');//代金券页面展示
    Route::get('/voucher_add','Admin\VoucherController@voucher_add');//代金券添加展示
    Route::post('/voucher_add_do','Admin\VoucherController@voucher_add_do');//代金券添加操作
    Route::get('/voucher_delete','Admin\VoucherController@voucher_delete');//删除代金券
    Route::get('voucher_change_name','Admin\VoucherController@voucher_change_name');//修改代金券名称
    Route::get('voucher_change_value','Admin\VoucherController@voucher_change_value');//修改代金券面额
    //长租预定管理
    Route::get('/long_index','Admin\LongController@long_index');//长租预定页面展示
    Route::get('/long_delete','Admin\LongController@long_delete');//删除长租预定
    Route::get('long_status','Admin\LongController@long_status');//修改状态
    //个人用户修改密码
    Route::get('/password_update','Admin\PasswordController@password_update');//个人用户修改密码页面展示
    Route::post('/password_update_to','Admin\PasswordController@password_update_to');//个人用户修改密码操作
    Route::get('/sure_old_pwd','Admin\PasswordController@sure_old_pwd');//旧密码查证
});

//后台登陆及防非登录
Route::group(['middleware'=>'web'],function(){
    //登录
    Route::get('/admin_login','Admin\LoginController@login');
    Route::post('/login_to','Admin\LoginController@login_to');
    //退出登录
    Route::get('/login_out','Admin\LoginController@login_out');
});





});


