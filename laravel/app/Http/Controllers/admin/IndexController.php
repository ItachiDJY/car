<?php
namespace App\Http\Controllers\admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin/index');
    }

   public function getAbout()
   {
   		return view('admin/about');
   }
}
