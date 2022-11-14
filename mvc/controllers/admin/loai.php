<?php 
class loai extends controller{
    public $loaiModel;
    public $hangHoaModel;
    public function __construct()
    {
        $this->loaiModel = $this->model("loaiModel");
    }
    public function SayHi(){
        $this->view(
            "layout1",
            [
                "Pages"=>"loai",
                "listAll"=>$this->loaiModel->listAll(),
            ],
        );
    }
    public function SuaLoai(){
        $this->view(
            "layout1",
            [
                "Pages"=>"editloai",
                "SelectLoai"=>$this->loaiModel->SelectLoaiByID($_POST['maLoai']),
            ],
        );
    }
    public function CapNhatLoai(){
       if(isset($_POST['btn-add'])){
        $maLoai = $_POST['maLoai'];
        if(strlen($_POST['tenLoai'])==0){
            $thongbao ="Tên loại không được bỏ trống !";
        }else{
            $tenLoai = $_POST['tenLoai'];
            $hinhanhpath = basename($_FILES['hinh']['name']);
            if(!($hinhanhpath=="")){
                $target_dir = "./public/images/";
                $target_file = $target_dir.$hinhanhpath;
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                $this->loaiModel->UpdateLoai($tenLoai,$target_file,$maLoai);
                $thongbao = "Cập nhật thành công tên loại và hình ảnh loại !";
            }else if($hinhanhpath=="") {
                $this->loaiModel->UpdateLoaiNoImg($tenLoai,$maLoai);
                $thongbao = "Cập nhật thành công tên loại !";
            };
        }
       }
       $this->view(
        "layout1",
        [
            "Pages"=>"editloai",
            "SelectLoai"=>$this->loaiModel->SelectLoaiByID($_POST['maLoai']),
            "thongbao"=>$thongbao,
        ],
        );
    }
    public function XoaLoai(){
        $this->hangHoaModel = $this->model("hangHoaModel");
        $this->hangHoaModel->DeleteAllByLoai($_GET['maLoai']);
        $this->loaiModel->DeleteLoai($_GET['maLoai']);
        header("location: ./");
    }
    public function ThemLoai(){
        $thongbao ="";
        if(isset($_POST['btn-update'])){
            $dem = 0;
            if(strlen($_POST['tenLoai'])==0){
                $thongbao ="Tên loại không được bỏ trống !";
            }else{
                $tenLoai = $_POST['tenLoai'];
                foreach($this->loaiModel->SelectLoaiByTenLoai($tenLoai) as $key){
                    if($key['tenLoai']==$tenLoai){
                        $dem = 1;
                    };
                }
                if($dem == 0){
                    $hinhanhpath = basename($_FILES['hinh']['name']);
                    if(!($hinhanhpath=="")){
                        $target_dir = "./public/images/";
                        $target_file = $target_dir.$hinhanhpath;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        $this->loaiModel->InsertLoai($tenLoai,$target_file);
                        $thongbao = "Cập nhật thành công tên loại và hình ảnh loại !";
                    }else if($hinhanhpath=="") {
                        $thongbao = "Chưa tải ảnh loại lên !";
                    };
                }else{
                    $thongbao = "Tên loại này đã có trong danh sách loại !";
                }
                
            }
           }
        $this->view(
            "layout1",
            [
                "Pages"=>"insertloai",
                "thongbao"=>$thongbao,
            ],
        );
    }
}
?>