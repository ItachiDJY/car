<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //首页方法
    public function index()
    {
        if(isset($_COOKIE['logo'])) {
            $logo = $_COOKIE['logo'];
            $info = DB::table('user')->where('pwd_hash',$logo)->first();
            $username = $info->user_name;
            $user_phone = $info->user_phone;
            $user_phone = preg_replace('/(\d{3})\d{4}(\d{4})/', '$1****$2', $user_phone);
            setcookie('username',$username,'0','/');
            setcookie('phone',$user_phone,'0','/');
            if($info) {
                return view('Home/Index/index',['username'=>$username]);
            } else {
                return view('Home/Login/login');
            }
        } else {
            return view('Home/Index/index',['username'=>""]);
        }

    }


    //获取当前定位的城市名称
    public function get_city()
    {
        $city_name = Input::get('cityName');
        setcookie("city_name",$city_name,'0','/');
    }
}

