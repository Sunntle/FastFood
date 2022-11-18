<?php 
    if($data['Pages']=="account"){
        echo ' <script>
        $(document).ready(function (){
            $( ".nav-item a" ).removeClass( "text-white" ).addClass( "text-dark" );
            $("button i").removeClass( "text-white" ).addClass( "text-dark" );
            $("a i").removeClass( "text-white" ).addClass( "text-dark" );
        });
    </script> ';
    }
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

<div class="container slide">
<div class=""><?php if(isset($data['thongbao'])) echo "<div class='text-center my-2 text-danger fw-bolder'>".$data['thongbao']."</div>" ?></div>
    <div class="row">
            <?php
            foreach($data['khachHang'] as $value){
            ?>
            <div class="col-md-4 col-sm-12">
                <div class="text-center mb-3">
                    <img src="<?=$value['hinh']?>" alt="avatar" class="img-fluid rounded-circle">
                    <p class="fs-4 my-1"><?=$value['tenKH']?></p>
                    <p>
                        <?php 
                            if($value['vaiTro']==1){
                                echo "Quản trị viên";
                            }else if($value['vaiTro']==0){
                                echo "Khách hàng";
                            }
                        ?>
                    </p>
                </div>
                <div class="change-update row bg-light rounded shadow-sm p-4">
                    <button class="text-dark bg-transparent border-0 bg-transparent"  onclick="openTab('donhang')">
                        <div class="d-flex align-items-center justify-content-around my-2 ">
                            <p class="m-0 text-start">Đơn hàng</p>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </button>
                    <button class="text-dark bg-transparent border-0" onclick="openTab('account')" id="defaultOpen">
                        <div class="d-flex align-items-center justify-content-around my-2 ">
                            <p class="m-0 text-start">Account</p>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </button>
                    <button class="text-dark bg-transparent border-0 bg-transparent" onclick="openTab('changepw')">
                        <div class="d-flex align-items-center justify-content-around my-2 ">
                            <p class="m-0 text-start">Change Password</p>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </button>
                    <?php
                    if($value['vaiTro']==1){
                    ?>
                    <button class="text-dark border-0 bg-transparent" onclick="location.assign('admin/index.php')">
                        <div class="d-flex align-items-center justify-content-around my-2 ">
                        <p class="m-0 text-start">Vào trang quản trị</p>
                        <i class="fa-solid fa-house"></i>
                        </div>
                    </button>
                    <?php
                    }
                    ?>
                    <button class="text-dark border-0 bg-transparent">
                        <div class="d-flex align-items-center justify-content-around my-2 ">
                            <a href="login/KhachHangDangXuat" class="btn btn-primary fs-5 rounded">Đăng xuất</a>
                        </div>
                    </button>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 food" id="donhang">
                <h2 class="py-3 text-uppercase text-center">Danh sách đơn hàng</h2>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Số lượng hàng</th>
                        <th scope="col">Giá trị đơn hàng</th>
                        <th scope="col">Tình trạng đơn hàng</th>
                        <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="centerBill">
                        <?php foreach ($data['billKH'] as $key){ 
                            
                            $ttdh = ttdh($key['status']);
                            
                        ?>            
                        <tr>
                            <th scope="row"><a class="text-dark bg-light" href="/live/billKH/SayHi&id=<?= $key['id']?>">NON-<?= $key['id']?></a>           
                        </th>
                            <td><?= $key['sl'] ?></td>
                            <td><?= number_format($key['total'])?> đ</td>
                            <td> <?=$ttdh?> </td>
                            <td class="btn_suaxoa p">
                                <button class="btn btn-danger"><a href="/live/billKH/dell&id=<?=$key['id']?>" class="text-light nav-link">Hủy</a></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-8 col-sm-12 food" id="account" style="display:none">
                <h2 class="text-center">Account</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label fs-5">Tên đăng nhập:</label>
                        <input type="text" class="form-control" id="user" name="user" disabled value="<?=$value['user']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label fs-5">Họ và tên:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$value['tenKH']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label fs-5">Email:</label>
                        <input type="email" class="form-control" id="email"name="email" disabled value="<?=$value['email']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label fs-5">Số điện thoại:</label>
                        <input type="text" class="form-control" id="number"name="number" value="<?=$value['soDienThoai']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label fs-5">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?=$value['diaChi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label fs-5">Hình:</label>
                        <input type="file" class="form-control" id="hinh" name="hinh">
                    </div>
                    <input type="hidden" name="maKH" value="<?=$value['maKH']?>">
                    <button type="submit" name="btn-update" class="btn btn-danger fs-5">Update Account</button>
                </form>
            </div>
            <div class="col-md-8 col-sm-12 food" id="changepw" style="display:none">
                <h2 class="text-center">Change Password</h2>
                <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="cur-pswd" class="form-label fs-5">Mật khẩu hiện tại:</label>
                    <input type="password" class="form-control" id="cur-pswd" name="cur-pswd" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="new-pswd" class="form-label fs-5">Mật khẩu mới:</label>
                    <input type="password" class="form-control" id="new-pswd" name="new-pswd" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="re-new-pswd" class="form-label fs-5">Xác nhận mật khẩu:</label>
                    <input type="password" class="form-control" id="re-new-pswd" name="re-new-pswd" required>
                </div>
                <input type="hidden" name="maKH" value="<?=$value['maKH']?>">
                <button type="submit" name="btn-update-pass" class="btn btn-danger fs-5">Confirm</button>
                </form>
            </div>
            <?php }
            ?>
    </div>
</div>