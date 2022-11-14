
<h2 class="py-3 text-uppercase text-center">Chỉnh sửa thông tin khách hàng</h2>

<form action="khachhang/CapNhatKH" method="post" enctype="multipart/form-data">
<?php 
    foreach($data['SelectKH'] as $value){
    ?>
    <div class="form-group mb-3">
        <label for="" class="form-label">Mã KH</label>
        <input type="text" class="form-control" disabled name="maKH" value="<?=$value['maKH']?>">
        <label for="" class="form-label">Tên KH</label>
        <input type="text" class="form-control" name="tenKH" value="<?=$value['tenKH']?>">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?=$value['email']?>">
        <label for="" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" name="user" disabled value="<?=$value['user']?>">
        <label for="" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" name="matKhau" value="<?=$value['matKhau']?>">
        <label for="" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="diaChi" value="<?=$value['diaChi']?>">
        <label for="" class="form-label">Số điện thoại:</label>
        <input type="text" class="form-control" name="number" value="<?=$value['soDienThoai']?>">
        <label for="hinh" class="form-label">Hình</label>
        <input type="file" class="form-control" id="hinh" name="hinh">
        <label for="" class="form-label">Vai trò</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vaiTro" id="flexRadioDefault1" value="1" <?php 
                    if($value['vaiTro']==1) echo "checked";
                ?>>
            <label class="form-check-label" for="flexRadioDefault1" >
                Quản trị
            </label>
        </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="vaiTro" id="flexRadioDefault2"
            <?php 
                if($value['vaiTro']==0) echo "checked";
                ?> value="0">
            <label class="form-check-label" for="flexRadioDefault2">
                Người dùng
            </label>
        </div>
    </div>
    <?php }
    if(isset($data['thongbao'])) echo $data['thongbao'];
    ?>
    <div class="form-group py-3">
        <input type="hidden" class="form-control" name="maKH" value="<?=$value['maKH']?>">
        <input type="submit" name="btn-add" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="khachhang" class="btn btn-success">Danh sách</a>
    </div>
</form>