<div class="content">
    <div class="container slide">
    <div class="col-md-8 col-ms-12">
        <div class="title my-2 text-white fs-6">HOME</div>
        <div class="headline-sm text-white fw-bolder lh-sm my-2 text-uppercase"><?=$data['Pages']?></div>
        <div class="line"></div>
        <div class="subtitle text-white fs-5 my-2">Capitalise on low hanging fruit to identify a ballpark value added activity to beta performance test. Override the digital divide.</div>
    </div>
    </div>
</div>
<div class="container py-5">
    <section id="type">
    
        <div class="row m-0 py-5 text-center text-decoration-none">
            <?php foreach($data['AllType'] as $kq) { ?>
            <a class="bg-transparent col-lg-2 col-md-4 col-6 text-center text-decoration-none text-dark" href=""><img class="img-fluid py-3"
                src="public/images/garan.png" alt=""><?php echo $kq['tenLoai']?></a>
        <?php }?>
        </div>
    
    </section>
    
    <div class="row container">
        <?php foreach($data['AllSP'] as $kq) { ?>
            <div class="col-lg-3 col-sm-4 col-6">
                <li>
                    <div class="produtct-item">
                        <div class="product-top">
                            <a href="/live/menu/detailsproduct/<?php echo $kq['maHangHoa']?>" class="products-stemp">
                                <img src="<?php echo $kq['hinhAnh']?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="" class="products-cat text-dark bg-transparent text-decoration-none "><?php echo $kq['maLoai']?></a>
                            <a href="" class="products-name fw-bolder bg-transparent"><?php echo $kq['tenHangHoa']?></a>
                            <div class="product-price"><?php echo number_format($kq['gia'])?></div>
                            <form action="/live/cart" method="POST">
                                <input type="hidden" name="sl" value="1" min="1">
                                <input type="hidden" name="hinhAnh" value="<?php echo $kq['hinhAnh']?>">
                                <input type="hidden" name="tenHangHoa" value="<?php echo $kq['tenHangHoa']?>">
                                <input type="hidden" name="maHangHoa" value="<?php echo $kq['maHangHoa']?>">
                                <input type="hidden" name="gia" value="<?php echo $kq['gia']?>">
                                <input type="submit" class="py-2 px-5" id="addtocart" name="addtocart" value="Thêm vào giỏ hàng"> 
                            </form>
                        </div>
                    </div>
                </li>
            </div>               
        <?php }?>
    </div>