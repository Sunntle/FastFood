<div class="bg-login">
    <div class="container slide row mx-auto">
        <?php if(!isset($_POST['showDangKy'])){ ?>
        <div class="signin col-lg-6 col-sm-12 py-3 px-4 signin d-flex align-items-center ">
            <form action="./login" method="post">
            <div class="text-start fs-2 text-white">Bạn chưa có tài khoản ?<br><input class="border-0 bg-transparent p-0" type="submit" value="Đăng ký ngay!" name="showDangKy"></div>
            </form>
        </div>
        <div class="login col-lg-6 col-sm-12 py-3 px-4">
            <h3 class="text-center fs-2 fw-bolder ">ĐĂNG NHẬP</h3>
            <form action="login/khachhangdangnhap" method="post">
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="user" placeholder="Tên đăng nhập" name="user" required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label text-white">Password:</label>
                <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" required>
            </div>
            <div class="row">
            <div class="form-check col-6 px-5">
                <input class="form-check-input" type="checkbox" name="remember"><span class="text-white">Remember me</span>
                </label>
            </div>
            <div class="col-6 text-end">
                <a href="login/QuenMatKhau" class="text-primary p-3 text-decoration-none bg-transparent">Quên mật khẩu?</a>
            </div>
            </div>
            <?php if(isset($data['thongbao'])) { ?>
            <div class="text-warning fw-bolder p-2"><?=$data['thongbao']?></div>
            <?php }
            ?>
            <button type="submit" class="btn btn-danger" name="btnLogin">Đăng nhập</button>
            </form>
        </div>
        <?php }else{ ?>
        <div class="signin col-lg-6 col-sm-12 py-3 px-4 signin d-flex align-items-center ">
            <form action="./login" method="post">
            <div class="text-start fs-2 text-white">Bạn đã có tài khoản <br><input class="border-0 bg-transparent p-0" type="submit" value="Đăng nhập ngay!"></div>
            </form>
        </div>
        <div class="login col-lg-6 col-sm-12 py-3 px-4">
            <h3 class="text-center fs-2 fw-bolder ">ĐĂNG KÝ TÀI KHOẢN</h3>
            <form action="login/khachhangdangky" method="post">
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="user" placeholder="Tên đăng nhập" name="user" required <?php if(isset($data['user'])) echo "value='".$data['user']."'";?>>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label text-white ">Password:</label>
                <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" required <?php if(isset($data['pass'])) echo "value='".$data['pass']."'";?>>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label text-white ">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required <?php if(isset($data['email'])) echo "value='".$data['email']."'";?>>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Họ và tên:</label>
                <input type="text" class="form-control" id="name" placeholder="Họ tên" name="name" required <?php if(isset($data['name'])) echo "value='".$data['name']."'";?>>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address" required <?php if(isset($data['address'])) echo "value='".$data['address']."'";?>>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Số điện thoại:</label>
                <input type="text" class="form-control" id="number" placeholder="Số điện thoại" name="number" required <?php if(isset($data['number'])) echo "value='".$data['number']."'";?>>
            </div>
            <?php if(isset($data['thongbaoloi'])) { ?>
            <div class="text-warning fw-bolder pb-2"><?=$data['thongbaoloi']?></div>
            <?php }
            ?>
            <input type="hidden" name="showDangKy">
            <button type="submit" class="btn btn-danger" name="btnSignin">Đăng ký</button>
            </form>
        </div>
        <?php } ?>
        
    </div>
</div>
