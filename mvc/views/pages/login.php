<div class="bg-login">
    <div class="container slide row mx-auto">
        <div class="signin col-lg-6 col-sm-12 py-3 px-4 signin">
            <h3 class="text-center fs-2 fw-bolder ">ĐĂNG KÝ TÀI KHOẢN</h3>
            <form action="login/khachhangdangky" method="post">
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="user" placeholder="Tên đăng nhập" name="user" required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label text-white ">Password:</label>
                <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label text-white ">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Họ và tên:</label>
                <input type="text" class="form-control" id="name" placeholder="Họ tên" name="name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="ht" class="form-label text-white ">Số điện thoại:</label>
                <input type="text" class="form-control" id="number" placeholder="Địa chỉ" name="number" required>
            </div>
            <button type="submit" class="btn btn-danger" name="btnSignin">Đăng ký</button>
            </form>
        </div>
        <div class="login col-lg-6 col-sm-12 py-3 px-4 login">
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
            <div class="form-check mb-3 col-6 px-5">
                <input class="form-check-input" type="checkbox" name="remember"><span class="text-white">Remember me</span>
                </label>
            </div>
            <div class="mb-3 col-6 text-end">
                <a href="" class="text-primary p-3 text-decoration-none bg-transparent">Quên mật khẩu?</a>
            </div>
            </div>
            <button type="submit" class="btn btn-danger" name="btnLogin">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>
