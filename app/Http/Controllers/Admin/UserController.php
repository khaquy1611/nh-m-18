<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::orderBy('id','DESC')->paginate(5);
        return view('admin.user.index',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.creat');
    }
    
    public function search(Request $request){
        $search = $request->get('search');
            $users = User::where('email','like','%'. $search . '%')->orWhere('id','like','%'.  $search . '%')->paginate(5);
            return view('admin.user.index',compact('users'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([    
            'name' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|unique:users,email'

        ],[
            'name.required' => "Tên Tài Khoản Không Được Để Trống",
            'name.unique' => "Tên Tài Khoản Đã Tồn Tại",
            'password.required' => "Mật Khẩu Không Được Để Trống",
            'confirm_password.required' => "Nhập Lại Mật Khẩu",
            'confirm_password.same' => "Nhập Lại Mật Khẩu Không Chính Xác",
            'email.required' => "Email Không Được Để Trống",
            'email.unique' => "Email Đã Tồn Tại",
            'email.email' => "Email Không Đúng Định Dạng"
        ]);
        $model = User::create([
            'name'=> $request->name,
            'password'=>Hash::make($request->password),
            'confirm_password'=>$request->confirm_password,
            'email'=>$request->email,
            'users_status'=>$request->users_status
        ]);
        if($model){
            return redirect()->back()->with('success','Thêm Tài Khoản Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Tài Khoản Thất Bại');
        }    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::all();
       return view("admin.user.update",['users'=>$user,'user'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
           $request->validate([    
            'name' => 'required|unique:users',
            'email' => 'required|unique:users,email',
            'password'=> 'required'
        ],[
            'name.required' => "Tên Tài Khoản Không Được Để Trống",
            'name.unique' => "Tên Tài Khoản Đã Tồn Tại",
            'password.required' => "Mật Khẩu Không Được Để Trống",
            'email.required' => "Email Không Được Để Trống",
            'email.unique' => "Email Đã Tồn Tại",
            'email.email' => "Email Không Đúng Định Dạng"
        ]);
       

      $updated =  $user->update($request->all());

        if($updated){
            return redirect()->route('user.index')->with('success','Sửa Tài Khoản Thành Công');
        }
        else {
            return redirect()->route('user.index')->with('error','Sửa Tài Khoản Không Thành Công');
        }
    }

    public function status(Request $request){
    $user = User::find($request->id);
    if($user){
    $user->users_status = $request->status;
    }
   
    $user->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();
        if($delete){     
            return redirect()->route('user.index')->with('success',"Xóa Tài Khoản Thành Công");
       }else{
         return redirect()->route('user.index ')->with('error',"Xóa Tài Khoản Không Thành Công");
       } 
    }
}
