

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
            <img class="img-fluid w-100 rounded-3" src="<?php echo $kq['hinhAnh']?>" alt="">

            <div class="small-img-group">
                <div class="small-img-col">

                </div>
            </div>
        </div>

        <div class="d-product col-lg-6 col-md-12 col-12">
            
            <h6>Menu / <?php foreach($data['listAll'] as $key){ if($kq['maLoai'] == $key['maLoai']) echo $key['tenLoai']; }?></h6>
            <h3 class="py-3"><?php echo $kq['tenHangHoa']?></h3>
            <h2 class="text-danger"><?php echo number_format($kq['gia'])?> VND</h2>
            <div class="quantity w-75 d-flex">
                    <button class="tru btn btn-outline-danger px-3" onclick=" tru('0')">-</button>
                    <input type="number" class="mx-3 w-25 form-control border border-danger text-center" id="numberSL" name="sl" value="1" min="1">
                    <button class="cong btn btn-outline-danger px-3 " onclick=" cong('10')">+</button>
            </div>
            <h5 class="m-3">Số lượng còn lại: <?php echo $kq['soLuong']?></h5>
            <form action="/live/cart " method="POST">
                <input type="hidden" id="slsp" name="sl" value="1" min="1">
                <input type="hidden" name="hinhAnh" value="<?php echo $kq['hinhAnh']?>">
                <input type="hidden" name="tenHangHoa" value="<?php echo $kq['tenHangHoa']?>">
                <input type="hidden" name="maHangHoa" value="<?php echo $kq['maHangHoa']?>">
                <input type="hidden" name="gia" value="<?php echo $kq['gia']?>">
                <input type="submit" class="py-2 px-5 rounded-3" id="addtocart" name="addtocart" value="Thêm vào giỏ hàng"> 
            </form>
            <h5 class="mt-4 mb-4">Giới thiệu sản phẩm</h5>
            <span><?php echo $kq['moTa']?></span>
            
        </div>
    </div>
    <div class="heading my-5">
        <h3 class="section-title fs-2">Bình luận sản phẩm</h3>
    </div>
    <div class="well col-lg-6 col-md-12 col-12 " id="cmt">
        <?php if (checkLogin()){
            if(isset($_SESSION["login"])){
                $name = $_SESSION["login"]['tenKH'];
                $idKH = $_SESSION['login']['maKH'];
            }?>
            
                    <form action="/live/menu/detailsproduct/<?php echo $kq['maHangHoa']?>#cmt" method="post">
                    <h4 name="tenKH"><?php echo $name?></h4>
                    <input type="hidden" name="idKH" value="<?php echo $idKH?>">
                    <input type="hidden" name="maHangHoa" value="<?php echo $kq['maHangHoa']?>">
                    <div class="form-group">
                        <textarea name="noidung" class="form-control" rows="3" required></textarea>
                    </div>
                    <input type="submit" name="binhLuan" class="btn btn-primary my-3" value="Gửi"></input>
                    <?php
                        if (isset($data['Thongbao'])){?>
                        <div class="alert alert-danger">
                         <?php echo $data['Thongbao'] ?>
                        </div>  
                    <?php }?>                 
                </form>
        <?php }else { ?>
            <button class="btn-login border-0 rounded-3 bg-danger text-white" href='/live/login'> Đăng nhập để bình luận</button>
            <?php } ?>
<?php } ?>
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
    
<script>
    
    function cong(max) {

    var cong =document.getElementById("numberSL").value = parseInt(document.getElementById("numberSL").value) + 1;
    
    var slsp = document.getElementById("slsp").value = parseInt(document.getElementById("slsp").value) + 1;
    slsp = cong ;
    // if (document.getElementById("numberSL").value >= parseInt(max)) {
    //     document.getElementById("numberSL").value = max;
    // }
}
function tru(min) {
    
    var tru = document.getElementById("numberSL").value = parseInt(document.getElementById("numberSL").value) - 1;

    // if (document.getElementById("numberSL").value <= parseInt(min)) {
    //     document.getElementById("numberSL").value = min;

    // }
}
</script>
    