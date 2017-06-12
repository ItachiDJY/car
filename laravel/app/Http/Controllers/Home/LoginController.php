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
        if(isset($_COOKIE['logo'])) {
            $logo = $_COOKIE['logo'];
            $info = DB::table('user')->where('pwd_hash',$logo)->first();
            if($info) {
                return redirect('/');
            } else {
                return view('Home/Login/login');
            }
        } else {
            return view('Home/Login/login');
        }

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
        $info = DB::select("select * from car_user where user_name= ? or user_phone= ?",[$username,$username]);
        foreach($info as $k=>$v) {
            if(md5($pwd) == $v->user_pwd) {
                if (Input::has('free')){
                    setcookie('logo',$v->pwd_hash,time()+60*60*24*30,'/');
                    setcookie('user_name',$v->user_name,time()+60*60*24*30,'/');
                    return redirect("/");
                } else {
                    setcookie('logo',$v->pwd_hash,0,'/');
                    setcookie('user_name',$v->user_name,0,'/');
                    return redirect("/");
                }
            } else {
                return redirect("/login");
            }
        }
    }



    //验证用户或手机号是否存在
    public function check_username()
    {
        $username = Input::get('username');
        $model = new LoginModel();
        //过滤
        $username = $model->actionFilterWords($username);
        $info = DB::select("select * from car_user where user_name= ? or user_phone= ?",[$username,$username]);
        if($info) {
            return 1;
        } else {
            return 0;
        }
    }

    //验证密码是否正确
    public function check_pwd()
    {
        $username = Input::get('username');
        $pwd = Input::get('pwd');
        //过滤特殊字符
        $model = new LoginModel();
        $username = $model->actionFilterWords($username);
        $pwd = md5($model->actionFilterWords($pwd));

        $info = DB::select("select * from car_user where user_name= ? or user_phone= ? and user_pwd= ?",[$username,$username,$pwd]);
        if($info) {
            return 1;
        } else {
            return 0;
        }
    }

    //退出登录
    public function out_login()
    {
        setcookie('logo',"",time()-3600,'/');
        return redirect("/login");
    }
}

