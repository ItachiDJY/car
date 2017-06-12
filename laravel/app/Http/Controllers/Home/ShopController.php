<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Store;
use App\Models\Information;
use App\Models\Store_phone;
use App\Models\Deploy;

class ShopController extends Controller
{
    public function index()
    {
   	    //查询车型
   	    $deploy_data = DB::table('deploy')->get();
   		$deploy_data = $this->object_array($deploy_data);
   		$deploy_data = array_column($deploy_data,'deploy_name');
   		$deploy_data = array_flip(array_flip($deploy_data));

   		//查询品牌
   		$brand_data = DB::table('brand')->where('parent_id',0)->get();
   		$brand_data = $this->object_array($brand_data);
   		//车辆信息展示
   		$obj = new Information();
        $car_data = $obj->get_all(['car_status'=>0]);
        //$car_data = $this->object_array($car_data);
        foreach ($car_data as $k=>$v) {
            $deploy = DB::table('deploy')->where('deploy_id',$v['deploy_id'])->first();
            $deploy = $this->object_array($deploy);
            $brand = DB::table('brand')->where('brand_id',$deploy['brand_id'])->first();
            $brand = $this->object_array($brand);
            $brand_name = DB::table('brand')->where('brand_id',$brand['parent_id'])->first();
            $brand_name = $this->object_array($brand_name);
            $car_data[$k]['brand_name'] = $brand_name['brand_name'].$brand['brand_name']; 
            $car_data[$k]['seat_num'] = $deploy['seat_num']; 
            $car_data[$k]['doors_num'] = $deploy['doors_num']; 
            $car_data[$k]['tran_type'] = $deploy['tran_type']; 
            $car_data[$k]['rental_price'] = $deploy['rental_price'];
            $car_data[$k]['car_img'] = explode(',',$v['car_img'])[0];   
        }
       
        return view('Home/Shop/shop',['deploy_data'=>$deploy_data,'brand_data'=>$brand_data,'car_data'=>$car_data]);
    }
    //门店信息
    public function store_info()
    {
        $store_id = Input::get('id');
        if (!is_numeric($store_id)) {
        	$row = DB::table('store')->where('store_name',$store_id)->first();
        	$store_id = $this->object_array($row)['store_id'];
        }
        $arr = DB::table('store')->where('parent_id',$store_id)->get();
        $arr = $this->object_array($arr);
       
        return json_encode($arr);
    }
    //门店电话
    public function store_phone()
    {
   	  	$store_id = Input::get('id');
   	  	$row= DB::table('store_phone')->where('store_id',$store_id)->first();
        $arr['phone'] = $this->object_array($row)['store_phone'];

        return json_encode($arr); 
    }


   //对象转数组
    public function object_array($array) 
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

    //立即选车
    public function right_choose_car()
    {
        $fromStoreId = Input::get('fromStoreId');  //取车地址
        
        $toStoreId = Input::get('toStoreId');      //还车地址
        // echo $toStoreId;die;
        $fromDate = Input::get('fromDate');        //取车日期
        $toDate = Input::get('toDate');
        $fromHourMinute = Input::get('fromHourMinute');  //还车日期
        $toHourMinute = Input::get('toHourMinute');
        $pre_days = Input::get('pre_days');         //预定天数
        
        $car_info = new Information();
        $car_info = $car_info->get_all(['region_id'=>$fromStoreId,'car_status'=>0]);
        $car_info = $this->object_array($car_info);
        foreach ($car_info as $k=>$v) {
            $deploy = DB::table('deploy')->where('deploy_id',$v['deploy_id'])->first();
            $deploy = $this->object_array($deploy);
            $brand = DB::table('brand')->where('brand_id',$deploy['brand_id'])->first();
            $brand = $this->object_array($brand);
            $brand_name = DB::table('brand')->where('brand_id',$brand['parent_id'])->first();
            $brand_name = $this->object_array($brand_name);
            $car_info[$k]['brand_name'] = $brand_name['brand_name'].$brand['brand_name']; 
            $car_info[$k]['seat_num'] = $deploy['seat_num']; 
            $car_info[$k]['doors_num'] = $deploy['doors_num']; 
            $car_info[$k]['tran_type'] = $deploy['tran_type']; 
            $car_info[$k]['rental_price'] = $deploy['rental_price']; 
            $car_info[$k]['total_price'] = $pre_days*($deploy['rental_price']);
            $car_info[$k]['car_img'] = explode(',',$v['car_img'])[0];
        }
       return json_encode($car_info);

   }

    
    //过滤特殊字符
    function replaceSpecialChar($strParam)
    {
        $regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";

        return preg_replace($regex,"",$strParam);
    }

