<div class="bg-login">
    <div class="slide container d-flex align-items-center justify-content-center mx-auto">
    <div class="w-50">
            <h3 class="text-center fs-2 fw-bolder">Quên mật khẩu</h3>
            <form action="" method="post">
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="user" placeholder="Tên đăng nhập" name="user" required>
            </div>
            <?php if(isset($data['Thongbao'])) {
                echo "<div class='text-warning fw-bolder'><p>".$data['Thongbao']."</p></div>";
            } ?>
            <button type="submit" class="btn btn-danger" name="btnFgpw">Gửi</button>
            </form>
        </div>
    </div>
</div>