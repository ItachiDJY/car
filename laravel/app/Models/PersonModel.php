<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class PersonModel extends Model
{

    //获取当前登录人的信息并转换成数组
    public function person_info()
    {
        $username = $_COOKIE['username'];
        $logo = $_COOKIE['logo'];
        $info = DB::table('user')->where('pwd_hash',$logo)->first();
        $info = $this->object_array($info);
        return $info;
    }
    /**
     * 真实姓名和身份证号码判断是否一致
     */
    public function check($name,$idcard)
    {
        $url = "http://api.avatardata.cn/IdCardCertificate/Verify";
        $vars['key']='6d4fa0c60784462280c0fcb988cccd5d';
        $vars['realname']=$name;
        $vars['idcard']="420682199512120513";
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $params[CURLOPT_SSL_VERIFYPEER] = false;

        $postfields = '';
        foreach ($vars as $key => $value)
        {
            $postfields .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS] = $postfields;
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        $arr= json_decode($content,true);
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


    // 保存数据（修改car_user表）
    public function updates($data,$id)
    {
       return DB::table('user')->where('pwd_hash',$id)->update($data);
    }

    //查出订单数量
    public function select_order($user_id)
    {
        return DB::table('order')->whereRaw("user_id=$user_id")->count();
    }

}
