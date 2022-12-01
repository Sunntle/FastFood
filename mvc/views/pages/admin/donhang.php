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
        <?php foreach ($data['phantrang'] as $key){ 
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
        <td class="btn_suaxoa p"><button class="btn btn-success"><a class="text-light nav-link" href="./donhang/editdonhang&id=<?=$key['id']?>">Sửa</a></button>
                     <button class="btn btn-danger"><a href="./donhang/dell&id=<?=$key['id']?>" class="text-light nav-link">Xóa</a></button>
        </td>
        </tr>
        <?php }?>
    </tbody>
    </table>
</div>
<nav class=" w-100 pt-5  ">
    <ul class="d-flex justify-content-center pagination">
        <?php if($data['currentPage']>2){
            $first = 'href="./donhang/SayHi/1"';
        ?>
        <li class="page-item ">
            <a class="page-link text-dark bg-light" <?= $first?> >FIRST</a>
        </li>
            <?php } ?>

        <?php if($data['currentPage'] > 1){ 
            $prev = $data['currentPage'] -1;?>
            <li class="page-item ">
                <a class="page-link text-dark bg-light" href="./donhang/SayHi/<?=$prev?>"><<</a>
            </li>
        <?php } ?>


        <?php for($i = 1; $i <= $data['countSP']; $i++) {
                if ($i != $data['currentPage'] ){ 
                    if(($i > $data['currentPage'] -3) && ($i<$data['currentPage'] + 3)){
                        $url = $i;
                        if (isset($data['key']) ){
                            echo $data['key'];
                            $url .= "/".$data['key'];
                        }
                        ?> 
                    <li class="page-item ">
                        <a class="page-link text-dark bg-light shadow" href="./donhang/SayHi/<?= $url?>"><?=$i?></a>
                    </li>
                <?php }
                } else{ ?>
                    <a class="page-link text-light bg-dark " href="./donhang/SayHi/<?=$i?>"><?=$i?></a>
                <?php }
        } ?>
        <?php if($data['currentPage'] < ($data['countSP']-1)){ 
            $next = $data['currentPage']+1; ?>
            <li class="page-item ">
                <a class="page-link text-dark bg-light" href="./donhang/SayHi/<?=$next?>">>></a>
            </li>
        <?php } ?>

        <?php if($data['currentPage'] < ($data['countSP']-2)){ 
            $end = $data['countSP'] ;?>
                <li class="page-item">
                    <a class="page-link text-dark bg-light" href="./donhang/SayHi/<?= $data['countSP'] ?>">LAST</a>
                </li>
            <?php } ?>
    </ul>
</nav>