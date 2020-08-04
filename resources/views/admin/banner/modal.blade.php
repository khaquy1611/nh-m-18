   <div id="cat_modal_content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">ID Banner {{$banner->banner_id}}</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body" id="post">
           <p>Tên Banner: <strong>{{$banner->banner_name}}</strong></p>
           <p>Link Banner: <strong>{{$banner->banner_link}}</strong></p>
           <p>Tiêu Đề: <strong>{{$banner->banner_title}}</strong></p>
           <p>Mô Tả: <strong>{!!$banner->banner_description!!}</strong></p>
           <p>Ảnh Banner: <strong>
            <img src="{{url('uploads')}}/{{$banner->banner_image}}" width="100px" alt=""></strong></p>
           <p>Trạng Thái: <strong>{{$banner->banner_status == 1 ? "Hiện" : "Ẩn"}}</strong></p>
             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
         </div>
       </div>
