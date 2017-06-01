<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Driver;
use App\Models\Region;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DriverController extends Controller
{
   //展示司机信息
   public function index()
   {
    $driverObj = new Driver;
		$regObj = new Region;
    $data = $driverObj ->selectAll();
		$reg_data = $regObj ->selectAll();
    for ($i=0;$i<count($data);$i++) {
      foreach ($reg_data as $key => $val) {
        if ($data[$i]['region_id'] == $val['region_id']) {
            $data[$i]['region_id'] = $val['region_name'];
        }
      }
    }
    //var_dump($data);die;
		return view('admin.driver.driverinfo', ['arr' =>$data]) ;
   }

   //司机添加列表
   public function add()
   {
      $regObj = new Region;
      $data = $regObj ->select(1);
      //$data = $this->cate_tree($data);
      //print_r($data);die;
      return view('admin.driver.driveradd',['info' => $data]);
   }
   //执行添加的方法
   public function add_do(Request $request)
   {
	   $path = $this ->upload($request);
     $post = Input::get();
      //var_dump($path);die;
      $token = $post ['_token'];
      unset($post['_token']);
      unset($post['reg_two']);
      unset($post['reg_one']);
      $post['license_img'] = implode(',', $path['img']);
      $post['status'] = 0;
      //var_dump($post);die;
      $driverObj = new Driver;
      $driverObj->adds($post);

      return redirect('/driver');
   }
   //地区查询三级联动
   public function reg_select()
   {
      $post = Input::get();
      $regObj = new Region;
      $data = $regObj ->select($post['parent_id']);

      return json_encode($data);
   }
   
   // //显示配置的方法
   // public function deployList() {
   //    $deployObj = new Deploy ;
   //    $data = $deployObj ->selectAll() ;

   //    return view('admin.car.deploy' ,['data' =>$data]) ;
   // }

   // //显示添加的方法
   // public function deploy_add() 
   // {
   //    $deployObj = new Deploy ;
   //    $data = $deployObj ->selectAll() ;

   //    return view('admin.car.deployadd') ;
   // }
   // //执行添加配置的方法
   // public function deploy_add_do() 
   // {
   //     $post = Input::get();
   //     $token = $post['_token'] ;
   //     unset($post['_token']) ;
   //     $deployObj = new Deploy ;
   //     $bool = $deployObj ->adds($post);
   //     return redirect('/deploy');

      
   // }

   // //车辆品牌展示
   // public function car_brand()
   // {
   //     /*$brandObj = new Brand ;
   //     $data = $brandObj -> selectAll();*/
   //     $data = DB::select("select brand_id,brand_name,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");

   //     return view('admin.car.brand' ,['data' =>$data]);
   // }

   // //车辆品牌添加
   // public function car_brand_add()
   // {
   //   /* $brandObj = new Brand ;
   //     $data = $brandObj -> brandSelect();*/
   //     $data = DB::select("select brand_id,brand_name,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");
       
   //     return view('admin.car.brandadd' ,['brand_list' =>$data]) ;
   // }

   // //执行车辆品牌添加
   // public function car_brand_add_do(Request $request)
   // {
   //    $post = Input::get();
   //    $token = $post['_token'] ;
   //    unset($post['_token']) ;
   //    $post['path'] = ($post['parent_id']==0) ? '0' : $post['path'].'-'.$post['parent_id'];
   //    $path = $this ->upload($request);
   //    $post['brand_logo'] =isset($path['brand_logo']) ? $path['brand_logo'] : '';
   //    $brandObj = new Brand ;
   //    $bool = $brandObj ->adds($post);
   //    return redirect('/brand');
    
   // }

   //无限级分类
   // public function cate_tree($arr ,$parent_id = 0) 
   // {
   //    $result = [];
   //    if ($arr) {
   //        foreach ($arr as $key => $value) {
   //           $result[$key] = $value;
   //           $result[$key]['son'] = $this ->cate_tree($arr ,$value['parent_id']);
   //        }
   //    }

   //    return $result;
   // }


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
