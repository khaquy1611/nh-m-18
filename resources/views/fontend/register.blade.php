@extends('master_template.index')
@section('content')

<div class="modal">
	<div class="modal__overlay" style="background-image:url('{{url('public')}}/template/images/Banner.png')">

	</div>
	<div class="modal__body">
	
	@if($errors->all())
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
	@endif

		<!-- Login form -->
		<div class="auth-form" id="">
			<form action="" method="POST" accept-charset="utf-8"role="form" id="regform">
				@csrf
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">
							<img src="{{url('public')}}/template/images/eliah-black.png" alt="" style="width: 111px;">
						</h3>
						<span class="auth-form__switch-btn"><a href="{{route('fontend.sign_in')}}" title="">Log in</a></span>
					</div>
					<div class="auth-form__form">
						<div class="auth-form_group">
							<input type="text" class="auth-form__input" placeholder="Enter Your Name" name="name">
						</div>
						<div class="auth-form_group">
							<input type="email" class="auth-form__input" placeholder="Enter Your Email" name="email">
						</div>
						<div class="auth-form_group">
							<input type="text" class="auth-form__input" placeholder="Enter Your Phone" name="phone">
						</div>
						<div class="auth-form_group">
							<input type="text" class="auth-form__input" placeholder="Enter Your Address" name="address">
						</div>
						<div class="auth-form_group">
							<input type="password" class="auth-form__input" placeholder="Enter Your Password" name="password">
						</div>
						<div class="auth-form_group">
							<input type="password" class="auth-form__input" placeholder="confirm_password" name="customers_confirm_password">
						</div>						
					</div>
					<div class="auth-form__aside">
						<p class="auth-form__policy-text">
							By registering, you have agreed with Eliah Cosmetic
							<a href="" class="auth-form__text-link">Terms of service</a> &
							<a href="" class="auth-form__text-link">Privacy Policy</a>
						</p>
					</div>
					<div class="auth-form__controls">
						<a href="{{route('fontend.index')}}" class="btn btn--normal auth-form__controls-back">BACK</a>
						<button type="submit" class="btn btn--primary">REGISER</button>
					</div>
				</div>
				<div class="auth-form__socials">
					<a href="" class="auth-form__socials-google btn btn--size-s btn--with-icon">
						<i class="auth-form__socials-icon fab fa-google aria-hidden="true></i>
						<span class="auth-form__socials-title">
							Login with Google
						</span>
					</a>
					<a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
						<i class="auth-form__socials-icon fab fa-facebook" aria-hidden="true"></i>
						<span class="auth-form__socials-title">
							Login with Facebook
						</span>
					</a>
				</div>

			</form>
		</div>
	</div>
</div>

@stop()