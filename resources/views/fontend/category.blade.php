@extends('master_template.index')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>CAtegory PAge</h4>
		<div class="site-pagination">
			<a href="">Home</a> /
			<a href="">Shop</a> /
		</div>
	</div>
</div>
<!-- Page info end -->


<!-- Category section -->
<section class="category-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 order-2 order-lg-1">
				<div class="filter-widget">
					<h2 class="fw-title">Categories</h2>
					<ul class="category-menu">
						@foreach($category_parent as $cat)
						<li>
						<a href="{{route('category',['slug'=>$cat->slug])}}">{{$cat->categories_name}}</a>
							<ul class="sub-menu">
						@if($cat->childs)
						@foreach($cat->childs as $cat_child)
								<li><a href="{{route('category',['slug'=>$cat_child->slug])}}">{{$cat_child->categories_name}}<span>{{$cat_child->products->count()}}</span></a></li>
						@endforeach
						@endif
							</ul>
						</li>
					@endforeach
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<h4>Price</h4>
							<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
								<div class="price-input">
									<input type="text" id="minamount">
									<input type="text" id="maxamount">
								</div>
							</div>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">color by</h2>
						<div class="fw-color-choose">
						@foreach($color as $col)
							<div class="cs-item">
								<input type="radio" name="cs" id="{{$col->colors_id}}">
								<label class="cs-gray" style="background-color:{{$col->colors_name}}"  for="{{$col->colors_id}}">
									<span>(3)</span>
								</label>
							</div>
						@endforeach
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Size</h2>
						<div class="fw-size-choose">
						@foreach($sizes as $size)
							<div class="sc-item">
								<input type="radio" name="sc" id="{{$size->sizes_id}}">
								<label for="{{$size->sizes_id}}">{{$size->sizes_name}}</label>
							</div>
						@endforeach
						</div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Brand</h2>
						<ul class="category-menu">
						@foreach($producer as $produ)
							<li><a href="#">Palettes<span>{{$produ->products->count()}}</span></a></li>
						@endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2>New Product:</h2>
				</div>
					<div class="row">
						@foreach($top_product as $product)
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-sale">ON SALE</div>
									<a href="{{route('fontend.product',['id'=>$product->id])}}"><img src="{{url('uploads')}}/{{$product->products_image}}" alt=""></a>
									<div class="pi-links">
										<a href="javascript:void(0)" data-cart="{{$product->id}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									@if($product->sale_price > 0)
									<s>Old Price: {{number_format($product->price)}}$</s>
									 <h6>New Price: {{number_format($product->sale_price)}}$</h6>
									<p>{{$product->products_name}}</p>
								   
									@else
									<h6>Price: {{number_format($product->price)}}$</h6>
									@endif
								</div>
							</div>
						</div>
						@endforeach
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2>Sale Product:</h2>
					</div>
						@foreach($sale_product as $sale_product)
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-sale">ON SALE</div>
									<a href="{{route('fontend.product',['id'=>$product->id])}}"><img src="{{url('uploads')}}/{{$sale_product->products_image}}" alt=""></a>
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									@if($product->sale_price > 0)
									<s>Old Price: {{number_format($product->price)}}$</s>
									 <h6>New Price: {{number_format($product->sale_price)}}$</h6>
									<p>{{$product->products_name}}</p>
								   
									@else
									<h6>Price: {{number_format($product->price)}}$</h6>
									@endif
								</div>
							</div>
						</div>
						@endforeach
						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">NEXT PAGE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
	@stop()
