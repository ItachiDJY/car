<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Need_order;

class LongController extends Controller
{
    //长租预定展示
    public function long_index()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //查询出所有数据,并调用分页方法
        $arr = $arr =DB::table('need_order')->paginate(12);
        //渲染展示页面
        return view('admin.long.long_index',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img'],'arr'=>$arr]);
    }
    //删除长租预定
    public function long_delete()
    {
        //接视图层传过来的值
        $need_id = Input::get('ids');
        $need_id = explode(',',$need_id);
        //实例化model
        $model = new Need_order();
        //调用删除方法
        $res = $model->del($need_id);
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
    //修改状态
    public function long_status()
    {
        //接到前台传过来的对应的id
        $id = Input::get("id");
        //实例化model
        $model = new Need_order();
        //调用修改方法
        $res = $model->updates(['status'=>1],$id);
        //判断 把需要的数据传到前台
        if($res) {
            $data[] = [
                'status'=>200,
                'msg'=>'修改成功'
            ];
        }else {
            $data[] = [
                'status'=>201,
                'msg'=>'修改失败'
            ];
        }
        return json_encode($data);
    }
}