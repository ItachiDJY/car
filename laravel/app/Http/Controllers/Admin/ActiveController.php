<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Active;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ActiveController extends Controller
{
    //活动管理添加页面展示
    public function active_add()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //渲染展示页面
        return view('admin.active.active_add',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
    }
    //活动管理添加操作
    public function active_add_do(Request $request)
    {
        //调用文件上传方法获取文件路径
        $path = $this ->upload($request);
        //接收表单传来的值
        $data = Input::get();
        //删除传过来_token
        unset($data['_token']);
        //让表单数据和文件上传路径相符
        $data['active_img'] = $path['active_img'];
        $data['begin_time'] = strtotime($data['begin_time']);
        $data['end_time'] = strtotime($data['end_time']);
        //实例化model
        $model = new Active();
        //调用添加方法
        $model->adds($data);
        //添加数据成功，页面跳转到展示页面
        return redirect("/active_index");
    }
    //活动管理展示
    public function active_index()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        $arr =DB::table('active')->paginate(6);
//        //调model层
//        $model = new Active();
//        //查询出所有数据
//        $arr = $model->selectAll();
//        //循环取出数据，并把时间戳转换成时间
//        foreach($arr as $key=>$val)
//        {
//            $arr[$key]['begin_time'] =  date('Y-m-d',$val['begin_time']);;
//            $arr[$key]['end_time'] = date('Y-m-d',$val['end_time']);
//        }
        //渲染展示页面
        return view('admin.active.active_index',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'arr'=>$arr,'admin_img'=>$info[0]['admin_img']]);
    }
    //删除活动
    public function active_delete()
    {
        //接视图层传过来的值
        $active_id = Input::get('ids');
        $active_id = explode(',',$active_id);
        //实例化model
        $model = new Active();
        //调用删除方法
        $res = $model->del($active_id);
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
    //活动名称即点即改
    public function active_change_name()
    {
        //接到前台传过来的新名称和对应的用户id
        $name_value = Input::get("name_value");
        $name_id = Input::get("name_id");
        //实例化model
        $model = new Active();
        //调用修改方法
        $res = $model->updates(['active_name'=>$name_value],$name_id);
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
    /**
     * @brief 文件上传，单文件多文件都可以
     * @param Request $request
     * @return array
     */
    public function upload($request)
    {
        $path = [];
        $file = $request->file();
        //return $file;
        //多个input标签
        foreach ($file as $key => $val)
        {
            //input标签是数组情况
            if (is_array($val))
            {
                $keyPath = [];
                foreach ($val as $v)
                {
                    $singlePath = $this->uploadSingle($v);
                    $keyPath[] = $singlePath;
                }
                $path[$key] = $keyPath;
            }
            else
                //input标签单个情况
            {
                $singlePath = $this->uploadSingle($val);
                $path[$key] = $singlePath;
            }
        }

        return $path;
    }

    /**
     * @brief 文件上传辅助,也可用于单文件上传(参数为$request->file())
     * @param Request $file
     * @return array|bool
     */
    public function uploadSingle($file)
    {
        //检测文件是否可用
        if ($file->isValid())
        {
            // 获取文件相关信息
            $ext = $file->getClientOriginalExtension();      // 扩展名
            $tempPath = $file->getRealPath();                //临时文件的绝对路径

            //检测文件格式
            $allowed_extensions = ["png", "jpg", "gif",'JPG','PNG','GIF','jpeg','JPEG'];
            if (!in_array($ext, $allowed_extensions))
            {
                return false;
            }

            //使用uploads本地存储空间（目录）
            $filename = uniqid() . '.' . $ext;

            $datePath = date('Y-m-d');                                     // 上传文件111
            $file->move('uploads/'.$datePath.'/', $filename); // 上传文件111
            $singlePath = 'uploads/'.$datePath.'/'.$filename;
            //$singlePath = $file->storeAs($datePath, $filename, 'uploads'); // 上传文件111

            //$bool = Storage::disk('uploads')->put($filename, file_get_contents($tempPath));   // 上传文件222

            return $singlePath;
        }
        return false;
    }
}