<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Input;
use DB;

class OrderController extends Controller
{
   public function index()
   {
   	   if (empty($_COOKIE['logo'])) {
       		return redirect('/login');

   	   } else {
   	   	    $arr = $this->common_data();
      		return view('Home/Order/order',['arr'=>$arr]);
   	   	
   	   }
   }

   //订单详情
   public function show()
   {
   	    $order_id = Input::get('id');
   	    $row = DB::select("select * from car_order as o join car_user as u on o.user_id = u.user_id where order_id='$order_id'"); 
   	    $row = $this->object_array($row)[0];
   	     
   	    //查询车辆信息表
   	    $car_info = DB::table('information')->where('car_id', $row['car_id'])->first();
   	    $car_info = $this->object_array($car_info);
   	    $deploy_info = DB::table('deploy')->where('deploy_id', $car_info['deploy_id'])->first();
   	    $deploy_info = $this->object_array($deploy_info);
   	    
   	    $brand_info = DB::table('brand')->where('brand_id', $deploy_info['brand_id'])->first();
   	    $brand_info = $this->object_array($brand_info);
   	    //门店信息
        if ($row['pop_type'] == 1) {
        	$pop_info['store_name'] = $row['pop_address'];
        } else {
            $pop_info = DB::table('store')->where('store_id', $row['pop_store'])->first();
            $pop_info = $this->object_array($pop_info);
		}
		if ($row['return_type'] == 1) {
        	$return_info['store_name'] = $row['return_address'];
        } else {
            $return_info = DB::table('store')->where('store_id', $row['return_store'])->first();
            $return_info = $this->object_array($return_info);
            
		}
   	    $row['car_img'] = explode(',',$car_info['car_img'])[0];
   	    $row['car_name'] = $brand_info['brand_name'].$deploy_info['deploy_name']; 
   	    $row['pop_time'] = date('Y-m-d H:i' , $row['pop_time']);
   	   
   	    $row['return_time'] = date('Y-m-d H:i' , $row['return_time']);
   	    $row['create_time'] = date('Y-m-d H:i' , $row['create_time']);
   	    $row['pop_store'] = $pop_info['store_name'];
   	    $row['return_store'] = $return_info['store_name'];
        
        return view('Home/Order/order_info',['order_info'=>$row,'deploy_info'=>$deploy_info]);
   }
   //订单状态查询
   public function search()
   {
   	   
   	   $status = Input::get('status');
   	   $fromDate = Input::get('fromDate');
   	   $toDate = Input::get('toDate');
   	   $where ="";
   	   if ($fromDate) {
   	   	   $fromDate = strtotime($fromDate);
   	   	   $where .=" and pop_time >= $fromDate";
   	   }
   	   if ($toDate) {
   	   	   $toDate = strtotime($toDate);
   	   	   $where .=" and return_time <= $toDate";
   	   }
   	   if ($status) {
   	   	   $where .=" and order_status ='$status'";
   	   }
   	   $arr = $this->common_data($where);
        
       return json_encode($arr);

   }

   public function common_data($where='')
   {
   	   $user_id = $_COOKIE['user_id'];
   	   $arr = DB::select("select * from car_order as o join car_user as u on o.user_id = u.user_id where o.user_id = $user_id".$where); 
   	   $arr = $this->object_array($arr);
   	   foreach ($arr as $key => $value) {
            //查询车辆信息表
            $car_info = DB::table('information')->where('car_id', $value['car_id'])->first();
            $car_info = $this->object_array($car_info);
            $deploy_info = DB::table('deploy')->where('deploy_id', $car_info['deploy_id'])->first();
            $deploy_info = $this->object_array($deploy_info);
            $brand_info = DB::table('brand')->where('brand_id', $deploy_info['brand_id'])->first();
            $brand_info = $this->object_array($brand_info);
            //门店信息
            if ($value['pop_type'] == 1) {
            	$pop_info['store_name'] = $value['pop_address'];
            } else {
	            $pop_info = DB::table('store')->where('store_id', $value['pop_store'])->first();
	            $pop_info = $this->object_array($pop_info);
			}
			if ($value['return_type'] == 1) {
            	$return_info['store_name'] = $value['return_address'];
            } else {
	            $return_info = DB::table('store')->where('store_id', $value['return_store'])->first();
	            $return_info = $this->object_array($return_info);
	            
			}

            //$arr[$key]['plate_number'] = $car_info['plate_number'];
            $arr[$key]['car_img'] = explode(',',$car_info['car_img'])[0];
            $arr[$key]['car_name'] = $brand_info['brand_name'].$deploy_info['deploy_name']; 
            $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
           // $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
            $arr[$key]['return_time'] = date('Y-m-d H:i' , $value['return_time']);
            $arr[$key]['create_time'] = date('Y-m-d H:i' , $value['create_time']);
            $arr[$key]['pop_store'] = $pop_info['store_name'];
            $arr[$key]['return_store'] = $return_info['store_name'];
        }

        return $arr;

   }

   //对象转数组
    function object_array($array) 
    { 
        if(is_object($array)) { 
            $array = (array)$array; 
         } if(is_array($array)) { 
             foreach($array as $key=>$value) { 
                 $array[$key] = $this->object_array($value); 
                 } 
         } 
        return $array; 
    }

    //取消订单
    public function del(){
    	$order_id = Input::get('id');
    	$bool = DB::table('order')->where('order_id', $order_id)->update(['order_status' => 5]);
    	if ( $bool ) {
    		return redirect('/order');
    	}
    } 

    //下订单
    public function order_ok(){
    	$post = Input::get();
    	unset($post['_token']);
    	//订单号order_no
    	$order_no = $this->create_order_no();
    	$post['order_no'] = $order_no;
    	//用户id user_id
    	$post['user_id'] = $_COOKIE['user_id'];
    	
    	//订单状态  order_status
    	$post['order_status'] = 1;
    	//订单生成时间 create_time
    	$post['create_time'] = time();
    	//支付状态 pay_status
    	$post['pay_status'] = 0;
    	$post['pop_time'] = strtotime($post['pop_time']);
    	$post['return_time'] = strtotime($post['return_time']);

    	$obj = new Order();
    	$bool = $obj -> adds($post);
    	if ($bool) {
    		//如果有代金券，将该用户的代金券消费掉
    		//将车辆状态改为出行状态
    		DB::table('information')->where('car_id', $post['car_id'])->update(['car_status'=>1]);
    		//将车辆出行的相关数据加入出行表中
    		return redirect('/order');
    	} else {
    		echo 0;
    	}
    	
    	
  
    }

    //生成订单号
    //
    public function create_order_no(){
    	$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    	$orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
    	return $orderSn;
    }


    
}