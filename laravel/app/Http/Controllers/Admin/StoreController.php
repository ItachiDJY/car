<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use App\Models\Region;
use App\Models\Store;
use App\Models\Shop_store;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreController extends Controller
{
   //展示门店信息
   public function index()
   {
		$storeObj = new Store;
		$data = $storeObj ->select(0) ;
	    $info = $_SESSION['admin'];
		//print_r($data);die;
		return view('admin.store.storeinfo',['data' =>$data,'admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
   }

   //展示门店添加
   public function add()
   {
      $info = $_SESSION['admin'];
      $storeObj = new Store;
      $data = $storeObj ->select(0) ;
      
      return view('admin.store.storeadd',['data' =>$data,'admin_id'=>$info[0]['admin_id'],'admin_name'=>$info[0]['admin_name'],'admin_img'=>$info[0]['admin_img']]) ;
   }
   //执行添加的方法
   public function add_do()
   {

      $post = Input::get();
      $phone_info['store_phone'] = $post['store_phone'];
      $token = $post ['_token'];
      unset($post['_token']);
      unset($post['store_phone']);
      $storeObj = new Store;
      $shopObj = new Shop_store;
      $id = $storeObj ->insert($post);
      $phone_info['store_id'] = $id;
 
      $shopObj->adds($phone_info);
   
      return redirect('/store');
   }
   
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
      $shopeObj = new Shop_store;
      $data = $storeObj ->select($id);
      $info = $shopeObj->selectAll();

      for ($i=0;$i<count($data);$i++) {
         foreach ($info as $key => $val) {
            if($data[$i]['store_id'] == $val['store_id']) {
               $data[$i]['phone'] = $val['store_phone'];
            }
         }
      }
    
      return json_encode($data);
   }
}
