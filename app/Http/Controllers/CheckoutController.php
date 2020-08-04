<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Order_details;
use Auth;
use Mail;
class CheckoutController extends Controller
{
 
 // public function __construct(){
 //  $this->middleware('cus');
 // }
	public function form(){
		return view('fontend.checkout');
	}
 public function success(){
  return view('fontend.checkout_success');
 }
  public function submit_form(Request $req ,CartHelper $cart){
      $customer_id = Auth::guard('cus')->user()->id;
      $customer_email = Auth::guard('cus')->user()->email;
      $customer_name = Auth::guard('cus')->user()->name;
      $order = Orders::create([
        'customer_order_id'=>$customer_id,
        'order_status'=>$req->order_status,
        'customers_name'=>$req->customers_name,
        'customers_email'=>$req->customers_email,
        'customers_phone'=>$req->customers_phone,
        'customers_address'=>$req->customers_address,
        'order_note'=>$req->order_note
      ]);
      if($order){
        $orders_id = $order->id;
        foreach ($cart->items as $product_id => $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];
            Order_details::create([
              'order_id'=>$orders_id,
              'product_id'=>$product_id,
              'quantity'=>$quantity,
              'price'=>$price 
            ]);
        }
          Mail::send('email.order',[
          'customer_name'=>$customer_name,
          'order'=>$order,
          'items'=>$cart->items
        ],function($mail) use($customer_email,$customer_name) {
            $mail->to($customer_email,$customer_name);
            $mail->from('Khaquy12a2@gmail.com');
            $mail->subject("Email đặt hàng");
        });
         session(['cart'=>'']);
      return redirect()->route('checkout.success')->with('success',"Đặt Hàng Thành Công");
      }else{
         return redirect()->back()->with('error',"Đặt Hàng Thất Bại");
      }


  }
}
