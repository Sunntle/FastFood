

<?php 
    if($data['Pages']=="detailsproduct"){
        echo ' <script>
        $(document).ready(function (){
            $( ".nav-item a" ).removeClass( "text-white" ).addClass( "text-dark" );
            $("button i").removeClass( "text-white" ).addClass( "text-dark" );
            $("a i").removeClass( "text-white" ).addClass( "text-dark" );
        });
    </script>  ';
    }
?>
<div class="container sproduct my-p5 slide">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-12">
            <?php foreach($data['ProductID'] as $kq) {?>
            <img class="img-fluid w-100" src="<?php echo $kq['hinhAnh']?>" alt="">

            <div class="small-img-group">
                <div class="small-img-col">

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
            
            <h6>Menu / <?php foreach($data['AllType'] as $key){ if($kq['maLoai'] == $key['maLoai']) echo $key['tenLoai']; }?></h6>
            <h3 class="py-3"><?php echo $kq['tenHangHoa']?></h3>
            <h2 class="text-danger"><?php echo $kq['gia']?> đ</h2>
            <form action="/live/cart" method="POST">
                <input type="number" name="sl" value="1" min="1">
                <input type="hidden" name="hinhAnh" value="<?php echo $kq['hinhAnh']?>">
                <input type="hidden" name="tenHangHoa" value="<?php echo $kq['tenHangHoa']?>">
                <input type="hidden" name="maHangHoa" value="<?php echo $kq['maHangHoa']?>">
                <input type="hidden" name="gia" value="<?php echo $kq['gia']?>">
                <input type="submit" class="py-2 px-5" id="addtocart" name="addtocart" value="Thêm vào giỏ hàng"> 
            </form>
            <h5 class="mt-4 mb-4">Giới thiệu sản phẩm</h5>
            <span><?php echo $kq['moTa']?></span>
            <?php } ?>
        </div>
    </div>
    <div class="heading my-5">
        <h3 class="section-title fs-2">Bình luận sản phẩm</h3>
    </div>
    <div class="well col-lg-6 col-md-12 col-12 ">
                <form action="">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Gửi</button>
                </form>
            </span></h4>
    <?php foreach($data['CmtID'] as $kq) {?>
        <div class="items my-2">
            <div class="nguoi">
                <div class="text">
                    <img class="anh" src=" <?php foreach($data['KhachHang'] as $key){ if($kq['maKH'] == $key['maKH']) echo $key['hinh']; }?>" alt="">
                    <div>
                        <p><?php foreach($data['KhachHang'] as $key){ if($kq['maKH'] == $key['maKH']) echo $key['tenKH']; }?></p>
                        <span><?php echo $kq['noiDung']?>!</span>
                        <p><?php echo $kq['ngayBL']?></p>
                    </div>
                </div>
                <div class="text1">
                    
                </div>

            </div>
        </div>
    <?php } ?>
    </div>
    <?php require_once "relatedproducts.php"; ?>
</div>
    
    