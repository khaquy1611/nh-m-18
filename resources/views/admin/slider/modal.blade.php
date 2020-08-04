   <div id="cat_modal_content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">ID Slider
            {{$slider->slider_id}}</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body" id="post">
           <p>Tên Slider: <strong>{{$slider->slider_name}}</strong></p>
           <p>Link Slider: <strong>{{$slider->slider_link}}</strong></p>
           <p>Tiêu Đề: <strong>{{$slider->slider_title}}</strong></p>
           <p>Mô Tả: <strong>{!!$slider->slider_description!!}</strong></p>
           <p>Ảnh: <strong>
            <img src="{{url('uploads')}}/{{$slider->slider_image}}" width="100px" alt=""></strong></p>
           <p>Trạng Thái: <strong>{{$slider->slider_status == 1 ? "Hiện" : "Ẩn"}}</strong></p>
             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
         </div>
       </div>
