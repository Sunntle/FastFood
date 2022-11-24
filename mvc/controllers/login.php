<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
class login extends controller{
    //model
    public $userModel;
    public $billModel;
    public function __construct()
    {
        $this->userModel = $this->model("userModel");
        $this->billModel = $this->model("billModel");
    }
    function SayHi(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['btn-update'])){
                $thongbao ="";
                $maKH = $_POST['maKH'];
                if(strlen($_POST['name'])==0||strlen($_POST['number'])==0||strlen($_POST['address'])==0){
                    $thongbao ="Bạn chưa điền đầy đủ thông tin !";
                }else{
                    $name = $_POST['name'];
                    $soDienThoai = $_POST['number'];
                    $diaChi = $_POST['address'];
                    $hinhanhpath = basename($_FILES['hinh']['name']);
                    if(!($hinhanhpath=="")){
                        $target_dir = "./public/images/";
                        $target_file = $target_dir.$hinhanhpath;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        $this->userModel->UpdateKHByUser($name,$soDienThoai,$diaChi,$target_file,$maKH);
                        $thongbao = "Cập nhật thành công thông tin khách hàng !";
                    }else if($hinhanhpath=="") {
                        $this->userModel->UpdateKHByUserNoImg($name,$soDienThoai,$diaChi,$maKH);
                        $thongbao = "Cập nhật thành công thông tin khách hàng không hình ảnh !";
                    };
                }
                
            }
            if(isset($_POST['btn-update-pass'])){
                $thongbao ="";
                $maKH = $_POST['maKH'];
                if(strlen($_POST['cur-pswd'])==0||strlen($_POST['new-pswd'])==0||strlen($_POST['re-new-pswd'])==0){
                    $thongbao ="Bạn chưa điền đầy đủ thông tin !";
                }else{
                    $pass = $_POST['cur-pswd'];
                    if($this->userModel->SelectUserByMaKH($maKH)){
                        foreach($this->userModel->SelectUserByMaKH($maKH) as $key){
                            if(password_verify($pass,$key['matKhau'])){
                                $newpass = $_POST['new-pswd'];
                                $renewpass = $_POST['re-new-pswd'];
                                if($newpass==$renewpass){
                                    $newpass = password_hash($newpass,PASSWORD_DEFAULT);
                                    $this->userModel->UpdatePass($newpass,$maKH);
                                    $thongbao = "Cập nhật thành công !";
                                }else{
                                    $thongbao = "Cập nhật thất bại !<br>Hai mật khẩu mới không trùng nhau !";
                                }
                            }else{
                                $thongbao = "Cập nhật thất bại !<br>Sai mật khẩu hiện tại !";
                            }
                        }
                    }
                }
                
            }
            if(isset($thongbao)) {
                $this->view(
                    "layout",
                    [
                    "Pages"=>"account",
                    "thongbao"=>$thongbao,
                    "billKH"=>$this->billModel->SelectBillByStatus($_SESSION['login']['maKH']),
                    "khachHang"=>$this->userModel->SelectUserByMaKH($_SESSION['login']['maKH']),
                    ],
                );
            }else{
                
                $countBILL = $this->billModel->CountAllBillByID($_SESSION['login']['maKH']);
                $perPage = 5;
                $pageCount = (int) ceil($countBILL / $perPage); 
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $currentPage = $page;
                $offset =  ($currentPage - 1) * $perPage;
                $this->view(
                    
                    "layout",
                    [
                    "Pages"=>"account",
                    // "billKH"=>$this->billModel->SelectBillByStatus($_SESSION['login']['maKH']),
                    "currentPage"=>$currentPage,
                    "countSP"=> $pageCount, 
                    "billKH"=>$this->billModel->PhanTrangByID($_SESSION['login']['maKH'],$perPage,$offset),
                    "khachHang"=>$this->userModel->SelectUserByMaKH($_SESSION['login']['maKH']),
                    ],
                );
            }
            
        }else{
            $this->view(
                "layout",
                [
                "Pages"=>"login",
                ],
            );
        }
        
    }
    function KhachHangDangKy(){
        if(isset($_POST['btnSignin'])){
            $dem =0;
            $loi = "";
            if(strlen($_POST['user'])==0 || strlen($_POST['pw'])==0 ||strlen($_POST['pw'])==0||strlen($_POST['email'])==0||strlen($_POST['name'])==0 || strlen($_POST['address'])==0 ||strlen($_POST['number'])==0) {
                $loi = "Chưa điền đủ thông tin !";
            }else {
                $user = $_POST['user'];
                foreach($this->userModel->SelectUser($user) as $key){
                    if($key['user']==$user){
                        $loi =" Tài khoản đã có người sử dụng !";
                        $dem =1;
                    }
                }
                if($dem==0){
                    $pass = $_POST['pw'];
                    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $number = $_POST['number'];
                    if($this->userModel->InsertNewUser($user,$pass_hash,$email,$name,$address,$number)==null){
                        $loi ="Đăng ký thành công !";
                    }
                }
            }
            if(isset($loi) && $loi !=""){
                echo "
                <div class='alert alert-success p-4 w-25 rounded text-center my-5 mx-auto'>".$loi."
                <div><a href='../home' class='btn btn-info text-white mt-3'>Trang chủ</a></div>
                </div>
                ";
            }
        }
    }
    function KhachHangDangNhap(){
        if(isset($_POST['btnLogin'])){
            $loi = "";
            if(strlen($_POST['user'])==0 || strlen($_POST['pw'])==0) {
                $loi = "Chưa điền đủ thông tin !";
            }else {
                $user = $_POST['user'];
                $pass = $_POST['pw'];
                if($this->userModel->SelectUser($user)){
                    foreach($this->userModel->SelectUser($user) as $key){
                            if(password_verify($pass,$key['matKhau'])){
                                echo "
                                <div class='alert alert-success p-2 w-25 rounded text-center my-5 mx-auto'>Đăng nhập thành công !
                                <div><a href='../home' class='btn btn-info text-dark my-2'>Trang chủ</a></div>
                                </div>
                                ";
                                $_SESSION['login']=$key;
                                $_SESSION['login']['user']=$key['user'];
                                $_SESSION['login']['pass']=$key['matKhau'];
                                $_SESSION['login']['hoTen']=$key['tenKH'];
                                $_SESSION['login']['vaiTro']=$key['vaiTro'];
                                $_SESSION['login']['maKH']=$key['maKH'];
                            }else echo "
                            <div class='alert alert-danger p-2 w-25 rounded text-center my-5 mx-auto'>Sai mật khẩu !
                            <div><a href='../home' class='btn btn-success text-dark my-2'>Trang chủ</a>
                            <a onclick='history.back()' class='btn btn-danger text-dark my-2'>Quay về</a>
                            </div>  
                            </div>
                            ";
                    }
                }else $loi ="Sai tài khoản";
            }
            if(isset($loi) && $loi !=""){
                echo "
                <div class='alert alert-danger p-2 w-25 rounded text-center my-5 mx-auto'>".$loi."
                <div><a onclick='history.back();' class='btn btn-danger text-white my-2'>Trở lại</a></div>
                </div>
                ";
            }
        }
    }
    function KhachHangDangXuat(){
        unset($_SESSION['login']);
        header("location: ../home");
    }
    function QuenMatKhau(){
        if(isset($_POST['btnFgpw'])){
            $loi = "";
            if(strlen($_POST['user'])==0) {
                $loi = "Chưa điền đủ thông tin !";
            }else{
                $user = $_POST['user'];
                if($this->userModel->SelectUser($user)!=null){
                    $pass = rand();
                    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
                    foreach($this->userModel->SelectUser($user) as $key){
                        $this->userModel->UpdatePass($pass_hash,$key['maKH']);
                        $loi = "Kiểm tra email để nhận mật khẩu mới!";
                    }
                }else {
                    $loi ="Sai tài khoản !";
                }
            }
            $this->view(
                "layout",
                [
                "Pages"=>"forgotpw",
                "Thongbao"=>$loi,
                ],
            );
        }
        $this->view(
            "layout",
            [
            "Pages"=>"forgotpw",
            ],
        );
    }
}
?>