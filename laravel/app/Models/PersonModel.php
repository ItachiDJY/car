<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{


    /**
     * 真实姓名和身份证号码判断是否一致
     */
    public function check($card,$name)
    {
        $appkey = "42b5ccf74ecd3230fbd05025ad1694bf";

        $url = "http://op.juhe.cn/idcard/query";

        $params = array(
            "idcard" => $card,//身份证号码
            "realname" => $name,//真实姓名
            "key" => $appkey,//应用APPKEY(应用详细页查询)
        );
        $paramstring = http_build_query($params);
        $content = $this->juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                if($result['result']['res'] == '1'){
                    echo "身份证号码和真实姓名一致";die;
                }else{
                    echo "身份证号码和真实姓名不一致";die;
                }
                #print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";die;
        }
    }



   //实名认证
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
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
