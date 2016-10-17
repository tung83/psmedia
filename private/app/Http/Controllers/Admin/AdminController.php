<?php

namespace App\Http\Controllers\Admin;

use App\Services\PannelAdmin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new AdminController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
    * Show the admin panel.
    *
    * @return \Illuminate\Http\Response
    */
    public function __invoke()
    {
         //return 'Hello World2';
        
        //dd($pannel);

        return view('back.index');
        
    }
}
