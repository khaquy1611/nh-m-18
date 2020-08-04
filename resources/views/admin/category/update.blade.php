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
	<form action="{{ route('category.update',['category'=>$cate->categories_id]) }}" method="POST" role="form">
        @csrf
        @method('PUT')
  <div class="form-row">
    <div class="form-group col-lg-7 @error('categories_name') has-error  @enderror">
    	<label class="label label-default px">Tên Danh Mục:</label>
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
      <input type="text" class="form-control" name="categories_name" value="{{$cate->categories_name}}"  placeholder="Nhập Tên Danh Mục">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
     <div class="form-group col-lg-7">
    	<span class="label label-default">Chọn Danh Mục Cha:</span>
	<select name="parent_id"  id="input" class="form-control">
		<option value="0">Danh Mục Cha</option>
        @if($cate->parent_id == 0)
		    <option value="">Đây là danh mục cha</option>
        @else
            <option value="{{$cate->parent_id}}">{{$cate->where('categories_id',$cate->parent_id)->first()->categories_name}}</option>
        @endif
        
        @foreach($category_parent as $c)
        @if($c->categories_id != $cate->categories_id)
        <option value="{{$c->categories_id}}">{{$c->categories_name}}</option>
        @endif
        @endforeach

	</select>
</div>
	  <div class="form-group col-lg-6 status">

      <button type="submit" class="btn btn-primary ">Sửa</button>
    </div>
   
</div>

</form>
</div>


@stop()