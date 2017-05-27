<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页方法
    public function index()
    {
        if(isset($_COOKIE['user_name'])) {
            $username = $_COOKIE['user_name'];
            return view('Home/Index/index',['username'=>$username]);
         } else {
            return view('Home/Index/index');
        }

    }
}
