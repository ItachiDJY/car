<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['mem' =>'123']);
        return redirect('/welcome_show') ;
       // return view('welcome');
    }

    public function show()
    {
        $user = session('mem');
        return view('show' ,['user' =>$user]);
    }


}
