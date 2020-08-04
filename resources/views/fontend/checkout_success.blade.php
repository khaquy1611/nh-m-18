@extends('master_template.index')
@section('content')

<div class="jumbotron">
	<div class="container">
		<h1>Đặt Hàng Thành Công</h1>
		<p>Vui Lòng Kiểm Tra Email <b>{{Auth::guard('cus')->user()->email}}</b> </p> 
		</p>
	</div>
</div>

@stop()