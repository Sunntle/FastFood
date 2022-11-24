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
<div class="container">
    <article id="news">
            <div class="container py-5">
                <h3 class="mb-5 text-center fs-1 fw-bolder">TIN TỨC</h3>
                <div class="row">
                    <?php foreach($data['AllNews'] as $kq) { ?>
                    <div class="col-lg-3 col-sm-6">
                    
                        <div class="m-1 border rounded shadow p-3">
                        <a href="news/details&newsID=<?php echo $kq['id']?>"><img class="img-fluid" src="<?php echo $kq['anhtieude'] ?>" alt=""></a>
                        <h5 class="py-1 my-2 fs-5"><a href="news/details&newsID=<?php echo $kq['id']?>" class="text-decoration-none text-dark bg-transparent"><?php echo $kq['tieuDe']?></a></h5>
                        <p><?php echo substr($kq['noiDung'],0, 63)?> ....</p>
                        </div>
                    </div>                    
                    <?php } ?>
                </div>
                <div class="text-center my-5">
                    <a class="btn btn-danger rounded" href="#" role="button"><span class="text-white  p-1">Xem thêm</span></a>
                </div>
            </div>
    </article>
    <article class="blog">

    </article>
</div>