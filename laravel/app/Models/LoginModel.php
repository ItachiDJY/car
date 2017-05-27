<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{

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
