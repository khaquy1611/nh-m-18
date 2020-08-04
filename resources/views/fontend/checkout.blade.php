@extends('master_template.index')
@section('content')
<!-- Page info -->
<style>
	.checkout-form input{
	width: 100%;
	height: 44px;
	border: none;
	padding: 0 18px;
	background: #f0f0f0;
	border-radius: 40px;
	margin-bottom: 20px;
	font-size: 14px;
}
</style>
<div class="page-top-info">
	<div class="container">
		<h4>Your cart</h4>
		<div class="site-pagination">
			<a href="">Home</a> 
			<a href="">Your cart</a>
		</div>
	</div>
</div>
<!-- Page info end -->


<!-- checkout section  -->
<section class="checkout-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-2 order-lg-1">
				<form class="checkout-form" method="POST" role="form">
					@csrf
					<div class="cf-title">Status</div>
					<div class="row">
						<div class="col-md-7">
							<p>Order Status</p>
						</div>
						<div class="col-md-5">
							<div class="cf-radio-btns address-rb">
								<div class="cfr-item">
									<input type="radio" value="1" name="order_status" id="one">
									<label for="one">Show</label>
								</div>
								<div class="cfr-item">
									<input type="radio" value="0" name="order_status" id="two">
									<label for="two">Hide</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row address-inputs">
						<div class="col-md-12">
							<input type="text" class="input" name="customers_name" placeholder="Name" value="{{Auth::guard('cus')->user()->name}}">
							<input type="email" name="customers_email" class="input" placeholder="Email" value="{{Auth::guard('cus')->user()->email}}">
							<input type="text" name="customers_phone" class="input" placeholder="Phone" value="{{Auth::guard('cus')->user()->phone}}">
							<input type="text" name="customers_address" class="input" placeholder="address" value="{{Auth::guard('cus')->user()->address}}">
								<input type="text" name="order_note" class="input" placeholder="order_note" value="">
						</div>
					</div>
					<div class="cf-title">Delievery Info</div>
					<div class="row shipping-btns">
						<div class="col-6">
							<h4>Standard</h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-1">
									<label for="ship-1">Free</label>
								</div>
							</div>
						</div>
						<div class="col-6">
							<h4>Next day delievery  </h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-2">
									<label for="ship-2">$3.45</label>
								</div>
							</div>
						</div>
					</div>
					<div class="cf-title">Payment</div>
					<ul class="payment-list ">
						<li>Paypal<a href="#"><img class="paypal-item" src="{{url('public')}}/template/images/paypal.png" alt=""></a></li>
						<li>Credit / Debit card<a href="#"><img class="paypal-item" src="{{url('public')}}/template/images/mastercart.png" alt=""></a></li>
						<li>Pay when you get the package</li>
					</ul>
					<button  type="submit" style="color:#fff"class="site-btn submit-order-btn">Place Order</button>
				</form>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<div class="checkout-cart">
					<h3>Your Cart</h3>
					<ul class="product-list">
						@if(session('cart') != null)
						<?php  $n  = 1; ?>
						@foreach($cart->items as  $item)
						<li>
							<div class="pl-thumb"><img src="{{url('uploads')}}/{{$item['products_image']}}" alt=""></div>
							<h6>{{$item['products_name']}}</h6>
							<p>{{number_format($item['price'])}}$</p>
						</li>
						@endforeach
						@endif
					</ul>
					<ul class="price-list">
						<li>Total<span>{{number_format($cart->total_price)}}$</span></li>
						<li>Shipping<span>free</span></li>
						<li class="total">Total<span>{{number_format($cart->total_price)}}$</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- checkout section end -->




@stop()