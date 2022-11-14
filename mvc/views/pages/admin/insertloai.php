<h2 class="theh2-form py-3 text-uppercase text-center">Thêm loại hàng</h2>
<form action="loai/ThemLoai" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="" class="form-label">Mã loại</label>
        <input type="text" class="form-control" disabled name="maLoai">
        <label for="" class="form-label">Tên loại</label>
        <input type="text" class="form-control" name="tenLoai" required>
        <label for="hinh" class="form-label">Hình</label>
        <input type="file" class="form-control" id="hinh" name="hinh">
    </div>
    <?php 
    if(isset($data['thongbao'])) echo $data['thongbao'];
    ?>
    <div class="form-group py-3">
        <input type="hidden" class="form-control" name="maLoai">
        <input type="submit" name="btn-update" class="btn btn-primary" value="Thêm mới">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="loai" class="btn btn-success">Danh sách</a>
    </div>
</form>