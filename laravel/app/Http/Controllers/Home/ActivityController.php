<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Active;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
    	$time = time();
    	$actObj = new Active;
    	$data = $actObj->selectAll();
    	foreach ($data as $key => $val) {
    		if($val['end_time'] < $time) {
    			$data[$key]['status'] = '已结束';
    			$data[$key]['css'] = 'closed';
    		} elseif ($val['end_time'] - $time < 3600*24) {
    			$data[$key]['status'] = '即将结束';
    			$data[$key]['css'] = 'coming-close';
    		} else {
    			$data[$key]['status'] = '进行中';
    			$data[$key]['css'] = 'progress';
    		}
    	}
    	
    	//print_r($data);die;
        return view('Home/Activity/activity',['data' => $data]);
    }
}
