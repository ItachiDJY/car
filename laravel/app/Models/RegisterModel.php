<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{

    //正则验证

    public function check($data)
    {
        $reg_name = '/^[\x{4e00}-\x{9fa5}]{2,5}$/u';
        $reg_phone = '/^1[3,5,8,7]\d{9}$/';
        $reg_pwd = '/^\w{6,18}$/';
        $flag_name = 0;
        $flag_phone = 0;
        $flag_pwd = 0;
        //验证姓名
        if(!preg_match($reg_name,$data['user_name'])) {
            echo "<script>alert('姓名为2-5位汉字!');location.href='/register'</script>";die;
        } else {
            $flag_name = 1;
        }

        //验证手机号
        if(!preg_match($reg_phone,$data['user_phone'])) {
            echo "<script>alert('手机号收入有误!');location.href='/register'</script>";die;
        } else {
            $flag_phone = 1;
        }

        //验证密码
        if(!preg_match($reg_pwd,$data['user_pwd'])) {
            echo "<script>alert('密码长度为6-18位!');location.href='/register'</script>";die;
        } else {
            $flag_pwd = 1;
        }

        if($flag_name==1 && $flag_phone==1 && $flag_pwd==1) {
            return true;
        } else {
            return false;
        }
    }
}