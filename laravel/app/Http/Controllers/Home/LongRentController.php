<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin;
use App\Models\Need_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class LongRentController extends Controller
{
    public function index()
    {
       $data = DB::table('brand')->where('parent_id','=',0)->get();
       return view('Home/LongRent/longrent',['data'=>$data]);
    }
    //查看某品牌的车辆
    public function select()
    {
        $id = $_GET['id'];
        if($id==0){
            return 0;
        }else{
            $users = DB::table('brand')->where('parent_id', '=', $id)->get();
            if($users==""){
                return 0;
            }else{
                exit(json_encode($users));
            }
        }
    }
    //接收客户租车信息并存储进cooKie
    public function add_show()
    {
        $data['name'] = $_GET['name'];
        $data['time'] = $_GET['time'];
        $data['lease'] = $_GET['lease'];
        $data['number'] = $_GET['number'];
        $brand = $_GET['brand'];
        $type = $_GET['type'];
        $data['names'] = $_GET['names'];
        $data['contact_name'] = $_GET['contact_name'];
        $data['mobile'] = $_GET['mobile'];
        $data['email'] = $_GET['email'];

        //查询出品牌以及车型的信息并存贮进数组

       //        品牌
        if($type==""||$brand==""){
            return 0;
        }else{
            $brand = DB::table('brand')->where('brand_id', $brand)->first();
            $data['brand'] = $brand->brand_name;
            //车型
            $brand = DB::table('brand')->where('brand_id', $type)->first();
            $data['img'] = $brand->brand_logo;
            $data['type'] = $brand->brand_name;
            if($data['name']==''||$data['time']==''||$data['lease']==''|| $data['number']==''|| $data['brand']==''||$data['type']==''||$data['names']==''||$data['contact_name']==''||$data['mobile']==''||$data['email']==''){
                return 0;
            }else{
                $arr = serialize($data);
                setcookie("names", $arr);
                return 1;
            }
        }
    }
    //取出cookie里面的客户长租信息,展示客户长租信息并等待客户下单
    public function show()
    {
        $data = $_COOKIE['names'];
        $date = unserialize($data);
       return view('Home/LongRent/default',['date'=>$date]);
    }
    //下需求订单
    public function need()
    {
        $order = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//订单号
        $name = $_GET['name'];//城市
        $time = $_GET['time'];//时间
//        echo $time;die;
        $lease = $_GET['lease'];//租期
        $number = $_GET['number'];//数量
        $brand = $_GET['brand'];//品牌
        $type = $_GET['type'];//车型
        $contact_name = $_GET['contact_name'];//联系人
        $mobile = $_GET['mobile'];//电话
        $email = $_GET['email'];//邮件
        $names = $_GET['names'];//企业
        $need_time =  date("Y-m-d");//下单时间
        $data = [
                    'order'=>$order,
                    'city'=>$name,
                    'pop_time'=>$time,
                    'lease'=>$lease,
                    'lease_num'=>$number,
                    'brand'=>$brand,
                    'audi_brand'=>$type,
                    'contacts'=>$contact_name,
                    'link_phone'=>$mobile,
                    'email'=>$email,
                    'need_time'=>$need_time,
                    'company'=>$names,
                ];
        $model = new Need_order();
        $date = $model->adds($data);
        if($date){
            $users['sum'] = 1;
            $users['tate'] = $order;
            exit(json_encode($users));
        }else{
            $users['sum'] = 0;
            exit(json_encode($users));
        }
    }
}
