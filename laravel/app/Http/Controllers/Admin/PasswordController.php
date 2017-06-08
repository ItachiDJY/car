<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Admin;

class PasswordController extends Controller
{
    //个人用户修改密码页面展示
    public function password_update()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //渲染展示页面
        return view('admin.password.password_update',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
    }
    //活动管理添加操作
    public function password_update_to()
    {
        //取出session里面的数据
        $arr = $_SESSION['admin'];
        //接收表单传来的值
        $data = Input::get();
        //删除传过来_token
        unset($data['_token']);
        $new_pwd = md5($data['new_pwd']);
        //实例化model
        $model = new Admin();
        //调用修改方法
        $res = $model->updates(['admin_pwd'=>$new_pwd],$arr[0]['admin_id']);
        //判断
        if($res)
        {
            /*
             *修改成功，清空session，重新登录
            */
            //销毁session
            session_destroy();
            //返回到登录页面
            return redirect("/admin_login");
        }else
        {
            //修改密码失败，跳转回修改密码页面
            return redirect("/password_update");
        }
    }
    //旧密码操作
    public function sure_old_pwd()
    {
        //接收到前台传过来的旧密码的信息
        $info = Input::get();
        //取出session里面的数据
        $arr = $_SESSION['admin'];
        //取出存在session里面的对应id
        $id = $arr[0]['admin_id'];
        //实例化model
        $model = new Admin();
        //调用查询单条的方法
        $res = $model->select($id);
        //判断并返回信息
        if(md5($info['old_pwd']) == $res[0]['admin_pwd'])
        {
            $data[] = [
                "status"=>200,
                "msg"=>"您输入的原始密码正确"
            ];
        }else
        {
            $data[] = [
                "status"=>201,
                "msg"=>"您输入的原始密码有误"
            ];
        }
        return json_encode($data);
    }
}