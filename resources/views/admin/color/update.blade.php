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
	<form action="{{ route('color.update',['color'=>$colors->colors_id]) }}" method="POST" role="form">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-lg-7 @error('colors_name') has-error  @enderror">
    	<label class="label label-default px">Sửa Màu:</label>
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
      <input type="color" class="form-control" name="colors_name" value="{{$colors->colors_name}}"  placeholder="Nhập Tên Màu">
      @error('categories_name')
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