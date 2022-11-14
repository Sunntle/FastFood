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
<?php
foreach($data['NewsID'] as $kq) { ?>
    <div class="p-4 border rounded shadow">
        <h3 class="text-center text-uppercase"><?php echo $kq['tieuDe']?></h3>
        <div>Thời gian: <span>04/07/2022</span></div>
        <hr>
        <div class="news-content">
           <p><?php echo $kq['noiDung']?></p>
            <div class="text-center p-2">
            <img class="img-fluid" src="https://kfcvietnam.com.vn/uploads/images/image-20210222114845-2.png" alt="">
            </div>
            <p>
            Một trong những khó khăn đó là có địa bàn rất rộng, hơn 20 ấp, bị ngăn cách bởi sông Cái Tàu làm cho sự phát triển của toàn xã trở nên không đồng đều. 15 ấp sống dưới tán rừng chưa có cơ sở hạ tầng để phát triển kinh tế.
            </p>
        </div>
        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=4927767217278608" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
<?php } ?>
    <div>
        <h3 class="text-center text-uppercase my-3">Tin tức khác</h3>
        <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="m-1 border rounded shadow p-3">
                        <a href="#"><img class="img-fluid" src="./public/images/news1.jpg" alt=""></a>
                        <h5 class="py-1 my-2 fs-5"><a href="#" class="text-decoration-none text-dark bg-transparent">Jollibee Việt Nam khai trương cửa hàng thứ 150</a></h5>
                        <p>Jollibee Việt Nam đã đưa vào vận hành nhà máy mới với chứng nhận ISO 22000:2018...</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="m-1 border rounded shadow p-3">
                        <a href="#"><img class="img-fluid" src="./public/images/news1.jpg" alt=""></a>
                        <h5 class="py-1 my-2 fs-5"><a href="#" class="text-decoration-none text-dark bg-transparent">Jollibee Việt Nam khai trương cửa hàng thứ 150</a></h5>
                        <p>Jollibee Việt Nam đã đưa vào vận hành nhà máy mới với chứng nhận ISO 22000:2018...</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="m-1 border rounded shadow p-3">
                        <a href="#"><img class="img-fluid" src="./public/images/news1.jpg" alt=""></a>
                        <h5 class="py-1 my-2 fs-5"><a href="#" class="text-decoration-none text-dark bg-transparent">Jollibee Việt Nam khai trương cửa hàng thứ 150</a></h5>
                        <p>Jollibee Việt Nam đã đưa vào vận hành nhà máy mới với chứng nhận ISO 22000:2018...</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="m-1 border rounded shadow p-3">
                        <a href="#"><img class="img-fluid" src="./public/images/news1.jpg" alt=""></a>
                        <h5 class="py-1 my-2 fs-5"><a href="#" class="text-decoration-none text-dark bg-transparent">Jollibee Việt Nam khai trương cửa hàng thứ 150</a></h5>
                        <p>Jollibee Việt Nam đã đưa vào vận hành nhà máy mới với chứng nhận ISO 22000:2018...</p>
                        </div>
                    </div>
                </div>
    </div>
</div>