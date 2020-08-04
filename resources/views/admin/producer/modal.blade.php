    <div id="cat_modal_content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ID Danh Mục{{$producer->producer_id}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="post">
              <p>Tên Danh Mục: <strong>{{$producer->producer_name}}</strong></p>
              <p>Trạng Thái Danh Mục: <strong>{{$producer->producer_status ? "Hiện" : "Ẩn"}}</strong></p>
              <p>Ngày Tạo Danh Mục: <strong>{{$producer->created_at}}</strong></p>
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
            </div>