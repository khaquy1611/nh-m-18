    <div id="cat_modal_content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ID Khách Hàng{{$customer->id}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="post">
              <p>Tên Khách Hàng: <strong>{{$customer->name}}</strong></p>
              <p>Email Khách Hàng: <strong>{{$customer->email}}</strong></p>
              <p>Số Điện Thoại: <strong>{{$customer->phone}}</strong></p>
              <p>Địa Chỉ: <strong>{{$customer->address}}</strong></p>
              <p>Ngày Tạo: <strong>{{$customer->created_at}}</strong></p>
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
            </div>
           