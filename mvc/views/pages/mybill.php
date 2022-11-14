
<?php
function ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang giao hàng";
            break;
        case '2':
            $tt = "Hoàn tất";
            break;
        default:
            break;
    }
    return $tt;
}
function pttt($n)
{
    switch ($n) {
        case '1':
            $tt = "Thanh toán trực tiếp";
            break;
        case '2':
            $tt = "Chuyển khoảng";
            break;
        case '3':
            $tt = "Thanh toán online";
            break;
        default:
            break;
    }
    return $tt;
}


foreach ($data['Hoadon'] as $bill){
    
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
<div class="container">
    <div class="boxdh2 m-auto">
        <h2 class="my-4 ps-5">Cảm ơn đã đặt hàng thông tin đơn hàng của bạn.</h2><hr>
        <div class="mb-3">
            <ul class="list-group p-2">
                <li class="list-group-item">Người đặt hàng : <?= $bill['name'] ?></li>
                <li class="list-group-item">Địa chỉ : <?= $bill['diaChi'] ?></li>
                <li class="list-group-item">Số điện thoại : <?= $bill['sdt'] ?></li>
                <li class="list-group-item">Email : <?= $bill['email'] ?></li>
                <li class="list-group-item">Mã đơn hàng : NON-<?= $bill['id'] ?> </li>
                <li class="list-group-item">Ngày đặt hàng : <?= $bill['ngay'] ?></li>
                <li class="list-group-item">Số lượng sản phẩm : <?= $data['count']; ?></li>
                <li class="list-group-item">Tổng đơn hàng : <?= number_format($bill['total']) ?></li>
                <li class="list-group-item">Phương thức thanh toán : <?= pttt($bill['pttt']) ?></li>    
                <li class="list-group-item">Tình trang đơn hàng : <?= ttdh($bill['status']) ?></li>    

            </ul>
        </div>
        
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
            foreach ($_SESSION['vohang'] as $kq){ 
                $tt = $kq[3] * $kq[4];
                $tong += $tt;
                echo '<tr>
                        <td>'. ($i+1) .'</td>
                    
                    <td> <img style="width:30%" src="'.$kq[2].'"> </td> 
                    <td style="vertical-align: middle;">'.$kq[1].'</td> 
                    <td style="vertical-align: middle;">'.$kq[3].'</td> 
                    <td style="vertical-align: middle;">'.$kq[4].'</td> 
                    <td style="vertical-align: middle;">'.number_format($tt).' VND</td> </tr>';
    
                $i++;
            } 
            $add = array($bill['id'],$bill['ngay'],$data['count'],$bill['total']);
            if (!isset($_SESSION['mybill'])) {
                $_SESSION['mybill']= array();
            }
            array_push($_SESSION['mybill'], $add);
            unset($_SESSION['vohang']);
            ?>

        </table>
    </div>
</div>