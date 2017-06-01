<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Models\Car;
use App\Models\Deploy;
use App\Models\Brand;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CarController extends Controller
{
   //展示车辆信息及使用情况
   public function index()
   {
    /*$cars = DB::table('information')->Paginate(2);
    $car= $cars->items->items;
    $links = $cars ->links();
         echo '<pre>';
         print_r($links);die;*/
		$carObj = new Car ;
		$data = $carObj ->selectAll() ;
		$deployObj = new Deploy ;
		foreach ($data as $key => $val) {
			$data[$key]['car_status'] = $val['car_status'] == 0 ? '未出行' : '已出行' ;
            $data[$key]['car_img'] = explode(',',$val['car_img']); 
            $row = $deployObj ->select($val['deploy_id']);
            $data[$key]['deploy_name'] = $row['deploy_name'];  

		}
		
		return view('admin.car.carinfo', ['arr' =>$data]) ;
   }

   //展示车辆添加
   public function add()
   {
      
        $deployObj = new Deploy ;
        $data = $deployObj ->selectAll() ;
        $arr = array_column($data ,'deploy_name' ,'deploy_id') ;

        return view('admin.car.caradd',['deploy_data' =>$arr]) ;
   }
   //执行添加的方法
   public function add_do(Request $request)
   {
        $post = Input::get();
        $token = $post ['_token'];
        unset($post['_token']);
        $path = $this ->upload($request,'img');
        if (is_array($path['img'])) {
            $post['car_img'] = implode(',', $path['img']);

        } else {
            $post['car_img'] = $path['img'];
            
        }
        $validator=Validator::make($post,[
            'plate_number'=>'required|max:10',
            'deploy_id'=>'required',
            'car_img'=>'required',
        ]);
        if($validator->fails()){
           return $validator->errors();
        }
        $post['car_status'] = 0 ;
        $post['renta_num'] = 0 ;
        $carObj = new Car ;
        $bool = $carObj ->adds($post);
        return redirect('/car');
   }

   //车辆删除方法
   public function car_del()
   {
        $id = Input::get('id');
        $id = explode(',' ,$id);
        $carObj = new Car ;
        $bool = $carObj ->pdel($id);
        if ($bool) {
            return 1 ;
        } else {
            return 0 ;
        }
   }

   //车辆信息修改
   public function car_update()
   {
        $id = Input::get('id') ;
        $carObj = new Car ;
        $carRow = $carObj ->select($id) ;
        $deployObj = new Deploy ;
        $data = $deployObj ->selectAll() ;
        $arr = array_column($data ,'deploy_name' ,'deploy_id') ; 

        return view('admin.car.car_update' ,['car_info'=>$carRow ,'deploy_data' =>$arr]);
   }
   //执行车辆信息修改
   public function car_update_do(Request $request)
   {
        $path = $this ->upload($request ,'img');
      
        $post = Input::get();
        $car_id =$post['car_id'];
        unset($post['car_id']);
        $token = $post ['_token'];
        unset($post['_token']);
        if (!$path) {
            unset($post['car_img']) ;
        } else {
            $post['car_img'] = implode(',', $path['img']);
        
        }
        $validator=Validator::make($post,[
            'plate_number'=>'required|max:10',
            'deploy_id'=>'required',
            'car_status'=>'required',
            'renta_num'=>'required',
        ]);
        if($validator->fails()){
           return $validator->errors();
        }
        $carObj = new Car ;
        $bool = $carObj ->updates($post ,$car_id);
        return redirect('/car');
   }
   
   //显示配置的方法
   public function deployList() 
   {
        $deployObj = new Deploy ;
        $data = $deployObj ->selectAll() ;

        return view('admin.car.deploy' ,['data' =>$data]) ;
   }

   //显示添加的方法
   public function deploy_add() 
   {
     
        $arr = DB::select("select brand_id,brand_name,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");
        return view('admin.car.deployadd' ,['brand_list' =>$arr]) ;
   }
   //执行添加配置的方法
   public function deploy_add_do() 
   {
        $post = Input::get();
        $token = $post['_token'] ;
        unset($post['_token']) ;
        $validator=Validator::make($post,[
            'deploy_name'=>'required',
            'seat_num'=>'required',
            'doors_num'=>'required',
            'fuel_type'=>'required',
            'tran_type'=>'required',
            'output'=>'required',
            'roz'=>'required',
            'dirver_type'=>'required',
            'motor_form'=>'required',
            'skylight'=>'required',
            'tank_capacity'=>'required',
            'air'=>'required',
            'navigation'=>'required',
            'reversing_radar'=>'required',
            'DVD'=>'required',
            'rental_price'=>'required',
            'brand_id'=>'required',
            'foregift'=>'required',
        ]);
        if($validator->fails()){
           return $validator->errors();
        }
        
        $deployObj = new Deploy ;
        $bool = $deployObj ->adds($post);
        return redirect('/deploy');
    }
   //车辆配置删除方法
    public function deploy_del()
   {
        $id = Input::get('id') ;
        $id = explode(',' ,$id);
        $deployObj = new Deploy ;
        $bool = $deployObj ->pdel($id);
        if ($bool) {
            return 1 ;
        } else {
            return 0 ;
        }
   }

   //车辆品牌展示
   public function car_brand()
   {
      
       $data = DB::select("select brand_id,brand_name,brand_logo,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");
      //print_r($data);die;
       return view('admin.car.brand' ,['data' =>$data]);
   }

   //车辆品牌添加
   public function car_brand_add()
   {
     
       $data = DB::select("select brand_id,brand_name,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");
       
       return view('admin.car.brandadd' ,['brand_list' =>$data]) ;
   }

   //执行车辆品牌添加
   public function car_brand_add_do(Request $request)
   {
        $post = Input::get();
        $token = $post['_token'] ;
        unset($post['_token']) ;
        $post['path'] = ($post['parent_id']==0) ? '0' : $post['path'].'-'.$post['parent_id'];
        $path = $this ->upload($request ,'brand_logo');
        $post['brand_logo'] =isset($path['brand_logo']) ? $path['brand_logo'] : '';
        $validator=Validator::make($post,[
            'brand_name'=>'required',
            'parent_id'=>'required',
            'path'=>'required',
            
        ]);
        if($validator->fails()){
           return $validator->errors();
        }
        
        $brandObj = new Brand ;
        $bool = $brandObj ->adds($post);
        return redirect('/brand');
    
   }

   //品牌删除方法
   public function car_brand_del()
   {
        $id = Input::get('id') ;
        $id = explode(',' ,$id);
        $brandObj = new Brand ;
        $bool = $brandObj ->pdel($id);
        if ($bool) {
           return 1 ;
        } else {
           return 0 ;
        }
    }

    //车辆信息修改
   public function car_brand_update()
   {
        $id = Input::get('id') ;
        $brandObj = new Brand ;
        $brandRow = $brandObj ->select($id) ;
        $data = DB::select("select brand_id,brand_name,parent_id,path,CONCAT(path,'-',brand_id) AS depath from car_brand order by depath");
        
       
        return view('admin.car.brand_update' ,['brand_info'=>$brandRow ,'brand_list' =>$data]);
    }
   //执行车辆信息修改
   public function car_brand_update_do(Request $request)
   {
        $path = $this ->upload($request ,'brand_logo');
      
        $post = Input::get();
        $brand_id =$post['brand_id'];
        unset($post['brand_id']);
        $token = $post ['_token'];
        unset($post['_token']);
        if (!$path) {
            unset($post['brand_logo']) ;
        } else {
            $post['brand_logo'] = $path['brand_logo'][0];
        
        }
        $post['path'] = ($post['parent_id']==0) ? '0' : $post['path'].'-'.$post['parent_id'];
        $validator=Validator::make($post,[
            'brand_name'=>'required',
            'parent_id'=>'required',
            'path'=>'required',
            
        ]);
        if($validator->fails()){
           return $validator->errors();
        }
      

        $brandObj = new Brand ;
        $bool = $brandObj ->updates($post ,$brand_id);
      
        return redirect('/brand');
   }

   //无限级分类
   /*public function cate_tree($arr ,$parent_id = 0) 
   {
      $result = [];
      if ($arr) {
          foreach ($arr as $key => $value) {
             $result[$key] = $value;
             $result[$key]['son'] = $this ->cate_tree($arr ,$value['brand_id']);
          }
      }

      return $result;
   }*/


   /**
   * @brief 文件上传，单文件多文件都可以
   * @param Request $request
   * @return array
   */
   public function upload($request ,$imgName)
   {
        $path = [];
        $file = $request->file();
        //return $file;
        if($file[$imgName][0] == '') {
            return false;      
        } 
        //多个input标签
        foreach ($file as $key => $val) {
            //input标签是数组情况
            if (is_array($val)) {
                $keyPath = [];
                foreach ($val as $v) {
                    $singlePath = $this->uploadSingle($v);
                    $keyPath[] = $singlePath;
                }
                $path[$key] = $keyPath;
            } else {
         //input标签单个情况
         
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
        if ($file->isValid()) {
            // 获取文件相关信息
            $ext = $file->getClientOriginalExtension();      // 扩展名
            $tempPath = $file->getRealPath();                //临时文件的绝对路径

            //检测文件格式
            $allowed_extensions = ["png", "jpg", "gif"];
            if (!in_array($ext, $allowed_extensions)) {
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
