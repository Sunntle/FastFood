<?php 
function ttdh($n){
    switch ($n){
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
function huydh($status,$n,$key){
    $tt ="";
    if($status == 3){
       return $tt;
    }else{

        switch ($n){           
            case '1':
                $tt = '<a class="text-primary text-decoration-none" href="/live/admin/donhang/huybill/2/'.$key.'">Hủy đơn hàng</a>';
                break;
            case '2':
                $tt = "Hủy thành công";
                break;
            default:
                break;
        }
        return $tt;
    }
}
?>
<div class="container">
<h2 class="py-3 text-uppercase text-center">Danh sách đơn hàng</h2>
    <table class="table">
    
    <thead>
        <tr>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Khách hàng</th>
        <th scope="col">Số lượng </th>
        <th scope="col">Giá trị đơn hàng</th>
        <th scope="col">Trạng thái đơn hàng</th>
        <th scope="col">Thao tác</th>
        <th scope="col">Cập nhật </th>
        </tr>
    </thead>
    <tbody class="centerBill">
        <?php foreach ($data['AllBill'] as $key){ 
            $ttdh = ttdh($key['status']);
            $huybill = huydh($key['status'],$key['unBill'],$key['id']);
        ?>            
        <tr>
        <th scope="row">NON-<?= $key['id']?></th>
        <td ><?= $key['name']?></td>
        <td><?= $key['sl'] ?></td>
        <td><?= number_format($key['total'])?> đ</td>
        <td> <?= $ttdh?> </td>
        <td> <?= $huybill?> </td>
        <td class="btn_suaxoa p"><button class="btn btn-success"><a class="text-light nav-link" href="/live/admin/donhang/editdonhang&id=<?=$key['id']?>">Sửa</a></button>
                     <button class="btn btn-danger"><a href="/live/admin/donhang/dell&id=<?=$key['id']?>" class="text-light nav-link">Xóa</a></button>
        </td>
        </tr>
        <?php }?>
    </tbody>
    </table>
</div>