<?php
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
?>


<div class="container">
    <h2 class="theh2-form py-3 text-uppercase text-center">Chỉnh sửa thông tin hóa đơn khách hàng</h2>

    <form action="donhang/update" method="POST" >
        <?php foreach ($data['idbill'] as $key){ 
            
        ?> 
        <table class="table">  
            <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Số lượng hàng</th>
                    <th scope="col">Giá trị đơn hàng</th>
                    
                </tr>
            </thead>                       
            <tr>
                <th scope="row">NON-<?= $key['id']?></th>
                <td ><?= $key['name']?></td>
                <td><?= $key['sl'] ?></td>
                <td><?= number_format($key['total'])?> đ</td>               
            </tr>
            
        </table>
        
        <select class="form-select " name="status">
            <option value="0" <?php if($key['status']==0) echo "selected" ?> >Đơn hàng mới</option>
            <option value="1" <?php if($key['status']==1) echo "selected" ?> >Đang giao hàng</option>
            <option value="2" <?php if($key['status']==2) echo "selected" ?> >Hoàn tất</option>
        </select>
        <?php }?>
        <div class="form-group py-3 dsbtn">
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
        <input type="submit" name="btn-add" class="btn btn-primary" value="Cập nhật">
            <input type="reset" class="btn btn-danger" value="Nhập lại">
            <a href="/live/admin/donhang" class="btn btn-success">Danh sách</a>
        </div>
    </form>
    
</div>