<h2 class="py-3 text-uppercase text-center">Danh sách hàng hóa</h2>
<div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-3">Hàng hóa</div>
            <div class="col-2">Số BL</div>
            <div class="col-3">Mới nhất</div>
            <div class="col-3">Cũ nhất</div>
            <div class="col-1"></div>
        </div>
</div>
<?php
    $arr[] = "";
    for($j=1;$j<sizeof($data['arr']);$j++){
        for($i=0; $i<sizeof($data['arr'][$j]); $i++){
            $arr[$i]=$data['arr'][$j][$i];
        }
?>
    <div class="row align-items-center my-2 text-center">
        <div class="row align-items-center my-2 text-center">
            <div class="col-3"><?=$arr[0]?></div>
            <div class="col-2"><?=$arr[1]?></div>
            <div class="col-3"><?=$arr[2]?></div>
            <div class="col-3"><?=$arr[3]?></div>
            <div class="col-1">
                <form action="binhluan/ChiTietBinhLuan" method="post">
                    <input type="hidden" name="maBL" value="<?=$arr[4]?>">
                    <input type="submit" class="btn btn-info col-12" value="Chi tiết"></input>
                </form>
            </div>
        </div>
    </div>
<?php
 }
?>