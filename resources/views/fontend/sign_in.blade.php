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
				<form action="" method="POST" accept-charset="utf-8"role="form" id="loginform">
					@csrf
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">
							<img src="{{url('public')}}/template/images/eliah-black.png" alt="" style="width: 111px;">
						</h3>
						<span class="auth-form__switch-btn"><a href="{{route('fontend.register')}}" title="">Regiser</a></span>
					</div>
					<div class="auth-form__form">
						<div class="auth-form_group">
							<input type="text" class="auth-form__input" placeholder="Enter email" name="email">
						</div>
						<div class="auth-form_group">
							<input type="password" class="auth-form__input" placeholder="Enter password" name="password">
						</div>						
					</div>
					<div class="auth-form__aside">
						<div class="auth-form__help">
							<a href="" class="auth-form_help-link auth-form_help-forgot">Forgot password</a>
							<span class="auth-form__help-separate"></span>
							<a href="" class="auth-form_help-link">Need help?</a>
						</div>
					</div>
					<div class="auth-form__aside">
					<div class="checkbox icheck">
		            <label>
		              <input class="checkbox" name="rmb" value="1" type="checkbox"> <span class="span">Remember Me</span>
		            </label>
		          </div>
		          	</div>
					<div class="auth-form__controls">
						<a href="{{route('fontend.index')}}" class="btn btn--normal auth-form__controls-back">BACK</a>
						<button type="submit" class="btn btn--primary">LOG IN</button>
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