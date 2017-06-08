<?php
namespace App\Http\Controllers\Admin;
header("Content-type:text/html;charset=utf-8");
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Session;
use App\Http\Middleware\IllegalLogin;

class LoginController extends Controller
{
    /**
     * 展示登录页面
     */
    public function login()
    {
        //渲染登录页面
        return view("admin.login.login");
    }
    /**
     * 登录信息入库
     */
    public function login_to(Request $request)
    {
        //接到表单传过来的数据
        $data = Input::get();
        /*
         * 用户名防xss攻击
         * */
        //清理空格
        $data['admin_name'] = trim($_POST['admin_name']);
        //过滤html标签
        $data['admin_name'] = strip_tags($data['admin_name']);
        //将字符内容转化为html实体
        $data['admin_name'] = htmlspecialchars($data['admin_name']);
        //防sql注入
        $data['admin_name'] = addslashes($data['admin_name']);
        /*
         * 密码防xss攻击
         * */
        //清理空格
        $data['admin_pwd'] = trim($_POST['admin_pwd']);
        //过滤html标签
        $data['admin_pwd'] = strip_tags($data['admin_pwd']);
        //将字符内容转化为html实体
        $data['admin_pwd'] = htmlspecialchars($data['admin_pwd']);
        //防sql注入
        $data['admin_pwd'] = addslashes($data['admin_pwd']);
        //用户名正则
        $preg_name = "/^[\x{4e00}-\x{9fa5}]+$/u";
        //密码正则
        $preg_pwd = "/^\w{6,12}$/";
        //验证用户名和密码是否满足条件
        if(!$data['admin_name']||!$data['admin_pwd'])
        {
            return "用户名或者密码不能为空";
        }else if(!preg_match($preg_name,$data['admin_name']))
        {
            return "用户名必须为中文";
        }else if(!preg_match($preg_pwd,$data['admin_pwd']))
        {
            return "密码必须为6-12位数字或字母";
        }
        //实例化model层
        $model = new Admin();
        //调用方法查出表里面数据
        $res =$model->login($data);
        //判断查出来的数据和传过来的数据是否符合
        if($res)
        {
            if($res[0]['admin_pwd']==md5($data['admin_pwd']))
            {
                /*
                 * 把数据存储
                 * */
                //调用login_cookie方法
                $this->login_cookie($res);
                //session方法
                session_start();
                $id=$res[0]['admin_id'];
                $_SESSION['admin'] = $res;
                return redirect("index.php/admin")->with('登录成功！');
            }else
            {
                return redirect()->back()->withInput()->withErrors('密码错误！');
            }
        }else
        {
            return redirect()->back()->withInput()->withErrors('用户名错误！');
        }
    }
    //产生cookie
    public function login_cookie($res)
    {
        setcookie("admin_id", $res[0]['admin_id'], time());
    }
    //退出登录
    public function login_out()
    {
      //销毁session
        session_start();
        session_destroy();
        //返回到登录页面
        return redirect("/admin_login");
    }
}