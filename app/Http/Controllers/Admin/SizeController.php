<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $sizes = Size::orderBy('sizes_id','DESC')->paginate(5);
    return view('admin.size.index',compact("sizes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.size.creat');
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
            'sizes_name' => 'required|unique:sizes'

        ],[
            'sizes_name.required' => "Tên Kích Cỡ Bắt Buộc Nhập Buộc Nhập",
            'sizes_name.unique' => "Tên Kích Cỡ Đã Tồn Tại"
        ]);
       
        $model = Size::create([
            'sizes_name'=> $request->sizes_name,
        ]);
        if($model){
            return redirect()->back()->with('success','Thêm  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Tên  Thất Bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
    $sizes = Size::all();
    return view("admin.size.update",['sizes'=>$size,'size'=>$sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
      $request->validate([    
            'sizes_name' => 'required|unique:sizes'

        ],[
            'sizes_name.required' => "Tên Kích Cỡ Bắt Buộc Nhập Buộc Nhập",
            'sizes_name.unique' => "Tên Kích Cỡ Đã Tồn Tại"
        ]);
       
        $model = $size->update($request->all());
        if($model){
            return redirect()->back()->with('success','Sửa  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Sửa  Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        if($size->delete()){     
            return redirect()->route('size.index')->with('success',"Xóa  Thành Công");
         }else{
         return redirect()->route('size.index')->with('error',"Xóa Không Thành Công");
        } 
    }
}
