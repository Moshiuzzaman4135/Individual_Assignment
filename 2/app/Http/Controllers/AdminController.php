<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class AdminController extends BaseController
{
    public function index(Request $req){
        if($req->session()->has('email')){
            return view('admin.index');
        }else{
            return redirect('/login');
        }

    	//return view('home.index');
    }
    
}
