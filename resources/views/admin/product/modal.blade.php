<div id="cat_modal_content">
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">ID Danh Mục{{$product->id}}</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span> 
     </button>
   </div>
   <div class="modal-body" id="post">
     <p>Tên Sản Phẩm: <strong>{{$product->products_name}}</strong></p>
     <p>Gía Sản Phẩm: <strong>{{$product->price}}</strong></p>
     <p>Gía Sale: <strong>{{$product->sale_price}}</strong></p>
     <p>Thương Hiệu: <strong>{{$product->brand}}</strong></p>
     <p>Thứ Tự: <strong>{{$product->ordering}}</strong></p>
     <p>Mô Tả Sản Phẩm: <strong>{!!$product->products_descripttion!!}</strong></p>
     <p>Ảnh Sản Phẩm: <strong>
      <img src="{{url('uploads')}}/{{$product->products_image}}" width="100px" alt=""></strong></p>
     <p>Trạng Thái: <strong>{{$product->products_status ? "Hiện" : "Ẩn"}}</strong></p>
     <p>Danh Mục Sản Phẩm: <strong>{{$product->cats->categories_name}}</strong></p>
     <p>Nhà Sản Xuất: <strong>{{$product->producer->producer_name}}</strong></p>
     <p>Ngày Tạo Sản Phẩm: <strong>{{$product->created_at}}</strong></p>
    <p>Ảnh Liên Quan:</p>


     <hr>
     <div class="row">
       @foreach($product->images as $img)
      <?php $array = explode(',',$img->image_name) ?>
       <div class="col-md-12">
      @if(is_array($array))
      @foreach($array  as $value)
       <div class="col-md-3">
         <img src="{{url('uploads')}}/{{$value}}"  alt="" class="img-responsive">
      </div>
      @endforeach
      @endif
       </div>
       @endforeach
     </div>
       <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
   </div>
 </div>
