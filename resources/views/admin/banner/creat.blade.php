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
	<form action="{{route('banner.store')}}" method="POST" role="form">
    @csrf
  <div class="form-row">
    <div class="form-group col-lg-7 @error('banner_name') has-error  @enderror">
    	<label class="label label-default px">Tên Banner:</label>
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
      <input type="text" class="form-control" name="banner_name" value=""  placeholder="Nhập Tên Banner">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
<!-- Ảnh banner -->
      <div class="form-group col-lg-7 @error('banner_image') has-error  @enderror">
      <label class="label label-default px">Ảnh Banner:</label>
<a class="btn btn-primary" data-toggle="modal" href='#modal-file'><i class="glyphicon glyphicon-picture"></i></a>
     <input type="text" name="banner_image" id="image">
      @error('products_image')
      <small class="help-block">{{$message}}</small>
      @enderror
        <div class="form-group">
        <img src="" style="height: 100px;width: 100px;" id="img" alt="">
      </div>
    </div>

   <!-- modal -->
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

   <div class="form-group col-lg-7 @error('banner_link') has-error  @enderror">
      <label class="label label-default px">Links:</label>
      <input type="text" class="form-control" name="banner_link" value=""  placeholder="Nhập Links Banner">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
     <div class="form-group col-lg-7 @error('banner_title') has-error  @enderror">
      <label class="label label-default px">Tiêu Đề:</label>
      <input type="text" class="form-control" name="banner_title" value=""  placeholder="Nhập Tiêu Đề">
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>

     <div class="form-group col-lg-7 @error('banner_description') has-error  @enderror">
      <label class="label label-default px">Mô Tả:</label>
      <textarea name="banner_description" id="content" class="form-control"></textarea>
      @error('categories_name')
      <small class="help-block">{{$message}}</small>
      @enderror
    </div>
	  <div class="form-group col-lg-6 status">
  <span class="label label-default">Trạng Thái Danh Mục:</span>
  <div class="radio">
    <label>
      <input type="radio" name="banner_status"  value="1">
     Hiện
    </label>
     <label>
      <input type="radio" name="banner_status"  value="0">
    Ẩn
    </label>
  </div>
      <button type="submit" class="btn btn-primary ">Thêm Mới</button>
    </div>
   
</div>

</form>
</div>


@stop()