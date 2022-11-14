
<?php
if(isset($_SESSION["login"])){
    $name = $_SESSION["login"]['tenKH'];
    $dc = $_SESSION["login"]['diaChi'];
    $email = $_SESSION["login"]['email'];
    $sdt = $_SESSION["login"]['soDienThoai'];
}else{
    $name = "";
    $dc = "";
    $email = "";
    $sdt = "";
}
?> 
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
<div class="container mt-5">
    <form action="/live/bill/bill" method="POST">
    <div class="m-auto">
            <h2 class="my-4 ps-5 ">Thông tin đơn hàng</h2>
            <table class="table table-striped" style="border-collapse:collapse">
                <tr class="table-success">
                    <th>STT</th>
                    <th class="w-25">Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                $tong = 0;
                $i = 0; 
                $sumqty = 0;
                foreach ($_SESSION['vohang'] as $kq){ 
                    $tt = $kq[3] * $kq[4];
                    $tong += $tt;
                    echo '<tr>
                            <td>'. ($i+1) .'</td>
                        <td> <img style="width:30%" src="'.$kq[2].'"> </td> 
                        <td style="vertical-align: middle;">'.$kq[1].'</td> 
                        <td style="vertical-align: middle;">'.$kq[3].'</td> 
                        <td style="vertical-align: middle;">'.$kq[4].'</td> 
                        <td style="vertical-align: middle;">'.$tt.' VND</td> </tr>';
        
                    $i++;
                    $sumqty += $kq[4];
                    unset($_SESSION['mybill']);
                } ?>
                <tbody>
                    <tr class="">
                        <td colspan="5">Tổng đơn hàng</td>
                        <td colspan="2"><?php echo $tong ?> VND</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="tongtien" value="<?php echo $tong ?>">
            <input type="hidden" name="sumqty" value="<?php echo $sumqty ?>">
        </div>
        <div class="m-auto">
            <h2 class="my-4 ps-5">Thông tin đặt hàng</h2>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ms-5">Người đặt hàng</label>
                <div class="col-sm-8">
                <input type="text" name="name" class="form-control" id="" value="<?= $name?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ms-5">Địa chỉ</label>
                <div class="col-sm-8">
                <input type="text" name="dc" class="form-control" id="" value="<?= $dc?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ms-5">Email</label>
                <div class="col-sm-8">
                <input type="text" name="email" class="form-control" id="" value="<?= $email?>">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="" class="col-sm-2 col-form-label ms-5">Số điện thoại</label>
                <div class="col-sm-8">
                <input type="text" name="sdt" class="form-control" id="" value="<?= $sdt?>">
                </div>
            </div>
            <div class="formpttt m-auto pb-5">
            <div class="ms-5 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pttt" value="1">
                <label class="form-check-label" >Thanh toán trực tiếp</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pttt" value="2">
                <label class="form-check-label" >Chuyển khoản</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pttt" value="3" >
                <label class="form-check-label">Thanh toán online</label>
            </div>
            </div>
        </div>
        
        
        <div class="ms-5"><button type="submit" name="dathang" class="m-2 btn btn-primary">Đồng ý đặt hàng</button></div>
    </form>
</div>
