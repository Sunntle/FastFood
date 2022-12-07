<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
class login extends controller{
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
                    $name = trim($_POST['name']);
                    $soDienThoai = $_POST['number'];
                    $pattern = "/^0\d{9}$/";
                    if(preg_match($pattern,$soDienThoai)) {
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
                    }else $thongbao = "Cập nhật không thành công !<br> Số điện thoại phải dài 10 chữ số !";
                    
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
                $countBILL = $this->billModel->CountAllBillByID($_SESSION['login']['maKH']);
                $perPage = 8;
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
                    "thongbao"=>$thongbao,
                    "currentPage"=>$currentPage,
                    "countSP"=> $pageCount, 
                    "billKH"=>$this->billModel->PhanTrangByID($_SESSION['login']['maKH'],$perPage,$offset),
                    "khachHang"=>$this->userModel->SelectUserByMaKH($_SESSION['login']['maKH']),
                    ],
                );
            }else{
                $countBILL = $this->billModel->CountAllBillByID($_SESSION['login']['maKH']);
                $perPage = 8;
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
                $loi .= " Chưa điền đủ thông tin !<br>";
            }else{
                $user = trim($_POST['user']);
                foreach($this->userModel->SelectUser($user) as $key){
                    if($key['user']==$user){
                        $loi .="Tài khoản đã có người sử dụng !<br>";
                        $dem =1;
                    }
                }
                $pass = $_POST['pw'];
                if(strlen($pass)<3){
                    $loi .="Mật khẩu phải dài hơn 3 ký tự !<br>";
                    $dem = 1;
                }
                $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $name = formatString($_POST['name']);
                $address = $_POST['address'];
                $number = $_POST['number'];
                $pattern = "/^0\d{9}$/";//check sdt 10 chu so hay khong
                $avt_default="./public/images/default_avatar.jpg";
                if(preg_match($pattern,$number)) {
                    if($dem==0){
                        if($this->userModel->InsertNewUser($user,$pass_hash,$email,$name,$address,$number,$avt_default)==null){
                            $thanhcong ="Đăng ký thành công !";
                        }
                    }
                }
                else $loi .= "Số điện thoại phải có 10 số !<br>";
            }
            if(isset($loi)&& $dem == 1){
                $this->view(
                    "layout",
                    [
                    "Pages"=>"login",
                    "thongbaoloi"=>$loi,
                    "user"=>$user,
                    "pass"=>$pass,
                    "email"=>$email,
                    "name"=>$name,
                    "address"=>$address,
                    "number"=>$number,
                    ],
                );
            }elseif(isset($loi)&& $dem == 0){
                $this->view(
                    "layout",
                    [
                    "Pages"=>"login",
                    "thongbaoloi"=>$thanhcong,
                    ],
                );
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
                                header("location: ./");
                                $_SESSION['login']=$key;
                                $_SESSION['login']['user']=$key['user'];
                                $_SESSION['login']['pass']=$key['matKhau'];
                                $_SESSION['login']['hoTen']=$key['tenKH'];
                                $_SESSION['login']['vaiTro']=$key['vaiTro'];
                                $_SESSION['login']['maKH']=$key['maKH'];
                            }else {
                                $loi = "Sai mật khẩu !";
                                
                            }
                    }
                }else $loi ="Sai tài khoản !";
            }
            if(isset($loi) && $loi !=""){
                $this->view(
                    "layout",
                    [
                    "Pages"=>"login",
                    "thongbao"=>$loi,
                    ],
                );
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
                        require './PHPMailer-master/src/Exception.php';
                        require './PHPMailer-master/src/PHPMailer.php';
                        require './PHPMailer-master/src/SMTP.php';
                        require './PHPMailer-master/src/POP3.php';
                        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;
                            $mail->CharSet = "utf-8";                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'huylgps20497@fpt.edu.vn';                     //SMTP username
                            $mail->Password   = 'kumyqxvittrfxzdi';                               //SMTP password
                            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                            $mail->setFrom('taile2608@gmail.com', 'ThreeGuysFastFood');
                            $mail->addAddress($key['email'], $key['tenKH']);     //Add a recipient   
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Đổi mật khẩu';
                            $mail->Body    = 'Xin chào '.$key['tenKH'].'!<br>Mật khẩu mới của bạn là: '.$pass;
                            $mail->send();
                            $loi = "Kiểm tra email để nhận mật khẩu mới!";
                        } catch (Exception $e) {
                            $loi = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
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