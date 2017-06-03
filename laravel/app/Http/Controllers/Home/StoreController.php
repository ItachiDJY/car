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

        $model = new StoreModel();
        $store_id = $model->get_id($city_name);
        $result = $model->get_cat_son($store_id);
        $data = $model->get_cat_childs($result,$store_id);
        if(isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
            return view("Home/Store/$city_view",['data'=>$data,'city_name'=>$city_name,'username'=>$username]);
        } else {
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
