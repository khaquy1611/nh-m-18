<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function register(){
    return view('fontend.register');
    }

    public function post_register(Request $request){
    	$request->validate([
    	'name' => 'required',
    	'email' => 'required|email|unique:customers',

    	],[
  		'name.required' => "Họ Tên Không Được Để Trống",
  		'email.required' => 'Email Không Được Để Trống',
    	]);

   		$customers_password = Hash::make($request->password);
    	$model = Customer::create([
    	'name' => $request->name,
    	'email'  => $request->email,
    	'phone'  => $request->phone,
    	'address' => $request->address,
    	'password' => $customers_password
    	]);

    	if($model){
    		return redirect()->route('fontend.sign_in')->with('success','Đăng Ký Thành Công');
    	}else{
    		return redirect()->back()->with('error','Đăng Ký Thất Bại');
    	}
    }
 
    public function sign_in(){
        return view('fontend.sign_in');
    }

    public function post_sign_in(Request $request){
    	$request->validate([
    	'email' => 'required|email',
    	'password' => 'required'

    	],[
  		'email.required' => "Email Không Được Để Trống",
  		'password.required' => 'Mật Khẩu Không Được Để Trống',
    	]);
        $login = Auth::guard('cus')->attempt($request->only('email','password'),$request->has('rmb'));

        if($login){
    	return redirect()->route('fontend.index')->with('success','Đăng Nhập Thành Công');
        }else{
    	return redirect()->back()->with('error','Đăng Nhập Thất Bại');
        }

    }

    public function logout(){
    	Auth::guard('cus')->logout();
    	return redirect()->route('fontend.index')->with('success','Đăng Xuất Thành Công');
    }
}