    public function rent_car()
    {
        $user_id = $_COOKIE['user_id'];
        $chit_data= DB::table('user_chit')->where('user_id',$user_id)->get();
        $chit_data = $this->object_array($chit_data);
        foreach ($chit_data as $key => $val) {
        	$row = DB::table('chit')->where('chit_id',$val['chit_id'])->first();
        	$chit_data[$key]['chit'] = $this->object_array($row);
        }
        $data = Input::get();
        $car_id = $data['car_id'];
        $pre_days = mb_substr($data['pre_days'], 0 ,-1,'utf8');
        $data['pre_days'] = $pre_days;
        $row= DB::table('store')->where('store_id',$data['fromStoreId'])->first();
        $data['fromStoreName'] = $this->object_array($row)['store_name'];
        $row= DB::table('store')->where('store_id',$data['toStoreId'])->first();
        $data['toStoreName'] = $this->object_array($row)['store_name'];
        //车辆信息展示
   		$obj = new Information();
        $car_data = $obj->get_one(['car_id'=>$car_id]);
        $deploy = DB::table('deploy')->where('deploy_id',$car_data['deploy_id'])->first();
        $deploy = $this->object_array($deploy);
        $brand = DB::table('brand')->where('brand_id',$deploy['brand_id'])->first();
        $brand = $this->object_array($brand);
        $brand_name = DB::table('brand')->where('brand_id',$brand['parent_id'])->first();
        $brand_name = $this->object_array($brand_name);
        $car_data['brand_name'] = $brand_name['brand_name'].$brand['brand_name']; 
        $car_data['seat_num'] = $deploy['seat_num']; 
        $car_data['doors_num'] = $deploy['doors_num']; 
        $car_data['tran_type'] = $deploy['tran_type']; 
        $car_data['rental_price'] = $deploy['rental_price']; 
        $car_data['total_price'] = $pre_days*($deploy['rental_price']);
        $car_data['car_img'] = explode(',',$car_data['car_img'])[0];
       
        return view('Home/Order/ordering',['car_data'=>$car_data,'deploy_data'=>$deploy,'order_info'=>$data ,'chit_data'=>$chit_data]);
    }

    //搜索符合条件的车辆
    public function shop_serach()
    {
    	$car_d = Input::get('car_d');
    	$car_price = Input::get('car_price');
    	$brand_select = Input::get('brand_select');
    	$pre_days = Input::get('pre_days');
    	$pre_days = mb_substr($pre_days, 0 ,-1,'utf8');
    	$where = "1=1";
    	if ($car_d) {
    		$where .=" and deploy_name like '%{$car_d}%'";
    	}
    	if ($brand_select) {
    		$arr = DB::table('brand')->where('parent_id',$brand_select)->get();
    		$arr = $this ->object_array($arr);
    		$brand_id = array_column($arr ,'brand_id');
    		$brand_id = implode(',',$brand_id);
    		$where .=" and brand_id in ($brand_id)";
    	}

    	if ($car_price) {
    		$car_price = explode('-',$car_price);
    		if (in_array('*',$car_price)) {
    			$where .=" and rental_price > $car_price[0]";
    		} else {
    			$where .=" and rental_price > $car_price[0] and rental_price <= $car_price[1]";
			}
    	}

    	$data = DB::select("select * from car_deploy where $where");
    	$data = $this ->object_array($data);
    	$deploy_id = array_column($data ,'deploy_id');
    	$deploy_id = implode(',',$deploy_id);
    	$car_info = DB::select("select * from car_information where deploy_id in ($deploy_id) and car_status = 0");
    	$car_info = $this ->object_array($car_info);

    	foreach ($car_info as $k=>$v) {
            $deploy = DB::table('deploy')->where('deploy_id',$v['deploy_id'])->first();
            $deploy = $this->object_array($deploy);
            $brand = DB::table('brand')->where('brand_id',$deploy['brand_id'])->first();
            $brand = $this->object_array($brand);
            $brand_name = DB::table('brand')->where('brand_id',$brand['parent_id'])->first();
            $brand_name = $this->object_array($brand_name);
            $car_info[$k]['brand_name'] = $brand_name['brand_name'].$brand['brand_name']; 
            $car_info[$k]['seat_num'] = $deploy['seat_num']; 
            $car_info[$k]['doors_num'] = $deploy['doors_num']; 
            $car_info[$k]['tran_type'] = $deploy['tran_type']; 
            $car_info[$k]['rental_price'] = $deploy['rental_price']; 
            $car_info[$k]['total_price'] = $pre_days*($deploy['rental_price']);
            $car_info[$k]['car_img'] = explode(',',$v['car_img'])[0];
        }

        return json_encode($car_info);
    }

}
