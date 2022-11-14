<?php
class hanghoa extends controller{
    public $loaiModel;
    public $hangHoaModel;
    public function __construct()
    {
        $this->loaiModel = $this->model("loaiModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
    }
    public function SayHi(){
        $this->view(
            "layout1",
            [
            "Pages"=> "listhanghoa",
            "listAll"=>$this->hangHoaModel->listAllSanPham(),
            "listLoai"=>$this->loaiModel->listAll(),
            ],
        );
    }
    public function SuaHangHoa(){
        $this->view(
            "layout1",
            [
            "Pages"=> "edithanghoa",
            "SelectHangHoa"=>$this->hangHoaModel->SelectProductID($_POST['maHangHoa']),
            "listLoai"=>$this->loaiModel->listAll(),
            ],
        );
    }
    public function ThemHangHoa(){
        $thongbao ="";
        if(isset($_POST['btn-update'])){
            $dem = 0;
            if(strlen($_POST['tenHangHoa'])==0||strlen($_POST['gia'])==0||strlen($_POST['moTa'])==0||strlen($_POST['soLuong'])==0){
                $thongbao ="Chưa diền đủ các trường !";
            }else{
                $tenHangHoa = $_POST['tenHangHoa'];
                foreach($this->hangHoaModel->SelectSpByTenSp($tenHangHoa) as $key){
                    if($key['tenHangHoa']==$tenHangHoa){
                        $dem = 1;
                        if($_POST['gia']==$key['gia']&&$_POST['maLoai']==$key['maLoai'])
                        $dem =2;
                        $soLuong = $_POST['soLuong']+$key['soLuong'];
                        if($this->hangHoaModel->UpdateCountSp($soLuong,$key['maHangHoa'])==null){
                            $thongbao = "Cập nhật số lượng thành công !";
                        }else $thongbao = "Cập nhật số lượng thất bại !";
                    };
                }
                if($dem == 0){
                    $gia = $_POST['gia'];
                    $moTa = $_POST['moTa'];
                    $soLuong = $_POST['soLuong'];
                    $maLoai = $_POST['maLoai'];
                    $hinhanhpath = basename($_FILES['hinh']['name']);
                    if(!($hinhanhpath=="")){
                        $target_dir = "./public/images/";
                        $target_file = $target_dir.$hinhanhpath;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        $this->hangHoaModel->InsertHangHoa($tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong);
                        $thongbao = "Cập nhật thành công thông tin và hình ảnh hàng hóa !";
                    }else if($hinhanhpath=="") {
                        $thongbao = "Chưa tải ảnh hàng hóa lên !";
                    };
                }elseif($dem==1){
                    $thongbao = "Tên hàng hóa này đã có trong danh sách !";
                }
                
            }
           }
        $this->view(
            "layout1",
            [
                "Pages"=>"inserthanghoa",
                "listLoai"=>$this->loaiModel->listAll(),
                "thongbao"=>$thongbao,
            ],
        );
    }
    public function CapNhatHangHoa(){
        if(isset($_POST['btn-add'])){
            $maHangHoa = $_POST['maHangHoa'];
            if(strlen($_POST['tenHangHoa'])==0||strlen($_POST['gia'])==0||strlen($_POST['soLuong'])==0){
                $thongbao ="Chưa điền đầy đủ các trường !";
            }else{
                $tenHangHoa = $_POST['tenHangHoa'];
                $gia = $_POST['gia'];
                $soLuong = $_POST['soLuong'];
                $maLoai = $_POST['maLoai'];
                $moTa = $_POST['moTa'];
                $hinhanhpath = basename($_FILES['hinh']['name']);
                if(!($hinhanhpath=="")){
                    $target_dir = "./public/images/";
                    $target_file = $target_dir.$hinhanhpath;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $this->hangHoaModel->UpdateSp($tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong,$maHangHoa);
                    $thongbao = "Cập nhật thành công tên loại và hình ảnh loại !";
                }else if($hinhanhpath=="") {
                    $this->hangHoaModel->UpdateSpNoImg($tenHangHoa,$gia,$moTa,$maLoai,$soLuong,$maHangHoa);
                    $thongbao = "Cập nhật thành công tên loại !";
                }
                
            }
           }
           $this->view(
            "layout1",
            [
                "Pages"=>"edithanghoa",
                "SelectHangHoa"=>$this->hangHoaModel->SelectProductID($_POST['maHangHoa']),
                "listLoai"=>$this->loaiModel->listAll(),
                "thongbao"=>$thongbao,
            ],
            );
    }
    public function XoaHangHoa(){
        $this->hangHoaModel->DeleteHangHoa($_GET['maHangHoa']);
        header("location: ./");
    }
}
?>