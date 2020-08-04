	@extends('master_template.index')
	@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="product-th">Product</th>
										<th class="total-th">Quantity</th>
										<th class="update">Update</th>
										<th class="price">Price</th>
										<th class="remove">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php  $n  = 1; ?>
									@foreach($cart->items as  $item)

									<tr>
										<td class="product-col">
											<img src="{{url('uploads')}}/{{$item['products_image']}}" alt="">
											<div class="pc-title">
												<h4>{{$item['products_name']}}</h4>

											</div>
										</td>
										<td class="quy-col">
											<div class="quantity">
											<div class="pro-qty">
												<form action="{{route('cart.update',['id'=>$item['id']])}}" method="GET" accept-charset="uttf-8">
													<input type="text" name="quantity" value="{{$item['quantity']}}">
													<td>
														<button style="cursor: pointer;" type="submit">Update</button>
													</td>
													
												</form>	
											</div>
											</div>		
										</td>
	
										<td class="total-col"><h4>{{number_format($item['price'])}}$</h4></td>
										<td style="text-align: center;">
											<a class="btn btn-outline-danger btn-sm" href="{{route('cart.remove',['id'=>$item['id']])}}">
												<i class="fas fa-trash-alt"></i>
											</a>
										</td>
	
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="total-cost">
							<h6>Total <span>{{number_format($cart->total_price)}}$</span></h6>
						</div>
				
					</div>
				</div>
				<div class="col-lg-4 card-right">
				<form class="promo-code-form">
				<div class="text-center pt-5">   
				<a href="{{route('cart.clear')}}" class="site-btn btn-xs sb-line sb-dark">Clear All</a>
		        </div>	
					</form>
					<a href="{{route('fontend.checkout')}}" class="site-btn">Proceed to checkout</a>
					<a href="" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->
	

<!-- Clear all -->




<!-- End Clear all -->
	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-new">New</div>
							<img src="{{url('public')}}/template/images/product10.png" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Luxe jewell lipstick</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public')}}/template/images/product9.png" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Luxe jewell lipstick</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public')}}/template/images/product8.png" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>FBeigey Nude weight</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public')}}/template/images/product7.png" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Beigey Nude shoppong</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Related product section end -->

	
	@stop()