<!-- Content -->
<div style="margin-left: 00px;">
    <h2>Quản lý sản phẩm</h2>
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
        + Thêm sản phẩm mới
    </button>
    <form method="post" class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="text" id="name" placeholder="Tên sản phẩm" autocomplete="off" />
                        <input type="text" id="image" placeholder="Link hình ảnh" autocomplete="off" />
                        <input type="text" id="price" placeholder="Giá" autocomplete="off" />
                        <!-- <button  class="btn btn-primary">Thêm</button> -->
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" id="btnadd" type="reset" class="btn btn-primary" data-bs-dismiss="modal">Thêm</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
    <span><a style="margin-left:40rem ;" href="http://localhost/t2k/Admin">
            <-Quay lại</a></span>
    <div style="margin-bottom:20px ;"></div>
    <div id="display" class="table table-responsive"></div>
</div>
<link rel="stylesheet" href="/t2k/public/css/detail.css">
