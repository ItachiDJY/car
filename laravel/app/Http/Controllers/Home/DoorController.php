<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DoorController extends Controller
{
   public function index()
   {
       $store_id = Input::get('store_id');
       return view('Home/Door/door');
   }
}
