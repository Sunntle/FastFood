<div class="py-5">
    <div class="container">
        <div class="heading">
                <h3 class="section-title fs-2">Sản phẩm khác</h3>
    </div>
    <div class="row text-center">
        <?php foreach($data['TopSp'] as $kq){?>
                <div class="product col-lg-3 col-md-4 col-12 py-2">
                <a class="bg-transparent " href="/live/menu/detailsproduct/<?php echo $kq['maHangHoa']?>">
                    <img class="p-img img-fluid rounded-3" src="<?php echo $kq['hinhAnh']?>" alt="">
                </a>
                <a href="" class="text-dark bg-transparent text-decoration-none "><?php foreach($data['loai'] as $key){ if($kq['maLoai'] == $key['maLoai']) echo $key['tenLoai'];}?></a>
                <a href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>" class="products-cat text-dark bg-transparent text-decoration-none "><h5 class="p-name"><?php echo $kq['tenHangHoa']?></h5></a>
                <a href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>" class="bg-transparent text-decoration-none "><h5 class="p-price text-danger"><?php echo number_format($kq['gia'])?> VND</h5></a>
                <form action="/live/cart" method="POST" class="form_addtocart">
                    <input type="hidden" name="sl" value="1" min="1">
                    <input type="hidden" name="hinhAnh" value="<?php echo $kq['hinhAnh']?>">
                    <input type="hidden" name="tenHangHoa" value="<?php echo $kq['tenHangHoa']?>">
                    <input type="hidden" name="maHangHoa" value="<?php echo $kq['maHangHoa']?>">
                    <input type="hidden" name="gia" value="<?php echo $kq['gia']?>">
                    <input class="pbuy-btn rounded-3"  type="submit" class="py-2 px-5" id="addtocart" name="addtocart" value="Thêm vào giỏ hàng"> 
                </form>
            </div>
        <?php }?>
        </div>
</div>