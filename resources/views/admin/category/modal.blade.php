    <div id="cat_modal_content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ID Danh Mục{{$cates->categories_id}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="post">
              <p>Tên Danh Mục: <strong>{{$cates->categories_name}}</strong></p>
              <p>Đường Dẫn Đẹp: <strong>{{$cates->slug}}</strong></p>
              <p>Danh Mục Cha: <strong>{{$cates->parent_id}}</strong></p>
              <p>Trạng Thái Danh Mục: <strong>{{$cates->categories_status ? "Hiện" : "Ẩn"}}</strong></p>
              <p>Ngày Tạo Danh Mục: <strong>{{$cates->created_at}}</strong></p>
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Đóng</button>
            </div>
           