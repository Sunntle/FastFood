<h2 class="py-3 text-uppercase text-center">Danh sách hàng hóa</h2>
<div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-1">Mã HH</div>
            <div class="col-2">Tên HH</div>
            <div class="col-2">Giá</div>
            <div class="col-1">Hình ảnh</div>
            <div class="col-2">Thuộc loại</div>
            <div class="col-2">Số lượng</div>
            <div class="col-2">Thao tác</div>
        </div>
</div>
<?php foreach($data['listAll'] as $value) { ?>
    <div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-1"><?=$value['maHangHoa']?></div>
            <div class="col-2"><?=$value['tenHangHoa']?></div>
            <div class="col-2"><?=$value['gia']?></div>
            <div class="col-1"><img class="img-fluid" src=".<?=$value['hinhAnh']?>" alt=""></div>
            <div class="col-2">
                <?php foreach($data['listLoai'] as $key){
                    if($value['maLoai']==$key['maLoai']){
                        echo $key['tenLoai'];
                    }
                }?></div>
            <div class="col-2"><?=$value['soLuong']?></div>
            <div class="col-2">
                <form action="hanghoa/SuaHangHoa" method="post">
                    <input type="hidden" name="maHangHoa" value="<?=$value['maHangHoa']?>">
                    <input type="submit" class="btn btn-success col-5" value="Sửa"></input>
                    <a href="hanghoa/XoaHangHoa&maHangHoa=<?=$value['maHangHoa']?>" class="btn btn-danger col-5" value="Xóa">Xóa</a>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>