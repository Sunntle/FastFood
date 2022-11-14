<h2 class="py-3 text-uppercase text-center">Danh sách khách hàng</h2>
<div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-1">Mã KH</div>
            <div class="col-2">Tên KH</div>
            <div class="col-2">Email</div>
            <div class="col-2">User</div>
            <div class="col-1">Hình</div>
            <div class="col-2">Vai trò</div>
            <div class="col-2">Thao tác</div>
        </div>
</div>
<?php foreach($data['listAll'] as $value) { ?>
    <div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-1"><?=$value['maKH']?></div>
            <div class="col-2"><?=$value['tenKH']?></div>
            <div class="col-2"><?=$value['email']?></div>
            <div class="col-2"><?=$value['user']?></div>
            <div class="col-1"><img class="img-fluid" src=".<?=$value['hinh']?>" alt=""></div>
            <div class="col-2"><?php if($value['vaiTro']==1) echo "Quản trị"; else echo "Người dùng";?></div>
            <div class="col-2">
                <form action="khachhang/SuaKH" method="post">
                    <input type="hidden" name="maKH" value="<?=$value['maKH']?>">
                    <input type="submit" class="btn btn-success col-5" value="Sửa"></input>
                    <a href="khachhang/XoaKH&maKH=<?=$value['maKH']?>" class="btn btn-danger col-5" value="Xóa">Xóa</a>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>