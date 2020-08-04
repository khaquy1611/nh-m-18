<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $colors= Color::orderBy('colors_id','DESC')->paginate(5);
    return view('admin.color.index',compact("colors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.color.creat');
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
            'colors_name' => 'required|unique:colors'

        ],[
            'colors_name.required' => "Tên Màu Buộc Nhập",
            'colors_name.unique' => "Tên Màu Đã Tồn Tại"
        ]);
       
        $model = Color::create([
            'colors_name'=> $request->colors_name,
        ]);
        if($model){
            return redirect()->back()->with('success','Thêm Tên Màu Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Tên Màu Thất Bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }


    public function search(Request $request)
    {
    $search = $request->get('color_search');
    $colors = Color::where('colors_name','like','%'. $search . '%')->orWhere('colors_id','like','%'. $search . '%')->paginate(5);
    return view('admin.color.index',compact('colors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
    $colors = Color::all();
    return view("admin.color.update",['colors'=>$color,'color'=>$colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([    
            'colors_name' => 'required|unique:colors'

        ],[
            'colors_name.required' => "Tên Màu Buộc Nhập",
            'colors_name.unique' => "Tên Màu Đã Tồn Tại"
        ]);
       
        $model = $color->update($request->all());
        if($model){
            return redirect()->back()->with('success','Sửa  Tên Màu Thành Công');
        }
        else {
            return redirect()->back()->with('error','Sửa Tên Màu Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        if($color->delete()){     
            return response(['success'=>true]);
         }else{
            return response(['success'=>false]);
        } 

    }
}
