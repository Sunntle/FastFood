
<h2 class="py-3 text-uppercase text-center">Danh sách bình luận</h2>
<div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-1">Mã BL</div>
            <div class="col-3">Nội dung</div>
            <div class="col-2">Ngày BL</div>
            <div class="col-2">Mã HH</div>
            <div class="col-2">Tên KH</div>
            <div class="col-2">Thao tác</div>
        </div>
</div>
<?php
    foreach($data['listAll'] as $key){
    ?>
    <div class="row align-items-center my-2 text-center">
    <div class="row align-items-center my-2 text-center">
            <div class="col-1"><?=$key['maBL']?></div>
            <div class="col-3"><?=$key['noiDung']?></div>
            <div class="col-2"><?=$key['ngayBL']?></div>
            <div class="col-2"><?=$key['maHangHoa']?></div>
            <div class="col-2"><?php foreach($data['listAllKH'] as $value){if($value['maKH']==$key['maKH']) echo $value['tenKH'];} ?></div>
            <div class="col-2">
                <form action="binhluan/SuaBinhLuan" method="post">
                    <input type="hidden" name="maBL" value="<?=$key['maBL']?>">
                    <a href="binhluan/XoaBinhLuan&maBL=<?=$key['maBL'];?>" class="btn btn-danger col-5" value="Xóa">Xóa</a>
                </form>
            </div>
        </div>
    </div>
<?php } ?>