<div class="content">
        <div class="container slide">
                <div class="col-md-8 col-ms-12">
                        <div class="title my-2"><span class="text-white p-2 fw-bolder">FAST FOOD</span></div>
                        <div class="headline text-white fw-bolder lh-sm my-2 text-uppercase">Three Guys<br>It just tastes good!</div>
                        <a href="menu/SayHi/1" class="btn btn-danger text-decoration-none text-white fw-bolder p-2 w-25"><span>MORE</span></a>
                </div>
        </div>
</div>
<div class="container my-5">
        <div class="py-5">
        <div class="d-flex flex-column align-items-center p-3">
        <div class="title my-2"><span class="text-white p-2 fw-bolder">FAST FOOD</span></div>
        <div class="headline-sm fw-bolder lh-sm my-2 text-center">Sản phẩm nổi bật</div>
        <div class="line m-2"></div>
        <div class="text-center text-black-50 p-3 d-flex justify-content-center"><p class="w-75">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias odio enim atque quae repellat aperiam repudiandae veniam.</p></div>
        </div>
        <div class="row text-center">
        <?php foreach($data['TopSp'] as $kq){?>
                <div class="product col-lg-3 col-md-4 col-12 py-2">
                <a class="bg-transparent " href="./menu/detailsproduct/<?php echo $kq['maHangHoa']?>">
                    <img class="p-img img-fluid rounded-3" src="<?php echo $kq['hinhAnh']?>" alt="">
                </a>
                <a href="" class="text-dark bg-transparent text-decoration-none "><?php foreach($data['loai'] as $key){ if($kq['maLoai'] == $key['maLoai']) echo $key['tenLoai'];}?></a>
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
        </div>
</div>
<div class="container-fluid p-0 bg-special my-5">
        <div class="container py-5">
                <div class="row bg-white rounded p-3">
                        <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-center">
                                <div class="title my-2"><span class="text-white p-2 fw-bolder">FAST FOOD</span></div>
                                <div class="headline-sm fw-bolder lh-sm my-2">Three Guys Fast Food là gì ?</div>
                                <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, incidunt officiis. Ipsa incidunt reprehenderit voluptatem, quaerat labore repellat magnam. Pariatur facilis accusantium aliquid animi aperiam atque corporis excepturi adipisci blanditiis!
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, incidunt officiis. Ipsa incidunt reprehenderit voluptatem, quaerat labore repellat magnam. Pariatur facilis accusantium aliquid animi aperiam atque corporis excepturi adipisci blanditiis!
                                </p>
                                <a href="blog" class="btn btn-danger text-decoration-none text-white fw-bolder p-2 w-25"><span>MORE</span></a>
                        </div>
                        <div class="col-lg-6 col-sm-12 p-0">
                                <img class="img-fluid rounded" src="./public/images/home-aboutus.jpg" alt="">
                        </div>
                </div>
        </div>
</div>
<div class="container py-5">
        <div class="d-flex flex-column align-items-center p-3">
        <div class="title my-2"><span class="text-white p-2 fw-bolder">FAST FOOD</span></div>
        <div class="headline-sm fw-bolder lh-sm my-2 text-center">Tính năng</div>
        <div class="line m-2"></div>
        <div class="text-center text-black-50 p-3 d-flex justify-content-center"><p class="w-75">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias odio enim atque quae repellat aperiam repudiandae veniam.</p></div>
        </div>
        <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-regular fa-clock fs-1 features"></i></div>
                        <h4 class="fs-4">Tốc độ</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-utensils fs-1 features"></i></div>
                        <h4 class="fs-4">Chế biến</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-truck-fast fs-1 features"></i></div>
                        <h4 class="fs-4">Vận chuyển</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-face-smile fs-1 features"></i></div>
                        <h4 class="fs-4">Thân thiện</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div> 
        </div>
        <div class="row d-md-flex d-sm-none">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-star fs-1 features"></i></div>
                        <h4 class="fs-4">Tiện lợi</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-sharp fa-solid fa-users fs-1 features"></i></div>
                        <h4 class="fs-4">Công ty bản địa</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-gift fs-1 features"></i></div>
                        <h4 class="fs-4">Khuyến mãi</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="text-danger p-3"><i class="fa-solid fa-earth-americas fs-1 features"></i></div>
                        <h4 class="fs-4">Toàn cầu</h4>
                        <p class="text-black-50">Import the full Fast Food demo content with a single mouse click. </p>
                </div> 
        </div>
</div>