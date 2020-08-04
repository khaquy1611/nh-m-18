<?php

namespace App\Http\Controllers\Fontend;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Producer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class FontendController extends Controller
{
  public function index(){

    $products_last = Product::Where('ordering',0)->get();
    $producer = Producer::Where('producer_status',1)->get();
    $products = Product::Where('ordering',1)->get();
    $banner = Banner::Where('banner_status',1)->get();
    $slider = Slider::Where('slider_status',1)->get();
	  return view('fontend.index',compact('slider','banner','products','producer','products_last'));
  }


  public function product($id){
    $pro = Product::find($id);
  	return view('fontend.product',compact('pro'));
  }

  public function category(){
  $color = Color::orderBy('colors_name','ASC')->get();
  $sizes = Size::orderBy('sizes_name','ASC')->get();
  $category_parent = Category::where('parent_id',0)->Where('categories_status',1)->orderBy('categories_name','ASC')->get();
  $producer = Producer::Where('producer_status',1)->orderBy('producer_name','ASC')->get();
  $top_product = Product::limit(6)->orderBy('id','DESC')->get();
  $sale_product = Product::Where('sale_price','>',0)->Where('products_status',1)->limit(6)->orderBy('id','DESC')->get();
  	return view('fontend.category',compact('category_parent','top_product','sale_product','producer','sizes','color'));
  }

public function slug($slug){
  $color = Color::orderBy('colors_name','ASC')->get();
  $sizes = Size::orderBy('sizes_name','ASC')->get();
  $category_parent = Category::where('parent_id',0)->Where('categories_status',1)->orderBy('categories_name','ASC')->get();
  $producer = Producer::Where('producer_status',1)->orderBy('producer_name','ASC')->get();
  $model = Category::where('slug',$slug)->first();
  return view('fontend.categories',compact('model','color','sizes','category_parent','producer'));
}


  public function contact(){
  	return view('fontend.contact');
  }
  public function contact_post(Request $req){
      Mail::send('email.email',[
        'name'=>$req->name,
        'content'=>$req->content,
      ],function($mail) use($req) {
          $mail->to('Khaquy12a2@gmail.com',$req->name);
          $mail->from($req->email);
          $mail->subject($req->subject);
      });
  }
 
public function search(Request $request){
    $products_last =  Product::where('products_name','like','%'.$request->search.'%')->orWhere('price',$request->search)->get();
    $producer = Producer::Where('producer_status',1)->get();
    $banner = Banner::Where('banner_status',1)->get();
    $slider = Slider::Where('slider_status',1)->get();
      $products = Product::where('products_name','like','%'.$request->search.'%')->orWhere('price',$request->search)->get();
  return view('fontend.index',compact('products','products_last','producer','banner','slider'));
   }

 
}
