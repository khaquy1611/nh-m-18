@extends('master.index')
@section('main')
<style>
	.form-control{
		margin-top: 10px;
	}
	.label-default {
		font-family: 'Poppins','sans-serif';
		font-size: 12px;
	}
	.status{
		padding: 15px;
	}
</style>
<!-- Form Thêm Mới Sản Phẩm -->

<div class="container">
	<form action="{{route('user.store')}}" method="POST" role="form">
    @csrf
  <div class="form-row">
    <div class="form-group col-lg-7 @error('name') has-error  @enderror">
    	<label class="label label-default px">Tên Tài Khoản:</label>
        @if(Session::has('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thành công: </strong>  {{Session::get('success')}} <br>
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Lỗi: </strong>  {{Session::get('error')}} <br>
          </div>
          @endif 
      <input type="text" class="form-control" name="name" value=""  placeholder="Nhập Tên Tài Khoản">
      @error('name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
   <div class="form-group col-lg-7 @error('email') has-error  @enderror">
      <label class="label label-default px">Email:</label>
      <input type="email" class="form-control" name="email" value=""  placeholder="Nhập Email">
      @error('email')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
     <div class="form-group col-lg-7 @error('password') has-error  @enderror">
      <label class="label label-default px">Mật Khẩu:</label>
      <input type="password" class="form-control" name="password" value=""  placeholder="Nhập Mật Khẩu">
      @error('password')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
     <div class="form-group col-lg-7 @error('confirm_password') has-error  @enderror">
      <label class="label label-default px">Nhập Lại Mật Khẩu:</label>
      <input type="password" class="form-control" name="confirm_password" value=""  placeholder="Xác Nhận Mật Khẩu">
      @error('confirm_password')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
	  <div class="form-group col-lg-6 status">
    	<span class="label label-default">Trạng Thái Danh Mục:</span>
     <div class="radio">
     	<label>
     		<input type="radio" name="users_status" id="input" value="1">
     		Hiện
     	</label>
     	<label>
     		<input type="radio" name="users_status" id="input" value="0">
     		Ẩn

     	</label>

     </div>
      <button type="submit" class="btn btn-primary ">Thêm Mới</button>
    </div>
   
</div>

</form>
</div>


@stop()