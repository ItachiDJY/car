<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StaffController extends Controller
{
   //展示后台管理员信息
   public function index()
   {
      $info = $_SESSION['admin'];
  		$staffObj = new Admin ;
  		$data = $staffObj ->selectAll() ;
  		return view('admin.staff.staffinfo', ['arr' =>$data,'admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
   }

   //员工添加列表
   public function add()
   {  
      $info = $_SESSION['admin'];
      return view('admin.staff.staffadd',['admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
   }
   //执行添加的方法
   public function add_do(Request $request)
   {
	   $path = $this ->upload($request);
      $post = Input::get();
      //var_dump($path);die;
      $token = $post ['_token'];
      unset($post['_token']);
      $post['admin_img'] = implode(',', $path['img']);
      $post['admin_pwd'] = md5($post['admin_pwd']);
     // var_dump($post);die;
      $staffObj = new Admin ;
      $bool = $staffObj ->adds($post);
      return redirect('/staff');
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
