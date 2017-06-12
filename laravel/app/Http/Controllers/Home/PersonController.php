<?php

namespace App\Http\Controllers\Home;

use Faker\Provider\ar_SA\Person;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\PersonModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PersonController extends Controller
{
    /*
     * 我的账户模块
     *
     */

    //我的信息
    public function account()
    {
        $model = new PersonModel();
        //获取当前登录人的信息
        $info = $model->person_info();
        //查出订单的数量
        $count = $model->select_order($info['user_id']);

        return view("Home/Person/account",['info'=>$info,'count'=>$count]);
    }

    //实名认证
    public function check()
    {
        $card = Input::get('id_member');
        $name = Input::get('user_name');
        $email = Input::get('user_email');
        $model = new PersonModel();
        $msg = $model->check($name,$card);
        if ($msg['result']['code'] != 1000) {
            $message['status'] = 1;
            $message['msg'] = "姓名与身份证号码不一致!";

            exit(json_encode($message));
        } else {
            //把姓名和身份证号以及邮箱保存在数据库
            $data = [
                'user_name' => $name,
                'user_email' => $email,
                'id_type' => '身份证',
                'id_member' => $card,
            ];
            $logo = $_COOKIE['logo'];
            $model = new PersonModel();
            $res = $model->updates($data,$logo);

            $message['status'] = 0;
            $message['msg'] = "姓名与身份证号码一致!";

            exit(json_encode($message));
        }

    }


   //登录密码
    public function login_pwd()
    {
        $model = new PersonModel();
        //获取当前登录人的信息
        $info = $model->person_info();
        //查出订单的数量
        $count = $model->select_order($info['user_id']);

        return view("Home/Person/login_pwd",['info'=>$info,'count'=>$count]);
    }

    //验证原密码是否输入正确
    public function check_pwd()
    {
        $old_pwd = Input::get('old_pwd');
        //验证是否一样
        $model = new PersonModel();
        $info = $model->person_info();
        if($info['user_pwd'] == md5($old_pwd)) {
            $msg = [
                'status' => 0,
                'msg' => '正确'
            ];
            exit(json_encode($msg));
        } else {
            $msg = [
                'status' => 1,
                'msg' => '原密码输入有误!'
            ];
            exit(json_encode($msg));
        }
    }

    //修改登录密码
    public function change_pwd()
    {
        $new_pwd= Input::get('new_pwd');
        $data['user_pwd'] = md5($new_pwd);
        $logo = $_COOKIE['logo'];
        $model = new PersonModel();
        $res = $model->updates($data,$logo);
        if ($res) {
            $msg = [
                'status' => 0,
                'msg' => '修改成功!'
            ];
            exit(json_encode($msg));
        } else {
            $msg = [
                'status' => 1,
                'msg' => '输入的信息有误!'
            ];
            exit(json_encode($msg));
        }
    }




    /*
     * 会员章程
     */
    public function member_rule()
    {
        $model = new PersonModel();
        //获取当前登录人的信息
        $info = $model->person_info();
        //查出订单的数量
        $count = $model->select_order($info['user_id']);

        return view('Home/Person/member_rule',['info'=>$info,'count'=>$count]);
    }

    /*
    * 会员明细
    */

    public function member_detail()
    {
        $model = new PersonModel();
        //获取当前登录人的信息
        $info = $model->person_info();
        //查出订单的数量
        $count = $model->select_order($info['user_id']);

        return view('Home/Person/member_detail',['info'=>$info,'count'=>$count]);
    }

}