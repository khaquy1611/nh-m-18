@extends('master.index')
@section('main')

<form action="{{route('product.search')}}" method="GET" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" name="pro_search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nhập Tìm Kiếm">



  <button type="submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg mb-2">Tìm Kiếm</button>
  <a href="{{route('product.create')}}" class="btn btn-sm btn-success">Thêm Mới</a>
</form>


<!-- Danh sách Danh Mục -->
<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
	<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
	  <caption>Danh sách Danh Mục</caption>

	  <thead class="thead-dark|thead-light">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Tên Sản Phẩm</th>
	      <th scope="col">Gía</th>
	      <th scope="col">Gía Khuyến Mãi</th>
	      <th scope="col">Thương Hiệu</th>
	      <th scope="col">Mô Tả</th>
	      <th scope="col">Thứ Tự</th>
	      <th scope="col">Ảnh</th>
	      <th scope="col">Trạng Thái</th>
	      <th scope="col">Ngày Tạo</th>
	      <th scope="col">Danh Mục</th>
	      <th scope="col">Hãng Sản Xuất</th>
	      <th scope="col">Hành Động</th>
	     
	    </tr>
	  </thead>
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
	  <tbody>
	  	@foreach($products as $product)
	    <tr>
	      <td>{{$product->id}}</td>
	      <td>{{$product->products_name}}</td>
	      <td>{{$product->price}}</td>
	      <td>{{$product->sale_price}}</td>
	      <td>{{$product->brand}}</td>
	      <td>{!!$product->products_descripttion!!}</td>
	      <td>{{$product->ordering}}</td>
	      <td>
	      	<img src="{{url('uploads')}}/{{$product->products_image}}" width="100px" alt="">
	      </td>
	      <td>
	      	
         <input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Hiện" data-off="Ẩn" {{$product->products_status ? "checked" : ''}}> 
        
	      </td>
	      <td>{{$product->created_at}}</td>
	      <td>{{$product->cats->categories_name}}</td>
	      <td>{{$product->producer->producer_name}}</td>
	      <td>
	      	 
	      	<form action="{{ route('product.destroy',$product->id) }}" method="POST">
	      	 	<a  href="{{ route('product.edit',['product'=>$product->id]) }}" class="btn btn-xs btn-primary">Sửa</a> 	
	      		@csrf 
	      		@method('DELETE')
	      		<button class="btn btn-xs btn-danger" type="submit">Xóa</button>
	      		<a class="btn btn-xs btn-success products_show"  data-toggle="modal" data-id="{{$product->id}}" >Xem</a>
	      	</form>

	      
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{$products->links()}}
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      </div>
    </div>
  </div>
</div>
@stop()

@section('script')
<script>
    $(document).ready(function(){
    $('.products_show').click(function(){ //bắt sự kiện click 
     var id = $(this).attr("data-id");
       // console.log(id); //lấy gía trị id data từ nút xem 
     var _token = "{{ csrf_token() }}"; // token để mã hóa dữ liệu
     
      $.ajax({
         type: "GET",
         url: "{{route('product.modal')}}",
         data:{id:id},
         dataType: 'html',
         success: function(msg) {
         	$('.modal-content').html(msg);
            $('#exampleModal').modal('show');
           
         }
     });
  });
  });

$(document).ready(function(){
  $('.toggle-class').change(function(){
    // lấy được trạng thái khi checkbox thay đổi;
    var status = $(this).prop('checked') == true ? 1 : 0;
    // console.log(status);
    var id = $(this).data('id');
  $.ajax({
    type:'GET',
    datatype:'json',
    url:"{{route('product.status')}}",
    data:{'status':status , 'id':id},
    success:function(data){
    if(data.success){
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: data.success,
    showConfirmButton: false,
    timer: 1500
       });
    }  

    }
  });
  });
  });
    </script>
@stop()