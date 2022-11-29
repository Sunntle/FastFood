
<h2 class="py-3 text-uppercase text-center">Chỉnh sửa hàng hóa</h2>

<form action="hanghoa/CapNhatHangHoa" method="post" enctype="multipart/form-data">
<?php 
    foreach($data['SelectHangHoa'] as $value){
    ?>
    <div class="form-group mb-3">
        <label for="" class="form-label">Mã HH</label>
        <input type="text" class="form-control" disabled name="maHangHoa" value="<?=$value['maHangHoa']?>">
        <label for="" class="form-label">Tên HH</label>
        <input type="text" class="form-control" name="tenHangHoa" value="<?=$value['tenHangHoa']?>">
        <label for="" class="form-label">Giá</label>
        <input type="number" class="form-control" name="gia" min="1" value="<?=$value['gia']?>">
        <label for="hinh" class="form-label">Hình</label>
        <input type="file" class="form-control" id="hinh" name="hinh">
        <label for="" class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="moTa" value="<?=$value['moTa']?>">
        <label for="" class="form-label">Loại hàng</label>
            <div class="form-floating"> 
            <select class="form-select" name="maLoai" id="floatingSelect" aria-label="Floating label select example">
                <?php foreach($data['listLoai'] as $key) {?>
                <option value="<?=$value['maLoai']?>"
                    <?php
                        if($value['maLoai']==$key['maLoai']) echo "selected";
                    ?>><?=$key['tenLoai']?></option>
                <?php }?>
            </select>
            <label for="floatingSelect">Chọn 1 loại hàng</label>
            </div>
        <label for="" class="form-label">Lượt xem</label>
        <input type="text" class="form-control" name="luotXem" disabled value="<?=$value['luotXem']?>">
        <label for="" class="form-label">Số lượng</label>
        <input type="number" class="form-control" name="soLuong" min="0" value="<?=$value['soLuong']?>">
    </div>
    <?php }
    if(isset($data['thongbao'])) echo $data['thongbao'];
    ?>
    <div class="form-group py-3">
        <input type="hidden" class="form-control" name="maHangHoa" value="<?=$value['maHangHoa']?>">
        <input type="submit" name="btn-add" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="hanghoa" class="btn btn-success">Danh sách</a>
    </div>
</form>