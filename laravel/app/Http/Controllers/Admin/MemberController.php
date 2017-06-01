<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\User;
use App\Models\Level;

header("Content-type:text/html;charset=utf-8");

class MemberController extends Controller
{
    //会员列表展示
    public function index()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //调model层
        $model = new User();
        //查询出所有数据
        $arr = $model->selectAll();
        //渲染展示页面
        return view('admin.member.index',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'arr'=>$arr,'admin_img'=>$info[0]['admin_img']]);
    }
    //删除会员
    public function delete()
    {
        //接视图层传过来的值
        $user_id = Input::get('ids');
        $user_id = explode(',',$user_id);

        //实例化model
        $model = new User();
        //调用删除方法
        $res = $model->del($user_id);
        //判断，成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //用户姓名即点即改
    public function change_name()
    {
        //接到前台传过来的新名称和对应的用户id
        $name_value = Input::get("name_value");
        $name_id = Input::get("name_id");
        //实例化model
        $model = new User();
        //调用修改方法
        $res = $model->updates(['user_name'=>$name_value],$name_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //手机号即点即改
    public function change_phone()
    {
        //接到前台传过来的新名称和对应的用户id
        $phone_value = Input::get("phone_value");
        $phone_id = Input::get("phone_id");
        //实例化model
        $model = new User();
        //调用修改方法
        $res = $model->updates(['user_phone'=>$phone_value],$phone_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //邮箱即点即改
    public function change_email()
    {
        //接到前台传过来的新名称和对应的用户id
        $email_value = Input::get("email_value");
        $email_id = Input::get("email_id");
        //实例化model
        $model = new User();
        //调用修改方法
        $res = $model->updates(['user_email'=>$email_value],$email_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //会员级别列表展示
    public function level()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //调model层
        $model = new Level();
        //查询出所有数据
        $arr = $model->selectAll();
        //渲染展示页面
        return view('admin.member.level',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'arr'=>$arr,'admin_img'=>$info[0]['admin_img']]);
    }
    //会员级别删除
    public function level_delete()
    {
        //接视图层传过来的值
        $member_id = Input::get('ids');
        $member_id = explode(',',$member_id);
        //实例化model
        $model = new Level();
        //调用删除方法
        $res = $model->del($member_id);
        //判断，成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //会员级别名称即点即改
    public function level_name()
    {
        //接到前台传过来的新名称和对应的用户id
        $name_value = Input::get("name_value");
        $name_id = Input::get("name_id");
        //实例化model
        $model = new Level();
        //调用修改方法
        $res = $model->updates(['member_name'=>$name_value],$name_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //最低消费金额即点即改
    public function level_min()
    {
        //接到前台传过来的新名称和对应的用户id
        $min_value = Input::get("min_value");
        $min_id = Input::get("min_id");
        //实例化model
        $model = new Level();
        //调用修改方法
        $res = $model->updates(['min_consum'=>$min_value],$min_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //最高消费金额即点即改
    public function level_max()
    {
        //接到前台传过来的新名称和对应的用户id
        $max_value = Input::get("max_value");
        $max_id = Input::get("max_id");
        //实例化model
        $model = new Level();
        //调用修改方法
        $res = $model->updates(['max_consum'=>$max_value],$max_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //积分兑换比例即点即改
    public function level_point()
    {
        //接到前台传过来的新名称和对应的用户id
        $point_value = Input::get("point_value");
        $point_id = Input::get("point_id");
        //实例化model
        $model = new Level();
        //调用修改方法
        $res = $model->updates(['point_change'=>$point_value],$point_id);
        //判断 修改成功返回1，失败返回0
        if($res)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //添加会员级别页面
    public function add()
    {
        //取出session里面的数据
        $info = $_SESSION['admin'];
        //渲染展示页面
        return view('admin.member.add',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]);
    }
    //添加会员级别操作
    public function add_to()
    {
        //接到添加页面传过来的数据
        $data = Input::get();
        //实例化model层
        $model = new Level();
        //调用添加方法
        $res = $model->add($data);
        //判断 成功跳转到展示页面，失败重新添加
        if($res)
        {
            return redirect("/level");
        }else
        {
            return redirect("/level_add");
        }
    }
}