<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\LoginModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {
        return view('Home/Login/login');
    }

    //登录方法
    public function login()
    {
        $username = Input::get('username');
        $pwd = Input::get('pwd');
        $model = new LoginModel();
        //过滤
        $username = $model->actionFilterWords($username);
        $pwd = $model->actionFilterWords($pwd);
        $info = DB::select("select user_name,user_phone from car_user where user_name= ? or user_phone= ?",[$username,$username]);
        print_r($info);
    }
}
