<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use App\Models\Region;
use App\Models\Store;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreController extends Controller
{
   //展示门店信息
   public function index()
   {
		$storeObj = new Store;
		$data = $storeObj ->select(0) ;
	
		//print_r($data);die;
		return view('admin.store.storeinfo',['data' =>$data]) ;
   }

   //展示门店添加
   public function add()
   {
      
      $deployObj = new Region ;
      $data = $deployObj ->select(1);
      
      return view('admin.store.storeadd',['data' =>$data]) ;
   }
   //执行添加的方法
   // public function add_do(Request $request)
   // {
	  //  $path = $this ->upload($request);
   //    $post = Input::get();
   //    $token = $post ['_token'];
   //    unset($post['_token']);
   //    $post['car_img'] = implode(',', $path['img']);
   //    $post['car_status'] = 0 ;
   //    $post['renta_num'] = 0 ;
   //    $carObj = new Car ;
   //    $bool = $carObj ->adds($post);
   //    return redirect('/car');
   // }
   
   public function store_select()
   {
      $id = Input::get('store_id');
      $storeObj = new Store;
      $data = $storeObj ->select($id);
      //print_r($data);die;
      return json_encode($data);
   }
   
    public function store_list()
   {
      $id = Input::get('store_id');
      $storeObj = new Store;
      $data = $storeObj ->select($id);
      print_r($data);die;
      return json_encode($data);
   }
}
