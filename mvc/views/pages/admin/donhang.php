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

?>
<div class="container">
<h2 class="py-3 text-uppercase text-center">Danh sách đơn hàng</h2>
    <table class="table">
    
    <thead>
        <tr>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Khách hàng</th>
        <th scope="col">Số lượng hàng</th>
        <th scope="col">Giá trị đơn hàng</th>
        <th scope="col">Tình trạng đơn hàng</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody class="centerBill">
        <?php foreach ($data['AllBill'] as $key){ 
            $ttdh = ttdh($key['status']);
        ?>            
        <tr>
        <th scope="row">NON-<?= $key['id']?></th>
        <td ><?= $key['name']?></td>
        <td><?= $key['sl'] ?></td>
        <td><?= number_format($key['total'])?> đ</td>
        <td> <?= $ttdh?> </td>
        <td class="btn_suaxoa p"><button class="btn btn-success"><a class="text-light nav-link" href="/live/admin/donhang/editdonhang&id=<?=$key['id']?>">Sửa</a></button>
                     <button class="btn btn-danger"><a href="/live/admin/donhang/dell&id=<?=$key['id']?>" class="text-light nav-link">Xóa</a></button>
        </td>
        </tr>
        <?php }?>
    </tbody>
    </table>
</div>