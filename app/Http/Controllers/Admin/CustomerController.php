<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customer = Customer::orderBy('id','DESC')->paginate(5);
        return view('admin.customer.index',compact("customer"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(){
    $search = request()->get('search');
    $customer  = Customer::where('name','like','%'. $search . '%')->orWhere('id','like','%'.  $search . '%')->paginate(5);
    return view('admin.customer.index',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
    $customers = Customer::all();
    return view("admin.customer.update",['customers'=>$customer,'customer'=> $customers]);
    }

     public function modal(Request $request){
      $id = $request->id;
      $customer = Customer::where('id',$id)->first();
      return view('admin.customer.modal',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([    
            'name' => 'required|unique:customers',
            'email' => 'required|unique:customers,email',
            'phone'=> 'required',
            'address' => 'required'

        ],[
            'name.required' => "Tên Khách Hàng Phải Sửa",
            'name.unique' => "Tên Khách Hàng Đã Tồn Tại"
        ]);
       
        $model = $customer->update($request->all());
        if($model){
            return redirect()->back()->with('success','Sửa  Khách Hàng Thành Công');
        }
        else {
            return redirect()->back()->with('error','Sửa Khách Hàng Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
         if( $customer && $customer->orders->count() == 0){
            $customer->delete(); 
            return redirect()->route('customer.index')->with('success',"Xóa Khách Hàng Thành Công");
       }else{
         return redirect()->route('customer.index')->with('error',"Xóa Khách Hàng Không Thành Công Vì  Đang Có Đơn Hàng");
       } 
    }
}
