<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $slider =  Slider::orderBy('slider_id','DESC')->paginate(5);
    return view('admin.slider.index',compact('slider'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.slider.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*    dd($request->all());*/
        $image = trim($request->slider_image,url('/uploads'));
        $request->validate([    
            'slider_name' => 'required|unique:slider',
            'slider_link' => 'required'

        ],[
            'slider_name.required' => "Tên slider Bắt Buộc Nhập",
            'slider_link.required' => "Link slider Bắt Buộc Nhập",
            'slider_name.unique' => "Slider Đã Tồn Tại"
        ]);
       
        $model = Slider::create([
            'slider_name'=> $request->slider_name,
            'slider_image'=>$image,
            'slider_link'=>$request->slider_link,
            'slider_title'=>$request->slider_title,
            'slider_description'=>$request->slider_description,
            'slider_status'=>$request->slider_status
        ]);

        if($model){
            return redirect()->back()->with('success','Thêm  Slider  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Slider Thất Bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    public function search(Request $request)
    {
    $search = $request->get('search');
    $slider  = Slider::where('slider_name','like','%'. $search . '%')->orWhere('slider_id','like','%'.  $search . '%')->paginate(5);
    return view('admin.slider.index',compact('slider'));

    }

    public function modal(Request $request){
    $id = $request->id;
    $slider= Slider::where('slider_id',$id)->first();
    return view('admin.slider.modal',compact('slider'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
    $sliders = Slider::all();
    return view("admin.slider.update",['sliders'=>$slider,'slider'=>$sliders]);
    }

    public function status(Request $request){
    $slider = Slider::find($request->id);
    if($slider){
    $slider->slider_status = $request->status;
    }
   
    $slider->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $image = trim($request->slider_image,url('/uploads'));
        $request->validate([    
            'slider_name' => 'required|unique:slider',
            'slider_link' => 'required'

        ],[
            'slider_name.required' => "Tên slider Bắt Buộc Nhập",
            'slider_link.required' => "Link slider Bắt Buộc Nhập",
            'slider_name.unique' => "Slider Đã Tồn Tại"
        ]);
       
        $model = $slider->update([
            'slider_name'=> $request->slider_name,
            'slider_image'=>$image,
            'slider_link'=>$request->slider_link,
            'slider_title'=>$request->slider_title,
            'slider_description'=>$request->slider_description,
            'slider_status'=>$request->slider_status
        ]);
        if($model){
            return redirect()->back()->with('success','Sửa Slider Thành Công');
        }
        else {
            return redirect()->back()->with('error','Sửa Slider Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
       if($slider->delete()){     
            return redirect()->route('slider.index')->with('success',"Xóa Slider Thành Công");
       }else{
         return redirect()->route('slider.index')->with('error',"Xóa Slider Không Thành Công");
       } 
    }
}
