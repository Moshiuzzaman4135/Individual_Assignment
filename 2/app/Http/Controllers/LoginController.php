<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;

class LoginController extends BaseController
{
    public function index(){
    	return view('login.index');
    }
    public function verify(Request $req){
    	// echo "Posted<br>";
    	// echo $_POST['email']."<br>";
    	// echo $_POST['password']."<br>";
    	// echo $req->email."<br>";
    	// echo $req->password."<br>";

        // $data = User::all();
        // print_r($data);
        $user = User::where('email',$req->email)
        ->where('password',$req->password)
        ->first();
        if($user != null){

            if($user->type=='admin'){

                $req->session()->put('email',$req->email);
                return redirect()->route('admin.index');
            }
            if($user->type=='manager'){
                $req->session()->put('email',$req->email);
                return redirect()->route('manager.index');
            }




            
        }
        else{
            $req->session()->flash('msg','invalid username/password');
            return redirect('/login');

        }
    }
}
