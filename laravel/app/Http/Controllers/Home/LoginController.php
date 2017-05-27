<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Model\LoginModel;
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
        $info = DB::table('car_user')
            ->where('user_name','=',$username)
            ->orWhere('user_phone','=', '$username')
            ->get();
        print_r($info);die;
    }
}
