<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
Use Alert;
use Illuminate\Http\Request;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cate = Category::orderBy('categories_id','DESC')->paginate(5);
        return view('admin.category.index',compact("cate"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_parent = Category::where('parent_id',0)->get();
        return view('admin.category.creat',compact("category_parent"));
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
            'categories_name' => 'required|unique:categories'

        ],[
            'categories_name.required' => "Tên Danh Mục Bắt Buộc Nhập",
            'categories_name.unique' => "Danh Mục Đã Tồn Tại"
        ]);
        $request->merge(['slug' => Str::slug($request->categories_name)]);
        
        $model = Category::create([
            'categories_name'=> $request->categories_name,
            'parent_id'=>$request->parent_id,
            'categories_status'=>$request->categories_status,
            'slug'=>Str::slug($request->categories_name)
        ]);
        if($model){
            return redirect()->back()->with('success',"Thêm Danh Mục Thành Công");
        }
        else {
            return redirect()->back()->with('error','Thêm Danh Mục Thất Bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       

    }

    public function status(Request $request){
    $cate = Category::find($request->id);
    if($cate){
    $cate->categories_status = $request->status;
    }
   
    $cate->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function search(Request $request)
    {
       $search = $request->get('search');
        $cate  = Category::where('categories_name','like','%'. $search . '%')->orWhere('categories_id','like','%'.  $search . '%')->paginate(5);
            return view('admin.category.index',compact('cate'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function modal(Request $request){
      $id = $request->id;
      $cates = Category::where('categories_id',$id)->first();
      return view('admin.category.modal',compact('cates'));
    }

    public function edit(Category $category)
    {
    $cate = Category::all();
    $category_parent = Category::where('parent_id',0)->get();
    return view("admin.category.update",['cate'=>$category,'category'=>$cate,'category_parent'=>$category_parent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $request->validate([    
            'categories_name' => 'required|unique:categories'

        ],[
            'categories_name.required' => "Tên Danh Mục Bắt Buộc Nhập",
            'categories_name.unique' => "Danh Mục Đã Tồn Tại"
        ]);
        $request->merge(['slug' => Str::slug($request->categories_name)]);

      $updated =  $category->update($request->all());

        if($updated){
            return redirect()->route('category.index')->with('success','Sửa Danh Mục Thành Công');
        }
        else {
            return redirect()->route('category.index')->with('error','Sửa Danh Mục Không Thành Công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    $model = Category::find($id);
       if($model && $model->products->count() == 0){
      $model->delete();
       return response()->json(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$id]);
       }else{
        return response()->json(['success'=>"Product Deleted Error.", 'tr'=>'tr_'.$id]);
       }
    }

  
}
