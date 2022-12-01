
<h2 class="py-3 text-uppercase text-center">Thêm mới khách hàng</h2>

<form action="khachhang/ThemKH" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="" class="form-label">Tên KH</label>
        <input type="text" class="form-control" name="tenKH" required>
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
        <label for="" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" name="user" required>
        <label for="" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="matKhau" required>
        <label for="hinh" class="form-label">Hình</label>
        <input type="file" class="form-control" id="hinh" name="hinh">
        <label for="" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="diaChi">
        <label for="" class="form-label">Số điện thoại:</label>
        <input type="text" class="form-control" id="number" name="number" required>
        <label for="" class="form-label">Vai trò</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vaiTro" id="flexRadioDefault1" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Quản trị
            </label>
        </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="vaiTro" id="flexRadioDefault2"
            value="0" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Người dùng
            </label>
        </div>
    </div>
    <?php 
    if(isset($data['thongbao'])) echo $data['thongbao'];
    ?>
    <div class="form-group py-3">
        <input type="hidden" class="form-control" name="maKH" value="<?=$value['maKH']?>">
        <input type="submit" name="btn-update" class="btn btn-primary" value="Thêm mới">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="khachhang" class="btn btn-success">Danh sách</a>
    </div>
</form>