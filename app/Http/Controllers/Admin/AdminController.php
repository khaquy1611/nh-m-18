<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function dashboard(){
   	return view('admin.dashboard');
   }
    public function login(){
    	return view('admin.login');
    }

    public function post_login(Request $request){
       $request->validate([
       	'email' => 'required|email',
       	'password'=> 'required'
       ],[
       		'email.required'=> 'Email Không Được Để Trống',
       		'email.email' => "Email Phải Đúng Định Dạng",
       		'password.required'=>"Mật Khẩu Không Được Để Trống"
       ]);
       // Code Login ở đây
       if(Auth::attempt($request->only('email','password',$request->has('rmb')))){
       			return redirect()->route('admin.dashboard');
       }else{
       	    return redirect()->back();
       }
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('login');
    }



}
