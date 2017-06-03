<?php

namespace App\Http\Controllers\Home;

use Faker\Provider\ar_SA\Person;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\PersonModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PersonController extends Controller
{
    public function account()
    {
      $username = $_COOKIE['username'];
      $phone = $_COOKIE['phone'];
      return view("Home/Person/account",['username'=>$username,'phone'=>$phone]);
    }

    //实名认证
    public function check()
    {
        $card = '420682199512120513';
        $name = '杨志傲';
        //$data = Input::get();
        $model = new PersonModel();
        $model->check($card,$name);
    }
}