<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Input;
use DB;

header("Content-type:text/html;charset=utf-8");

class OrderController extends Controller
{
    //订单列表首页
    public function order_index()
    {
        $order = DB::table('order')->Paginate(5);
        $order_info = $this->object_array($order);
        
        $order_info = $this->common_data($order_info['items']['items']);
        // echo strtotime('2017-6-06');die;
        return view('Admin.order.order_index',['order_info'=>$order_info],['order'=>$order]);
    }

    //订单加入回收站
    public function recycle_add()
    {
        $order_id = Input::get('id');
        $order_id = explode(',', $order_id);
        $order = new Order();
        $data = ['is_delete'=>1];
        $res = $order->whereIn('order_id' , $order_id)->update($data);

        $arr = $order->recycleadd();
        $arr = $this->object_array($arr);

        $arr = $this->common_data($arr['items']['items']);

        echo json_encode($arr);
    }

    //添加订单
    public function add_order()
    {
        return view('Admin.order.add_order');
    }

    //删除订单
    public function dele_order()
    {
        $order_id = Input::get('order_id');
        // echo $order_id;die;
        $order = new Order();
        $res = DB::select("delete from car_order where order_id in ($order_id)");
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //筛选订单
    public function search_order()
    {
        //接收ajax数据
        $pay_status = Input::get('pay_status');
        $order_status = Input::get('order_status');
        $user_name = Input::get('user_name');
        $order_no = Input::get('order_no');
        // echo $pay_status.$order_status.$user_name.$order_no;die;
        //过滤特殊字符
        $user_name = $this->replaceSpecialChar($user_name);

        $where = '1';
        if ($pay_status) {
            $where.=" and pay_status=$pay_status";
        } 
        if ($order_status) {
            $where.=" and order_status=$order_status";
        }
        if ($order_no) {
            $where.=" and order_no=$order_no";
        }
        if ($user_name) {
            $where.=" and user_name like '%$user_name%'";
        }
        $order = new Order();
         
        $arr = DB::select("select * from car_order as o join car_user as u on o.user_id = u.user_id where ".$where); 
        $arr = $this->object_array($arr);
      
        foreach ($arr as $key => $value) {
            //查询车辆信息表
            $car_info = DB::table('information')->where('car_id', $value['car_id'])->first();
            $car_info = $this->object_array($car_info);

            $arr[$key]['plate_number'] = $car_info['plate_number'];
            $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
            $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
            $arr[$key]['return_time'] = date('Y-m-d H:i' , $value['return_time']);
            $arr[$key]['create_time'] = date('Y-m-d H:i' , $value['create_time']);
        }

        echo json_encode($arr);
    }

    //回收站列表首页
    public function recycle_index()
    {
        $order = new Order();

        $arr = $order->recycle_list();
        $arr = $this->object_array($arr);
        $arr = $this->common_data($arr);
        
        return view('Admin.order.recycle_index',['arr'=>$arr]);
    }

    //还原回收站数据
    public function restore()
    {
        $order_id = Input::get('id');
        $order_id = explode(',', $order_id);
        $order = new Order();
        $res = $order->whereIn('order_id' , $order_id)->update(['is_delete'=>0]);

        $order = new Order();
        $arr = $order->recycle_list();
        $arr = $this->object_array($arr);
        $arr = $this->common_data($arr);

        echo json_encode($arr);        
    }

    //删除回收站数据
    public function delete_recycle()
    {
        $order_id = Input::get('id');
        $order_id = explode(',', $order_id);
        $order = new Order();
        $res = $order->whereIn('order_id' , $order_id)->delete();
        
        $arr = $order->recycle_list();
        $arr = $this->object_array($arr);
        $arr = $this->common_data($arr);

        echo json_encode($arr);
    }

    //清空回收站
    public  function empty_recycle()
    {
        $order = new Order();
        $res = $order->dele(['is_delete'=>1]);    
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }  
    }

    //封装数据
    public function common_data($arr)
    {
        foreach ($arr as $key => $value) {
            //查询用户表
            $user_info = DB::table('user')->where('user_id', $value['user_id'])->first();
            $user_info = $this->object_array($user_info);
            // print_r($user_info);die;
            //查询车辆信息表
            $car_info = DB::table('information')->where('car_id', $value['car_id'])->first();
            $car_info = $this->object_array($car_info);

            $arr[$key]['user_name'] = $user_info['user_name'];
            $arr[$key]['plate_number'] = $car_info['plate_number'];
            $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
            $arr[$key]['pop_time'] = date('Y-m-d H:i' , $value['pop_time']);
            $arr[$key]['return_time'] = date('Y-m-d H:i' , $value['return_time']);
            $arr[$key]['create_time'] = date('Y-m-d H:i' , $value['create_time']);            
        }

        return $arr;
    }

    //过滤特殊字符
    function replaceSpecialChar($strParam)
    {
        $regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";

        return preg_replace($regex,"",$strParam);
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
        
}




