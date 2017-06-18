<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Information;
use App\Models\Store_phone;
use App\Models\Deploy;
use DB;
class ShopController extends Controller
{
    //到店取还首页展示
   public function index()
   {
       return view('Home/Shop/shop');
   }

   //获取取车地址
//    public function get_pop_address() 
//    {
//        //获取一级地址
//         $pop_address = Input::get('pop_address');
//         $store = new Store();
//         $info = DB::table('store')->where('store_name',$pop_address)->first();
//         $info = $this->object_array($info);
//         $store_id = $info['store_id'];
//         //查询城市信息
//         $arr = $store->get_all();
//         $arr = $this->object_array($arr);
//         $store_arr = $store->get_tree($arr , $store_id);
//         //查询门店电话       
//         foreach ($store_arr as $key=>$val) {
//             foreach ($val['city'] as $k=>$v) {
//                 $store_phone = new Store_phone();
//                 $store_phone = $store_phone->get_one(['store_id'=>$v['store_id']]);
//                 $val['city'][$k]['phone'] = $store_phone['store_phone'];
//             }
//         }
//         print_r($store_arr);
//         $result = ['msg'=>'','success'=>1,'data'=>''];

        
//         return json_encode($store_arr);
//     }

    //获取门店地址信息
    public function store_info()
   {
        $store_id = Input::get('id');
        $store = new Store();
        // $arr =$store->get_all(['parent_id'=>$store_id]);
        $arr = DB::table('store')->where('parent_id',$store_id)->get();
        $arr = $this->object_array($arr);
              
        return json_encode($arr);
   }

   //获取门店电话信息
   public function store_phone()
   {
   	  	$store_id = Input::get('id');
        $store = new Store();
        // $row= $store->get_one(['store_id'=>$store_id]);  
   	  	$row= DB::table('store_phone')->where('store_id',$store_id)->first();
        $arr['phone'] = $this->object_array($row)['store_phone'];

        return json_encode($arr); 
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
        $car_info = $car_info->get_all(['region_id'=>$fromStoreId]);
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

    //车辆展示
    public function car_show()
    {
        $obj = new Information();
        $car_data = $obj->get_all(['car_status'=>0]);
        $car_data = $this->object_array($car_data);
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
       
        return  view('Home/Shop/shop',['car_data'=>$car_data]);
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
