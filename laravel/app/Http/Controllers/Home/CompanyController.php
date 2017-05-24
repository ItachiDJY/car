<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
   public function index()
   {
       return view('Home/Company/company');
   }
}
