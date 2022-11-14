<h2 class="py-3 text-uppercase text-center">Danh sách loại hàng</h2>
<div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-3">Mã loại</div>
            <div class="col-3">Tên loại</div>
            <div class="col-2">Hình</div>
            <div class="col-2">Thao tác</div>
            <!-- <div class="col-2"></div> -->
        </div>
</div>
<?php foreach($data['listAll'] as $value) { ?>
    <div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-3"><?=$value['maLoai']?></div>
            <div class="col-3"><?=$value['tenLoai']?></div>
            <div class="col-2"><img class="img-fluid" src=".<?=$value['hinh']?>" alt=""></div>
            <div class="col-2">
                <form action="loai/SuaLoai" method="post">
                    <input type="hidden" name="maLoai" value="<?=$value['maLoai']?>">
                    <input type="submit" class="btn btn-success col-5" value="Sửa"></input>
                    <a href="loai/XoaLoai&maLoai=<?=$value['maLoai']?>" class="btn btn-danger col-5" value="Xóa">Xóa</a>
                </form>
            </div>
            <!-- <div class="col-2"></div> -->
        </div>
    </div>

<?php
}
?>
