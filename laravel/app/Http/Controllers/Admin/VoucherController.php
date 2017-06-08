<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Voucher;

class VoucherController extends Controller
{
    //代金券添加页面展示
    public function voucher_add()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //渲染展示页面
        return view('admin.voucher.voucher_add',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
    }
    //代金券添加操作
    public function voucher_add_do()
    {
        //接收表单传来的值
        $data = Input::get();
        //删除传过来_token
        unset($data['_token']);
        //实例化model
        $model = new Voucher();
        //调用添加方法
        $model->adds($data);
        //添加数据成功，页面跳转到展示页面
        return redirect("/voucher_index");
    }
    //代金券展示
    public function voucher_index()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //调model层
        $model = new Voucher();
        //查询出所有数据
        $arr = $model->selectAll();
        //渲染展示页面
        return view('admin.voucher.voucher_index',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img'],'arr'=>$arr]);
    }
    //删除代金券
    public function voucher_delete()
    {
        //接视图层传过来的值
        $chit_id = Input::get('ids');
        $chit_id = explode(',',$chit_id);
        //实例化model
        $model = new Voucher();
        //调用删除方法
        $res = $model->del($chit_id);
        //判断 把状态值和提示信息传到前台
        if($res)
        {
            $data[] = [
                'status'=>200,
                'info'=>'删除成功'
            ];
        }else
        {
            $data[] = [
                'status'=>201,
                'info'=>'删除失败'
            ];
        }
        return json_encode($data);
    }
    //代金券名称即点即改
    public function voucher_change_name()
    {
        //接到前台传过来的新名称和对应的用户id
        $name_value = Input::get("name_value");
        $name_id = Input::get("name_id");
        //实例化model
        $model = new Voucher();
        //调用修改方法
        $res = $model->updates(['chit_name'=>$name_value],$name_id);
        //判断 把状态值和提示信息传到前台
        if($res)
        {
            $data[] = [
                'status'=>200,
                'msg'=>'修改成功'
            ];
        }else
        {
            $data[] = [
                'status'=>201,
                'msg'=>'修改失败'
            ];
        }
        return json_encode($data);
    }
    //代金券面额即点即改
    public function voucher_change_value()
    {
        //接到前台传过来的新名称和对应的用户id
        $chit_value = Input::get("chit_value");
        $chit_id = Input::get("chit_id");
        //实例化model
        $model = new Voucher();
        //调用修改方法
        $res = $model->updates(['chit_value'=>$chit_value],$chit_id);
        //判断 把状态值和提示信息传到前台
        if($res)
        {
            $data[] = [
                'status'=>200,
                'msg'=>'修改成功'
            ];
        }else
        {
            $data[] = [
                'status'=>201,
                'msg'=>'修改失败'
            ];
        }
        return json_encode($data);
    }
}