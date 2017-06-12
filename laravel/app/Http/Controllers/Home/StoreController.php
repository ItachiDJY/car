<?php

namespace App\Http\Controllers\Home;

use App\Models\StoreModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function index()
    {
        $city_name = Input::get("city_name");
        $city_view = Input::get('city_view');

        isset($city_name) ? $city_name = $city_name: $city_name = $_COOKIE['city_name'];
        isset($city_view) ? $city_view = $city_view: $city_view = "beijingshi";

        //判断是否有静态页，如果有就用静态页，没有就重新生成
        if(file_exists("html/$city_view.html"))
        {
            include("./html/$city_view.html");die;
        }

        $model = new StoreModel();
        $store_id = $model->get_id($city_name);
        $result = $model->get_cat_son($store_id);
        $data = $model->get_cat_childs($result,$store_id);
        if(isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
            ob_start();
            echo view("Home/Store/$city_view",['data'=>$data,'city_name'=>$city_name,'username'=>$username]);
            $content=ob_get_contents();

            file_put_contents("html/$city_view.html",$content);
            return view("Home/Store/$city_view",['data'=>$data,'city_name'=>$city_name,'username'=>$username]);

        } else {
            ob_start();
            echo view("Home/Store/$city_view",['data'=>$data,'city_name'=>$city_name]);
            $content=ob_get_contents();
            file_put_contents("html/$city_view.html",$content);
            return view("Home/Store/$city_view",['data'=>$data,'city_name'=>$city_name]);
        }

    }

    public function get_city()
    {
        $city_name = Input::get("city_name");
        $model = new StoreModel();
        $store_id = $model->get_id($city_name);
        $result = $model->get_cat_son($store_id);
        $data = $model->get_cat_childs($result,$store_id);

        return view("Home/Store/store",['data'=>$data,'city_name'=>$city_name]);
    }





}
