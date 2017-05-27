<?php

namespace App\Http\Controllers\Home;

use App\Model\Register;
use App\Model\RegisterModel;
use App\Model\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use APP\Model;
use DB;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //注册页面
    public function index()
    {
        return view('Home/Register/register');
    }

    //接收值并验证存库
    public function register()
    {
      $data = Input::except('_token','validateCode');
      //过滤特殊字符
      $data = $this->actionFilterArr($data);
      //后台正则验证数据
      $model = new RegisterModel();
      $res = $model->check($data);
      if($res) {

          $data['pwd_hash'] = md5($data['user_name'].time());//身份的唯一标识
          $data['user_pwd'] = md5($data['user_pwd']);
          $re = DB::table('car_user')->insert($data);
          if ($re) {
              setcookie('user_name',$data['user_name'],'0','/');
              setcookie('logo',$data['pwd_hash'],'0','/');
              return redirect("/");
          }
      }

    }

    //接收手机验证码
    public function check_code()
    {
        $user_phone = Input::get("user_phone");
        $code = rand(10000,99999);
        $model = new Sms( array('api_key' => '52d3b940acb68050372b035c27eb48a7' , 'use_ssl' => FALSE ) );
        $res = $model->send( $user_phone, "您的验证码为:".$code."三分钟有效期"."【铁壳测试】");
        if($res) {
            if(isset( $res['error']) &&  $res['error'] == 0 ){
                echo $code;die;
            }else{
                echo 0;
            }
        }
    }

    //验证手机号的唯一性
    public function check_phone()
    {
        $user_phone = Input::get("user_phone");
        $data = DB::table('car_user')->where('user_phone', $user_phone)->first();
        if($data) {
            echo 0;die;
        } else {
            echo 1;die;
        }
    }

    //防止sql注入。xss攻击(1)
    public function actionFilterArr($arr)
    {
        if(is_array($arr)){
            foreach($arr as $k => $v){
                $arr[$k] = $this->actionFilterWords($v);
            }
        }else{
            $arr = $this->actionFilterWords($arr);
        }
        return $arr;
    }
   //防止xss攻击
    public function actionFilterWords($str)
    {
        $farr = array(
            "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
            "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
            "/select|insert|update|delete|drop|\'|\/\*|\*|\+|\-|\"|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
        );
        $str = preg_replace($farr,'',$str);
        return $str;
    }
}
