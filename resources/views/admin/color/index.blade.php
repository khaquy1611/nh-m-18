@extends('master.index')
@section('main')
<script>

  
  
</script>
<form action="{{route('color.search')}}" method="GET" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" name="color_search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nhập Tìm Kiếm">



  <button type="submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg mb-2">Tìm Kiếm</button>
  <a href="{{route('color.create')}}" class="btn btn-sm btn-success">Thêm Mới</a>
</form>


<!-- Danh sách Danh Mục -->
<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
	<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
	  <caption>Danh sách Danh Mục</caption>

	  <thead class="thead-dark|thead-light">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Tên Màu</th>
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
	  	@foreach($colors as $color)
	    <tr>
	      <td>{{$color->colors_id}}</td>
	      <td>
         <div style="width:50px;height:50px;background-color:{{$color->colors_name}};"></div> 
        </td>
	      <td>{{$color->created_at}}</td>
	      <td>
	      	 
	      	 	<a  href="{{ route('color.edit',['color'=>$color->colors_id])}}" class="btn btn-xs btn-primary">Sửa</a>
	      		<button class="btn btn-xs btn-danger btn-destroy-color"  type="button" url="{{route('color.destroy',$color->colors_id)}}">Xóa</button>

	      
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{$colors->links()}}
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

   
// xóa bằng ajax
    $('.btn-destroy-color').click(function(){
    var url = $(this).attr('url');
    var that = $(this);
    Swal.fire({
    title: 'Bạn Có Muốn Xóa Không?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText:"Hủy",
    confirmButtonText: 'Có, Hãy Xóa Nó!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"POST", 
          url:url,
          data:{_method:'DELETE',_token:'<?php echo csrf_token();?>'},
          success:function(res){
           if(res.success){
          Swal.fire(
          'Đã Được Xóa!',
          'Bản Ghi Đã Được Xóa.',
          'success'
        )
           that.parent().parent().remove();
           }else{
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: 'Sai Không Xóa Được!',
          footer: '<a href>Why do I have this issue?</a>'
        })
           }
          }
        });
        
      }
    });
  });
  })
</script>
@stop()