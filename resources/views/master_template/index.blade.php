
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Eliah</title>
	<meta charset="UTF-8">
	<meta name="description" content="Eliah">
	<meta name="keywords" content="Eliah">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{url('public')}}/template/images/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{url('public/template')}}/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/flaticon.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/slicknav.min.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/animate.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="{{url('public/template')}}/css/style.css"/>
	<link rel="stylesheet" href="{{url('public/template')}}/css/style2.css"/>


</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('fontend.index')}}" class="site-logo">
							<img class="logo-eliah-white" src="{{url('public')}}/template/images/eliah-black.png" alt=""></a>
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form method="POST" action="{{route('search')}}" class="header-search-form">
							@csrf
							<input name="search" type="text" placeholder="Search on eliah ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item" id="user">
								<i class="flaticon-profile"></i>
								@if(Auth::guard('cus')->check())
								<a id="log_out" href="{{route('fontend.logout')}}">Hi {{Auth::guard('cus')->user()->name}}</a>

								@else
								<a href="{{route('fontend.sign_in')}}">Sign</a> In or <a href="{{route('fontend.register')}}">Create Account</a>
								@endif
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<a href="{{route('cart.view')}}"><i class="flaticon-bag"></i></a>
									<div class="cart">
									<span>
										{{$cart->total_quantity}}
									  </span>
									  </div>
								</div>

								<a id="shop-cart" href="{{route('cart.view')}}">Shopping Cart</a>
									<div class="shopping-card">
									<a href="{{route('cart.view')}}"><i class="flaticon-heart"></i></a>
									<div class="cart">
									<span>
										{{$cart->total_quantity}}
									  </span>
									  </div>
								</div>
								<!-- No cart: header_cart-list--no-cart -->
								<div class="header_cart-list">
									<img src="{{url('public')}}/template/images/nono_cart.png" alt="" class="header_cart-no-cart-img">
									<span class="header_cart-list-no-cart-msg">
										No product
									</span>
	
									<h4 class="header_cart-heading"><img class="logo-eliah-white-two" src="{{url('public')}}/template/images/eliah-black.png" alt=""></a></h4>
									<ul class="header_cart-list-item">
										<!-- Cart item -->
										<li class="header_cart-item">
											<img src="{{url('public')}}/template/images/product9.png" alt="" class="header__cart-img">
											<div class="header_cart-item-info">
												<div class="header_cart-item-head">
													<h5 class="header_cart-item-name">Velvet Melon High</h5>
													<div class="header__cart-item-price-wrap">
														<span class="header_cart-item-price">$35,00</span>
														<span class="header_cart-item-multipy">x</span>
														<span class="header_cart-item-qnt">2</span>
													</div>
												</div>
	
												<div class="header_cart-item-body">
													<span class="header_cart-item-description">
														Trademark:Palettes
													</span>
													<span class="header_cart-item-remove">Delete</span>
												</div>
											</div>
										</li>
										<li class="header_cart-item">
											<img src="{{url('public')}}/template/images/product8.png" alt="" class="header__cart-img">
											<div class="header_cart-item-info">
												<div class="header_cart-item-head">
													<h5 class="header_cart-item-name">Velvet Melon High</h5>
													<div class="header__cart-item-price-wrap">
														<span class="header_cart-item-price">$35,00</span>
														<span class="header_cart-item-multipy">x</span>
														<span class="header_cart-item-qnt">2</span>
													</div>
												</div>
	
												<div class="header_cart-item-body">
													<span class="header_cart-item-description">
														Trademark:Face
													</span>
													<span class="header_cart-item-remove">Delete</span>
												</div>
											</div>
										</li>
									</ul>
									<a href="cart.html" class="header_cart-view-cart btn btn--primary">
									View cart</a href="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{route('fontend.index')}}">Home</a></li>
					<li><a href="{{route('fontend.category')}}">Category Page</a></li>
					<li><a href="{{route('cart.view')}}">Cart Page</a></li>
					<li><a href="#">Face
						<span class="new">New</span>
					</a></li>
					<li><a href="{{route('fontend.checkout')}}">Checkout Page</a></li>
					<li><a href="{{route('fontend.contact')}}">Contact Page</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

		@yield('content')

	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="{{route('fontend.index')}}"><img class="logo-eliah-white" src="{{url('public')}}/template/images/eliah-white.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="{{url('public')}}/template/images/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="{{url('public')}}/template/images/blog-thumbs:1.1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 5, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="{{url('public')}}/template/images/blog-thumbs:1.2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 5, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Beauty | Privacy Policy <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Site Map</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{url('public/template')}}/js/jquery-3.2.1.min.js"></script>
	<script src="{{url('public/template')}}/js/bootstrap.min.js"></script>
	<script src="{{url('public/template')}}/js/jquery.slicknav.min.js"></script>
	<script src="{{url('public/template')}}/js/owl.carousel.min.js"></script>
	<script src="{{url('public/template')}}/js/jquery.nicescroll.min.js"></script>
	<script src="{{url('public/template')}}/js/jquery.zoom.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{url('public/template')}}/js/jquery-ui.min.js"></script>
	<script src="{{url('public/template')}}/js/main.js"></script>
	<script>
		
		var user = document.getElementById('user');
		var log_out = document.getElementById('log_out');
		user.addEventListener('mouseover',function(){
			log_out.innerHTML = 'Log out';
		});
		user.addEventListener('mouseout',function(){
		log_out.innerHTML = 'Hi {{Auth::guard('cus')->user()->name}}';
		});


		$(document).ready(function(){
			$('.add-card').click(function(e){
				e.preventDefault();
				var data = $(this).data('cart');
				$.ajax({
					url:"cart/cart_add/"+data,
					type:'GET',
					success:function(res){
					toastr["success"]('Thêm Giỏ Hàng Thành Công');
						toastr.options = {
						  "positionClass": "toast-top-right",
						  "preventDuplicates": false,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "2000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						}

						$('.shopping-card > .cart').load('{{route("fontend.index")}} .shopping-card>.cart>span');
					}

				})
			})


		});
		
	</script>
	@yield('script')
	</body>
</html>
