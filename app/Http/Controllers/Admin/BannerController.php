<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner =   Banner::orderBy('banner_id','DESC')->paginate(5);
        return view('admin.banner.index',compact('banner'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.banner.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = trim($request->banner_image,url('/uploads'));
        $request->validate([    
            'banner_name' => 'required|unique:banner'

        ],[
            'banner_name.required' => "Tên Banner Bắt Buộc Nhập",
            'banner_name.unique' => "Banner Đã Tồn Tại"
        ]);
       
        $model = Banner::create([
            'banner_name'=> $request->banner_name,
            'banner_image'=>$image,
            'banner_link'=>$request->banner_link,
            'banner_title'=>$request->banner_title,
            'banner_description'=>$request->banner_description,
            'banner_status'=>$request->banner_status
        ]);
        if($model){
            return redirect()->back()->with('success','Thêm  Banner  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Banner Thất Bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    public function search(Request $request)
    {
    $search = $request->get('search');
    $banner  = Banner::where('banner_name','like','%'. $search . '%')->orWhere('banner_id','like','%'.  $search . '%')->paginate(5);
    return view('admin.banner.index',compact('banner'));

    }

    public function modal(Request $request){
    $id = $request->id;
    $banner = Banner::where('banner_id',$id)->first();
    return view('admin.banner.modal',compact('banner'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
    $banners = Banner::all();
    return view("admin.banner.update",['banners'=>$banner,'banner'=>$banners]);
    }

    public function status(Request $request){
    $banner = Banner::find($request->id);
    if($banner){
    $banner->banner_status = $request->status;
    }
   
    $banner->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $image = trim($request->banner_image,url('/uploads'));
        $request->validate([    
            'banner_name' => 'required|unique:banner'

        ],[
            'banner_name.required' => "Tên Banner Bắt Buộc Nhập",
            'banner_name.unique' => "Banner Đã Tồn Tại"
        ]);
       
        $model = $banner->update([
            'banner_name'=> $request->banner_name,
            'banner_image'=>$image,
            'banner_link'=>$request->banner_link,
            'banner_title'=>$request->banner_title,
            'banner_description'=>$request->banner_description,
            'banner_status'=>$request->banner_status
        ]);
        if($model){
            return redirect()->back()->with('success','Sửa Banner  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Sửa Banner Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
       if($banner->delete()){     
            return redirect()->route('banner.index')->with('success',"Xóa Banner Thành Công");
       }else{
         return redirect()->route('banner.index')->with('error',"Xóa Banner Không Thành Công");
       } 
    }
    
}
