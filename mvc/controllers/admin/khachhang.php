<?php
class khachhang extends controller{
    public $userModel;
    public $binhLuanModel;
    public $billModel;
    public function __construct()
    {
        $this->userModel = $this->model("userModel");
    }
    public function SayHi(){
        $this->view(
            "layout1",
            [
            "Pages"=> "listkhachhang",
            "listAll"=>$this->userModel->listAll(),
            ],
        );
    }
    public function SuaKH(){
        $this->view(
            "layout1",
            [
                "Pages"=>"editkhachhang",
                "SelectKH"=>$this->userModel->SelectUserByMaKH($_POST['maKH']),
            ],
        );
    }
    public function XoaKH(){
        $this->binhLuanModel = $this->model("binhLuanModel");
        // $this->billModel = $this->model("billModel");
        // foreach($this->billModel->SelectBillByMaKH($_GET['maKH']) as $key){
        //     $this->billModel->dellIdCart($key['id']);
        // }
        $this->binhLuanModel->DeleteBLBYMaKH($_GET['maKH']);
        $this->userModel->DeleteKH($_GET['maKH']);
        header("location: ./");
    }
    public function CapNhatKH(){
        if(isset($_POST['btn-add'])){
            $maKH = $_POST['maKH'];
            if(strlen($_POST['tenKH'])==0||strlen($_POST['email'])==0||strlen($_POST['matKhau'])==0){
                $thongbao ="Không được bỏ trống các trường !";
            }else{
                $tenKH = $_POST['tenKH'];
                $email = $_POST['email'];
                $matKhau = $_POST['matKhau'];
                $pass_hash = password_hash($matKhau, PASSWORD_DEFAULT);
                $vaiTro = $_POST['vaiTro'];
                $diaChi = $_POST['diaChi'];
                $soDienThoai = $_POST['number'];
                $hinhanhpath = basename($_FILES['hinh']['name']);
                if(!($hinhanhpath=="")){
                    $target_dir = "./public/images/";
                    $target_file = $target_dir.$hinhanhpath;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $this->userModel->UpdateKH($tenKH,$soDienThoai,$email,$pass_hash,$vaiTro,$diaChi,$target_file,$maKH);
                    $thongbao = "Cập nhật thành công thông tin khách hàng !";
                }else if($hinhanhpath=="") {
                    $this->userModel->UpdateKHNoImg($tenKH,$soDienThoai,$email,$pass_hash,$vaiTro,$diaChi,$maKH);
                    $thongbao = "Cập nhật thành công thông tin khách hàng không hình ảnh !";
                };
            }
           }
           $this->view(
            "layout1",
            [
                "Pages"=>"editkhachhang",
                "SelectKH"=>$this->userModel->SelectUserByMaKH($_POST['maKH']),
                "thongbao"=>$thongbao,
            ],
        );
    }
    public function ThemKH(){
        $thongbao ="";
        if(isset($_POST['btn-update'])){
            $dem = 0;
            if(strlen($_POST['tenKH'])==0||strlen($_POST['email'])==0||strlen($_POST['matKhau'])==0){
                $thongbao ="Không được bỏ trống các trường !";
            }else{
                $tenKH = $_POST['tenKH'];
                $email = $_POST['email'];
                $matKhau = $_POST['matKhau'];
                $diaChi = $_POST['diaChi'];
                $pass_hash = password_hash($matKhau,PASSWORD_DEFAULT);
                $user = $_POST['user'];
                foreach($this->userModel->SelectUser($user) as $key){
                    if($key['user']==$user){
                        $thongbao =" Tài khoản đã có người sử dụng !";
                        $dem =1;
                    }
                }
                if($dem==0){
                    $vaiTro = $_POST['vaiTro'];
                    $hinhanhpath = basename($_FILES['hinh']['name']);
                    if(!($hinhanhpath=="")){
                        $target_dir = "./public/images/";
                        $target_file = $target_dir.$hinhanhpath;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        $this->userModel->InsertKH($tenKH,$email,$user,$pass_hash,$target_file,$vaiTro,$diaChi);
                        $thongbao = "Thêm thành công thông tin và hình ảnh khách hàng !";
                    }else if($hinhanhpath=="") {
                        $avt_default="./public/images/default_avatar.jpg";
                        $this->userModel->InsertKH($tenKH,$email,$user,$pass_hash,$avt_default,$vaiTro,$diaChi);
                        $thongbao = "Cập nhật thành công thông tin khách hàng!";
                    };
                }
            }
           }
        $this->view(
            "layout1",
            [
                "Pages"=>"insertkhachhang",
                "thongbao"=>$thongbao,
            ],
        );
    }
}
?>