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
	<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
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
      <input type="text" class="form-control" name="categories_name" value=""  placeholder="Nhập Tên Danh Mục">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
     <div class="form-group col-lg-7">
    	<span class="label label-default">Chọn Danh Mục Cha:</span>
	<select name="parent_id"  id="input" class="form-control">
		<option value="0">Danh Mục Cha</option>
        @foreach($category_parent as $cat_parent)
		<option value="{{$cat_parent->categories_id}}">{{$cat_parent->categories_name}}</option>
        @if($cat_parent->childs)
        @foreach($cat_parent->childs as $cat_childs)   
        <option value="{{$cat_childs->categories_id}}">--{{$cat_childs->categories_name}}</option>
        @endforeach
        @endif
        @endforeach
	</select>
</div>
	  <div class="form-group col-lg-6 status">
    	<span class="label label-default">Trạng Thái Danh Mục:</span>
     <div class="radio">
     	<label>
     		<input type="radio" name="categories_status" id="input" value="1">
     		Hiện
     	</label>
     	<label>
     		<input type="radio" name="categories_status" id="input" value="0">
     		Ẩn

     	</label>

     </div>
      <button type="submit" class="btn btn-primary ">Thêm Mới</button>
    </div>
   
</div>

</form>
</div>


@stop()