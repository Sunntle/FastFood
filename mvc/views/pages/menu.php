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
        <div class="row m-0 py-5 text-decoration-none">
            <?php foreach($data['AllType'] as $kq) { ?>
            <a class="bg-transparent col-lg-2 col-md-4 col-6 text-decoration-none text-dark text-center h5" href="./menu/SayHi/<?php echo $kq['maLoai']?>">
                <img class="img-fluid py-3"src="<?php echo $kq['hinh']?>" alt=""><?php echo $kq['tenLoai']?>
            </a>
        <?php }?>
        </div>
    
    </section>
    <h2 class="text-danger text-center"><?php if(isset($data['rong'])) echo $data['rong']  ?></h2>
    <div class="row container" id="sp">
        <?php foreach($data['ProductbyIDType'] as $kq){ ?>
            <div class="product col-lg-3 col-md-4 col-12 py-2">
                <a class="bg-transparent " href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>">
                    <img class="p-img img-fluid rounded-3" src="<?php echo $kq['hinhAnh']?>" alt="">
                </a>
                <a href="" class="text-dark bg-transparent text-decoration-none "><?php foreach($data['AllType'] as $key){ if($kq['maLoai'] == $key['maLoai']) echo $key['tenLoai'];}?></a>
                <a href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>" class="products-cat text-dark bg-transparent text-decoration-none "><h5 class="p-name"><?php echo $kq['tenHangHoa']?></h5></a>
                <a href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>" class="bg-transparent text-decoration-none "><h5 class="p-price text-danger"><?php echo number_format($kq['gia'])?> VND</h5></a>
                <form action="./cart" method="POST" class="form_addtocart">
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
    <div  class="btn-load container text-center my-5">
        <button class=" bg-dark rounded-3"><a class= "bg-dark text-light nav-link p-2 more" href="./menu/SayHi/<?=$data['idLoai']?>&page=2#sp">Xem thêm</a></button>
    </div>        