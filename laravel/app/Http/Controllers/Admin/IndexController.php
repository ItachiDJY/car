<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
   //展示车辆信息及使用情况
   public function index() {
       //取出session里面的数据
       $info = $_SESSION['admin'];
       //渲染视图并把数据传给视图
       return view('admin.index',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
   }
}
