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
	<form action="{{ route('product.update',['product'=>$products->id]) }}" method="POST" role="form">
    @csrf
    @method('PUT')
  <div class="form-row">
    <div class="form-group col-lg-7 @error('products_name') has-error  @enderror">
    	<label class="label label-default px">Tên Sản Phẩm:</label>
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
      <input type="text" class="form-control" name="products_name" value="{{$products->products_name}}"  placeholder="Nhập Tên Sản Phẩm">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

     <div class="form-group col-lg-7 @error('price') has-error  @enderror">
      <label class="label label-default px">Gía Sản Phẩm:</label>
      <input type="text" class="form-control" name="price" value="{{$products->price}}"  placeholder="Nhập Gía Sản Phẩm">
      @error('price')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

      <div class="form-group col-lg-7 @error('sale_price') has-error  @enderror">
      <label class="label label-default px">Gía Khuyến Mãi:</label>
      <input type="text" class="form-control" name="sale_price" value="{{$products->sale_price}}"  placeholder="Nhập Gía Khuyến Mãi">
      @error('sale_price')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

        <div class="form-group col-lg-7 @error('brand') has-error  @enderror">
      <label class="label label-default px">Hãng:</label>
      <input type="text" class="form-control" name="brand" value="{{$products->brand}}"  placeholder="Nhập Hãng">
      @error('brand')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
      <div class="form-group col-lg-7 @error('ordering') has-error  @enderror">
      <label class="label label-default px">Thứ Tự:</label>
      <input type="text" class="form-control" name="ordering" value="{{$products->ordering}}"  placeholder="Nhập Thứ Tự">
      @error('ordering')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

      <div class="form-group col-lg-7 @error('products_image') has-error  @enderror">
      <label class="label label-default px">Ảnh Sản Phẩm:</label>
<a class="btn btn-primary" data-toggle="modal" href='#modal-file'><i class="glyphicon glyphicon-picture"></i></a>
<input type="text" name="image" id="image">
      @error('products_image')
      <small class="help-block">{{$message}}</small>
      @enderror
        <div class="form-group">
        <img src="{{url('uploads')}}/{{$products->products_image}}" style="height: 100px;width: 100px;" id="img" alt="">
      </div>
    </div>

          <div class="form-group col-lg-7 @error('products_image') has-error  @enderror">
      <label class="label label-default px">Ảnh Liên Quan:</label>
      <?php  $image_list = json_decode($products->image_list); ?>
<a class="btn btn-primary" data-toggle="modal" href='#modal-file-list'><i class="glyphicon glyphicon-picture"></i></a>
<input type="text" name="image_list" id="image_list">
      @error('products_image')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
        <div class="form-group col-lg-7">
          <div class="row" id="show">
                @if(is_array($image_list))
                <div class="row">
                  <hr>
                  @foreach($image_list as $img)
                    <div class=" col-md-4 ">
                      <img src="{{$img}}" alt="">
                    </div>
                @endforeach
                </div>
                @endif
          </div>
      </div>
      <div class="form-group col-lg-7 @error('products_descripttion') has-error  @enderror">
      <label class="label label-default px">Mô Tả Sản Phẩm:</label>
      <textarea id="content" name="products_descripttion" class="form-control" rows="3">{!!$products->products_descripttion!!}</textarea>
      @error('products_descripttion')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
    


    <div class="form-group col-lg-7">
    <span class="label label-default">Chọn Danh Mục Sản Phẩm:</span>
  <select name="parent_id"  id="input" class="form-control">
    <option value="0">Danh Mục Cha</option>
        @foreach($category_parents as $cat_parent)
               <?php  $selected = $cat_parent->categories_id ? "selected" : ""; ?>
    <option {{$selected}} value="{{$cat_parent->categories_id}}">{{$cat_parent->categories_name}}</option>
        @if($cat_parent->childs)
        @foreach($cat_parent->childs as $cat_childs)
        <option value="{{$cat_childs->categories_id}}">--{{$cat_childs->categories_name}}</option>
        @endforeach
        @endif
        @endforeach
  </select>
</div>

  <div class="form-group col-lg-7">
    <span class="label label-default">Thương Hiệu:</span>
  <select name="producer"  id="input" class="form-control">
    <option value="0">Thương Hiệu Sản Phẩm</option>
        @foreach($producer as $produ)
        <?php  $selected = $produ->producer_id ? "selected" : ""; ?>
    <option {{$selected}} value="{{$produ->producer_id}}">{{$produ->producer_name}}</option>
        @endforeach
  </select>
</div>
  <div class="form-group col-lg-7">
    <span class="label label-default">Màu:</span>
<div class="checkbox">
  @foreach($color as $co)
  <label>
    <input type="checkbox" value="{{$co->colors_id}}" name="color[]">
    <i class="glyphicon glyphicon-heart" style="color:{{$co->colors_name}};"></i>
  </label>
  @endforeach
</div>
</div>

 <div class="form-group col-lg-7">
    <span class="label label-default">Kích Cỡ:</span>
<div class="checkbox">

  @foreach($size as $siz)
  <label>
    <input type="checkbox" value="{{$siz->sizes_id}}" name="size[]">
 {{$siz->sizes_name}}
  </label>
  @endforeach
</div>
</div>
	  <div class="form-group col-lg-6 status">

      <button type="submit" class="btn btn-primary ">Sửa Sản Phẩm</button>
    </div>
  <!--  Modal Bs3 -->
  
   <div class="modal fade" id="modal-file">
     <div class="modal-dialog" style="width: 90%">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">Modal title</h4>
         </div>
         <div class="modal-body">
           <iframe src="{{url('filemanager')}}/dialog.php?field_id=image" width="100%" height="700px" frameborder="0"></iframe>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
    <!-- End  Modal Bs3 -->
    <!--  Modal Bs3 -->
  
   <div class="modal fade" id="modal-file-list">
     <div class="modal-dialog" style="width: 90%">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">Modal title</h4>
         </div>
         <div class="modal-body">
           <iframe src="{{url('filemanager')}}/dialog.php?field_id=image_list" width="100%" height="700px" frameborder="0"></iframe>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
    <!-- End  Modal Bs3 -->


</div>

</form>
</div>


@stop()