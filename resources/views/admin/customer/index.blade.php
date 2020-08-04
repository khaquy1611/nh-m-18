@extends('master.index')
@section('main')

<form action="{{route('customer.search')}}" method="GET" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nhập Tìm Kiếm">



  <button type="submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg mb-2">Tìm Kiếm</button>
</form>


<!-- Danh sách Danh Mục -->
<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
	<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
	  <caption>Danh sách Khách Hàng</caption>

	  <thead class="thead-dark|thead-light">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Tên Khách Hàng</th>
	      <th scope="col">Email</th>
	      <th scope="col">Số Điện Thoại</th>
	      <th scope="col">Địa Chỉ</th>
	       <th scope="col">Ngày Tạo</th>
	     
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
	  	@foreach($customer as $cus)
	    <tr>
	      <td>{{$cus->id}}</td>
	      <td>{{$cus->name}}</td>
	      <td>{{$cus->email}}</td>
	      <td>{{$cus->phone}}</td>
	      <td>{{$cus->address}}</td>
	      <td>{{$cus->created_at}}</td>
	      <td>
	      	 
	      	<form action="{{ route('customer.destroy',['customer'=>$cus->id]) }}" method="POST">
	      	 	<a  href="{{ route('customer.edit',['customer'=>$cus->id]) }}" class="btn btn-xs btn-primary">Sửa</a> 	
	      		@csrf 
	      		@method('DELETE')
      		 	<input name="_method" type="hidden" value="DELETE">
	      		<button class="btn btn-xs btn-danger" type="submit">Xóa</button>
	      		<a class="btn btn-xs btn-success detail-cat"  data-toggle="modal" data-id="{{$cus->id}}" >Xem</a>
	      	</form>

	      
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{$customer->links()}}
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
    $('.detail-cat').click(function(){  //bắt sự kiện click 
     var id = $(this).attr("data-id");
       // console.log(id); //lấy gía trị id data từ nút xem 
     var _token = "{{ csrf_token() }}"; // token để mã hóa dữ liệu
     
      $.ajax({
         type: "GET",
         url: "{{route('customer.modal')}}",
         data: {id: id},
         success: function(msg) {
         	$('.modal-content').html(msg);
            $('#exampleModal').modal('show');
           
         }
     });
  });
  });
    </script>
@stop()