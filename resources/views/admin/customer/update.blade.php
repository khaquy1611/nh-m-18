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
	<form action="{{ route('customer.update',['customer'=>$customers->id]) }}" method="POST" role="form">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-lg-7 @error('name') has-error  @enderror">
    	<label class="label label-default px">Tên Khách Hàng:</label>
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
      <input type="text" class="form-control" name="name" value="{{$customers->name}}"  placeholder="">
      @error('name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

        <div class="form-group col-lg-7 @error('email') has-error  @enderror">
      <label class="label label-default px">Email:</label>
      <input type="email" class="form-control" name="email" value="{{$customers->email}}"  placeholder="">
      @error('email')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

       <div class="form-group col-lg-7 @error('phone') has-error  @enderror">
      <label class="label label-default px">Số Điện Thoại:</label>
      <input type="phone" class="form-control" name="phone" value="{{$customers->phone}}"  placeholder="">
      @error('phone')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
        <div class="form-group col-lg-7 @error('address') has-error  @enderror">
      <label class="label label-default px">Địa Chỉ:</label>
      <input type="text" class="form-control" name="address" value="{{$customers->address}}"  placeholder="">
      @error('address')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

	  <div class="form-group col-lg-6 status">
 
 
      <button type="submit" class="btn btn-primary ">Sửa</button>
    </div>
   
</div>

</form>
</div>


@stop()