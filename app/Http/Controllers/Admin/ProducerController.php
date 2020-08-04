<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $producer = Producer::orderBy('producer_id','DESC')->paginate(5);
        return view('admin.producer.index',compact("producer"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producer.creat');
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
            'producer_name' => 'required|unique:producer'

        ],[
            'producer_name.required' => "Tên Nhà Sản Xuất Bắt Buộc Nhập",
            'producer_name.unique' => "Nhà Sản Xuất Đã Tồn Tại"
        ]);
       
        $model = Producer::create([
            'producer_name'=> $request->producer_name,
            'producer_status'=>$request->producer_status,
        ]);
        if($model){
            return redirect()->back()->with('success','Thêm Tên  Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Tên Thất Bại');
        }
    }

     public function search(Request $request)
    {
       $search = $request->get('producer_search');
            $producer = Producer::where('producer_name','like','%'. $search . '%')->orWhere('producer_id','like','%'.  $search . '%')->paginate(5);
            return view('admin.producer.index',compact('producer'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {
        //
    }

    public function modal(Request $request){
    $id = $request->id;
    $producer = Producer::where('producer_id',$id)->first();
    return view('admin.producer.modal',compact('producer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Producer $producer)
    {
    $producers = Producer::all();
    return view("admin.producer.update",['producers'=>$producer,'producer'=>$producers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producer $producer)
    {
        $request->validate([    
            'producer_name' => 'required|unique:producer'

        ],[
            'producer_name.required' => "Tên Nhà Sản Xuất Bắt Buộc Nhập",
            'producer_name.unique' => "Nhà Sản Xuất Đã Tồn Tại"
        ]);
       

      $updated =  $producer->update($request->all());

        if($updated){
            return redirect()->route('producer.index')->with('success','Sửa  Thành Công');
        }
        else {
            return redirect()->route('producer.index')->with('error','Sửa Không Thành Công');
        }
    }

    public function status(Request $request){
    $producer = Producer::find($request->id);
    if($producer == true && $producer != null){
    $producer->producer_status = $request->status;
    }

    $producer->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producer $producer)
    {
          $delete = $producer->delete();
        if($delete){     
            return redirect()->route('producer.index')->with('success',"Xóa Thành Công");
       }else{
         return redirect()->route('producer.index ')->with('error',"Xóa  Không Thành Công");
       } 
    }
}
