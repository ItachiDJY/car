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
   		return view('admin.index') ;
   }
}
