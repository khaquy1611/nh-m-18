@extends('master.index')
@section('main')

<form action="" method="GET" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" name="producer_search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nhập Tìm Kiếm">



  <button type="submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg mb-2">Tìm Kiếm</button>
  <a href="{{route('size.create')}}" class="btn btn-sm btn-success">Thêm Mới</a>
</form>


<!-- Danh sách Danh Mục -->
<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
	<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
	  <caption>Danh sách Danh Mục</caption>

	  <thead class="thead-dark|thead-light">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Tên Kích Thước</th>
	       <th scope="col">Ngày Tạo</th>
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
	  	@foreach($sizes as $size)
	    <tr>
	      <td>{{$size->sizes_id}}</td>
	      <td>{{$size->sizes_name}}</td>
	      <td>{{$size->created_at}}</td>
	      <td>
	      	 
	      	<form action="{{ route('size.destroy',['size'=>$size->sizes_id]) }}" method="POST">
	      	 	<a  href="{{ route('size.edit',['size'=>$size->sizes_id]) }}" class="btn btn-xs btn-primary">Sửa</a> 	
	      		@csrf 
	      		@method('DELETE')
      		 	<input name="_method" type="hidden" value="DELETE">
	      		<button class="btn btn-xs btn-danger" type="submit">Xóa</button>
	      		
	      	</form>

	      
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{$sizes->links()}}
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
         url: "{{route('producer.modal')}}",
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