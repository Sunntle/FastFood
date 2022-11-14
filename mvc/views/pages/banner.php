<div class="content">
        <div class="container slide">
                <div class="col-md-8 col-ms-12">
                        <div class="title my-2"><span class="text-white p-2 fw-bolder">FAST FOOD</span></div>
                        <div class="headline text-white fw-bolder lh-sm my-2 text-uppercase">Three Guys<br>It just tastes good!</div>
                        <a href="menu" class="btn btn-danger text-decoration-none text-white fw-bolder p-2 w-25"><span>MORE</span></a>
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
        <?php foreach($data['TopSp'] as $value){?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="p-2">
                    <img class="img-fluid" src="<?=$value['hinhAnh']?>" alt="">
                        <div class="fs-6"><?=$value['maLoai']?></div>
                        <div class="fs-5"><?=$value['tenHangHoa']?></div>
                        <p>Giá: <?=$value['gia']?>đ</p>
                        <a href="">Đặt hàng</a>
                    </div>    
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