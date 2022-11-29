
<h2 class="py-3 text-uppercase text-center">Thêm hàng hóa</h2>

<form action="hanghoa/ThemHangHoa" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="" class="form-label">Tên HH</label>
        <input type="text" class="form-control" name="tenHangHoa" required>
        <label for="" class="form-label">Giá</label>
        <input type="number" class="form-control" min="1" name="gia" required>
        <label for="hinh" class="form-label">Hình</label>
        <input type="file" class="form-control" id="hinh" name="hinh" required>
        <label for="" class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="moTa" required>
        <label for="" class="form-label">Loại hàng</label>
            <div class="form-floating"> 
            <select class="form-select" name="maLoai" id="floatingSelect" aria-label="Floating label select example">
                <?php foreach($data['listLoai'] as $key) {?>
                <option value="<?=$key['maLoai']?>"
                    ><?=$key['tenLoai']?></option>
                <?php }?>
            </select>
            <label for="floatingSelect">Chọn 1 loại hàng</label>
            </div>
        <label for="" class="form-label">Số lượng</label>
        <input type="number" class="form-control" min="0" name="soLuong" required>
    </div>
    <?php
    if(isset($data['thongbao'])) echo $data['thongbao'];
    ?>
    <div class="form-group py-3">
        <input type="hidden" class="form-control" name="maHangHoa" value="<?=$value['maHangHoa']?>">
        <input type="submit" name="btn-update" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="hanghoa" class="btn btn-success">Danh sách</a>
    </div>
</form>