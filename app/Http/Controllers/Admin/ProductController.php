<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use App\Models\Images;
use App\Models\Producer;
use App\Models\Product_detail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::orderBy('id','DESC')->paginate(5);
        return view('admin.product.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = Color::all();
        $size = Size::all();
        $category_parent = Category::where('parent_id',0)->get();
        $producer = Producer::all();
        return view('admin.product.creat',compact("category_parent","producer",'color','size'));
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
            'products_name'=>'required|unique:products',
            'price'=>'required|numeric|min:0|not_in:0',
            'sale_price'=>'required|numeric|min:0|lt:price',

        ],[
            'products_name.required'=>"Tên Sản Phẩm Không Được Để Trống",
            'products_name.unique' => "Tên Sản Phẩm Đã Tồn Tại",
            'price.required' => "Gía Không Được Để Trống",
            'price.numeric' => "Gía Phải Là Kiểu Số",
            'price.not_in'=>"Gía Phải Lớn Hơn 0",
            'price.min'=>"Gía Phải Lớn Hơn 0",
            'sale_price.required'=>"Gía Khuyến Mãi Không Được Để Trống",
            'sale_price.numeric'=>"Gía Khuyến Mãi Phải Là Kiểu Số",
            'sale_price.min'=>"Gía Khuyến  Mãi Phải Lớn Hơn 0",
            'sale_price.lt'=>"Gía Khuyến Mãi Phải Nhỏ Hơn Gía Gốc"
        ]);
        $image = str_replace(url('/uploads/'),'',$request->image);
        $image_list = $request->image_list != null ? json_decode($request->image_list, true) : null;
        $image_arr = [];
        $imgList="";
        // dd($image_list);
        $i=0;
        foreach ($image_list as $value) {
            $ten_anh = explode('/uploads/', $value);
            $i++;
            if($i==1){
                $imgList .= $ten_anh[1];
             // $image_arr[$value->id] =  $image_list;
            }else{
                $imgList .= ','. $ten_anh[1];
            }
        }

     $model_products = Product::create([
            'products_name' => $request->products_name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brand' => $request->brand,
            'ordering' => $request->ordering,
            'products_image' => $image,
            'products_descripttion' => $request->products_descripttion,
            'products_status' => $request->products_status,
            'cat_id' => $request->parent_id,
            'produ_id' => $request->producer
        ]);

     $idPro = $model_products->id;
     $color = $request->color;
     $colorItem = "";
     $i = 0;
     if($color != null){
     foreach($color as $key => $value){
        $i++;
        if($i==1){
        $colorItem .="$value"; 
        }else{
        $colorItem .=",$value"; 
        }
     }
}
     $size = $request->size;
     $valueSize = "";
     $i = 0;
     if($size != null){
         foreach($size as $key => $value){
        $i++;
        if($i==1){
        $valueSize .="$value"; 
        }else{
        $valueSize .=",$value"; 
        }
     }

   
    $Images = Images::create([
        'image_name'=> $imgList
    ]);
    $id_img = $Images->image_id;
     $pro_detail = Product_detail::create([
            'product_id'=>$idPro,
            'color_id'=> $colorItem ? $colorItem : null,
            'size_id'=> $valueSize ? $valueSize : null,
            'image_id'=>$id_img ? $id_img : null
     ]);
        
  



        if($model_products){
            return redirect()->back()->with('success','Thêm Mới Sản Phẩm Thành Công');
        }
        else {
            return redirect()->back()->with('error','Thêm Mới Sản Phẩm Thất Bại');
        }
       
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function search(Request $request)
    {
    $search = $request->get('pro_search');
    $products = Product::where('products_name','like','%'. $search . '%')->orWhere('id','like','%'. $search . '%')->paginate(5);
    return view('admin.product.index',compact('products'));

    }

    public function modal(Request $request){
    $id = $request->id;
    $product = Product::where('id',$id)->first();
    return view('admin.product.modal',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    $category_parents = Category::where('parent_id',0)->get();
    $producer = Producer::all();
    $products = Product::all();
    $color = Color::all();
    $size = Size::all();
    return view("admin.product.update",['products'=>$product,'product'=>$products,'category_parents'=>$category_parents,'producer'=>$producer,'color'=>$color,'size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
            $request->validate([
            'products_name'=>'required|unique:products',
            'price'=>'required|numeric|min:0|not_in:0',
            'sale_price'=>'required|numeric|min:0|lt:price',

        ],[
            'products_name.required'=>"Tên Sản Phẩm Không Được Để Trống",
            'products_name.unique' => "Tên Sản Phẩm Đã Tồn Tại",
            'price.required' => "Gía Không Được Để Trống",
            'price.numeric' => "Gía Phải Là Kiểu Số",
            'price.not_in'=>"Gía Phải Lớn Hơn 0",
            'price.min'=>"Gía Phải Lớn Hơn 0",
            'sale_price.required'=>"Gía Khuyến Mãi Không Được Để Trống",
            'sale_price.numeric'=>"Gía Khuyến Mãi Phải Là Kiểu Số",
            'sale_price.min'=>"Gía Khuyến Mãi Phải Lớn Hơn 0",
            'sale_price.lt'=>"Gía Khuyến Mãi Phải Nhỏ Hơn Gía Gốc"
        ]);
        $model_products = $product->update($request->all());
        if($model_products){
            return redirect()->route('product.index')->with('success','Sửa  Thành Công');
        }else{
            return redirect()->route('product.index')->with('error','Sửa Không Thành Công');
        }
    }

    public function status(Request $request){
    $product = Product::find($request->id);
    if($product == true && $product != null){
    $product->products_status = $request->status;
    }

    $product->save();
    return response()->json(['success'=>'Thay Đổi Trạng Thái Thành Công','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      
    if($product && $product->product_detail->count() == 0){
            $product->delete();   
            return redirect()->route('product.index')->with('success',"Xóa Sản Phẩm Thành Công");
       }else{
         return redirect()->route('product.index')->with('error',"Xóa Sản Phẩm Không Thành Công Vì Đang Có Chi Tiết Sản Phẩm");
       } 
    }
}
