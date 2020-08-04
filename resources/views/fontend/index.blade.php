@extends('master_template.index')
@section('content')
<style>
	body{
		position: relative;
	}
	.img-fly{
		position: absolute;
		z-index: 999999;
		width: 50px;
		height: 50px;
		object-fit: cover;
		border-radius: 100%;
		border:2px solid red;
		transition:all 1s ease;
		animation:  Myanimation 2s;
	}

@keyframes Myanimation{
	0%{transform:scale(0.4)}
	25%{transform:scale(1)}
	75%{transform:scale(1)}
	100%{transform:scale(0.4)}
}
</style>
<!-- Hero section -->
		<section class="hero-section">
			<div class="hero-slider owl-carousel">
				@foreach($slider as $slide)
				<div class="hs-item set-bg" data-setbg="{{url('uploads')}}/{{$slide->slider_image}}">
					<div class="container">
						<div class="row">
							<div class="col-xl-6 col-lg-7 text-white">
								<span>Better</span>
								<h2>{{$slide->slider_title}}</h2>
								<p>{!!$slide->slider_description!!}</p>
								<a href="#" class="site-btn sb-line">SHOP NOW</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="container">
				<div class="slide-num-holder" id="snh-1"></div>
			</div>
		</section>
		<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public')}}/template/images/icons/3.png" alt="#">
						</div>
						<h2>Palettes</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public')}}/template/images/icons/2.png" alt="#">
						</div>
						<h2>EYES</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public')}}/template/images/icons/3.png" alt="#">
						</div>
						<h2>Cheek & Coutour</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
				<img class="img-logic" src="{{url('public')}}/template/images/IQ logic.png" alt="">
			</div>
			
			<div class="product-slider owl-carousel">
				@if($products !== null)
				@foreach($products as $product)
				<div class="product-item">
					<div class="pi-pic">
						<a style="cursor: pointer;" href="{{route('fontend.product',['id'=>$product->id])}}"><img src="{{url('uploads')}}/{{$product->products_image}}" alt=""></a>
						<div class="pi-links">
							<a href="javascript:void(0)" data-cart="{{$product->id}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="" data-pro="{{$product->id}}" class="wishlist-btn wishlist"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<p style="color: #999595;">{{$product->products_name}}</p>
						<h6>{{number_format($product->price)}}$</h6>
						<a href="{{route('fontend.product')}}"><p>{!!$product->products_descripttion!!}</p></a>
					</div>
				</div>
			@endforeach
			@endif
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>NEW ARRIVALS</h2>
			<img class="img-logic" src="{{url('public')}}/template/images/IQ logic.png" alt="">
			</div>
			<ul class="nav nav-tabs product-filter-menu" style="border-bottom:none;" id="myTab" role="tablist">
				<li><a class="nav-link active" style="
    border-top-left-radius: 2.25rem;
    border-top-right-radius: 2.25rem;" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ALL</a></li>
    @foreach($producer as $produ)
				<li><a class="nav-link"  style="
    border-top-left-radius: 2.25rem;
    border-top-right-radius: 2.25rem;" id="profile-tab" data-toggle="tab" href="#palettes" role="tab" aria-controls="profile" aria-selected="false">{{$produ->producer_name}}</a></li>
	@endforeach
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row">
						@if($products_last !== null)
						@foreach($products_last as $pro_last)
						<div class="col-lg-3 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<a style="cursor: pointer;" href="{{route('fontend.product',['id'=>$pro_last->id])}}"><img src="{{url('uploads')}}/{{$pro_last->products_image}}" alt=""></a>
									<div class="pi-links">
										<a href="javascript:void(0)" data-cart="{{$pro_last->id}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#"  class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<p style="color: #999595;">{{$pro_last->products_name }}</p>
									<h6>{{number_format($pro_last->price)}}$</h6>
									<a href=""><p>{!!$pro_last->products_descripttion!!}</p></a>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>

					
			
		

				
				






			<div class="text-center pt-5">
				<a href="category.html">
					<button class="site-btn sb-line sb-dark">VIEW ALL</button>
				</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<!-- <div class="banner set-bg" data-setbg="{{url('public')}}/template/images/banner-bg.jpg"> -->
			@foreach($banner as $banners)
			<div class="banner set-bg" data-setbg="{{url('uploads')}}/{{$banners->banner_image}}">
				<div class="tag-new">NEW</div>
				<span>{{$banners->banner_title}}</span>
				<h2>OUR BRANDS</h2>
				<a href="category.html" class="site-btn">SHOP NOW</a>
			</div>
			@endforeach
		</div>
	</section>
	<!-- Banner section end  -->
@stop()

@section('script')
<script>
	
$(document).on('click','.add-card',function(e){
	e.preventDefault();
	// kết thúc công việc
	// if($(this).hasClass('disabled')){
	// 	return false;
	// }

	// gán 1 class disable;
	// $(this).addClass('disabled');
	var it = $(this);
		// dùng parents có s có thể gọi bất kì thẻ cha bao bọc nào
	var parent = $(this).parents('.product-item');
	// Lấy Vị trí Top của thằng parent;
	var parentTop = parent.offset().top;
	// Lấy Vị trí Left của thằng parent;
	var parentLeft = parent.offset().left;
	// tìm đến thẻ img để lấy thuộc tính src
	var src  = parent.find('img').attr('src');
	// tạo thẻ img chứa class
	var cart = $(document).find('#shop-cart');
	$('<img />',{
	    class: 'img-fly',
	    src:src
	}).appendTo('body').css({
	'top':parentTop,
	'left':parentLeft + parseInt(parent.width()) - 50
	});
     $(document).find('.img-fly').animate({
			'top':cart.offset().top,
	        'left':cart.offset().left
		},2000);
		setTimeout(function(){
			$(document).find('.img-fly').remove();
		},1000);
	// setInterval(function(){
	// 	$(document).find('.img-fly').css({
	// 		'top':cart.offset().top,
	//         'left':cart.offset().left
	// 	});
	// 	setTimeout(function(){
	// 		$(document).find('.img-fly').remove();
	// 		$(this).find('.add-card').removeClass('disable');
	// 	},1000);
	// },2000);
});

$(document).ready(function(){
	$('.wishlist').on('click',function(e){
		e.preventDefault();
		var id = $(this).data('pro');
		$.ajax({
			type:'GET',
			url:"whistlist/whistlist_add/"+id,
			success:function(res){
				console.log(res);
			}
		});
	});
})
</script>
@endsection