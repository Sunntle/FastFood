<?php
class news extends controller{
    public $newsModel;
    public function __construct()
    {
        $this->newsModel = $this->model("newsModel");
    }
    public function SayHi(){
        $this->view(
            "layout1",
            [
                "Pages"=>"listnews",
                "AllNews"=>$this->newsModel->SelectAllNews(),
            ],
        );
    }
    public function SuaNews(){
        $this->view(
            "layout1",
            [
                "Pages"=>"editnews",
                "SelectNews"=>$this->newsModel->SelectNewsID($_POST['id']),
            ],
        );
    }  
    public function CapNhatNews(){
        if(isset($_POST['btn-add'])){
         $id = $_POST['id'];
         $tennews = $_POST['tieuDe'];
         $ngaynews = $_POST['ngay'];
         $ndnews = $_POST['noiDung'];
         if(empty($_POST['tieuDe'])){
             $thongbao ="Tiêu đề không được bỏ trống !";
         }else{
             $tieuDe = $_POST['tieuDe'];
             $hinhanhpath = basename($_FILES['anhtieude']['name']);//trả về tên tệp tin từ đường dẫn
             if(!($hinhanhpath=="")){
                 $target_dir = "./public/images/";
                 $target_file = $target_dir.$hinhanhpath;
                 move_uploaded_file($_FILES["anhtieude"]["tmp_name"], $target_file);
                 $this->newsModel->UpdateNews($tennews,$ngaynews,$ndnews,$target_file,$id);
                 $thongbao = "Cập nhật thành công!";
             }else if($hinhanhpath=="") {
                 $this->newsModel->UpdateNewsNoImg($tennews,$ngaynews,$ndnews,$id);
                 $thongbao = "Cập nhật thành công không ảnh !";
             };
         }
        }
        $this->view(
            "layout1",
            [
                "Pages"=>"editnews",
                "SelectNews"=>$this->newsModel->SelectNewsID($_POST['id']),
                "Thongbao"=>$thongbao,
            ],
        );
    }
    public function XoaNews(){
        $this->newsModel->RemoveNews($_GET['id']);
        header("location: ./");
    }
    public function NewNews(){
        $this->view(
            "layout1",
            [
                "Pages"=>"insertnews",
            ],
        );
    } 
    public function ThemNews(){
        $thongbao="";
        if(isset($_POST['btn-update'])){  
            $dem = 0;
            $tennews = $_POST['tieuDe'];
  
            if(empty($_POST['tieuDe']) or empty($_POST['ngay']) or empty($_POST['noiDung'])){
                $thongbao = "Không được để trống!";
            }else{
                foreach($this->newsModel->SelectNewsByName($tennews) as $key){
                    if($key['tieuDe']==$tennews){
                        $dem = 1;
                    }
                }
                if($dem == 0){
                    $ngaynews = $_POST['ngay'];
                    $ndnews = $_POST['noiDung'];
                    // $tennews = $_POST['tieuDe'];
                    $hinhanhpath = basename($_FILES['anhtieude']['name']);
                    if(!($hinhanhpath=="")){
                        $target_dir = "./public/images/";
                        $target_file = $target_dir.$hinhanhpath;
                        move_uploaded_file($_FILES["anhtieude"]["tmp_name"], $target_file);
                        $this->newsModel->InsertNews($tennews,$ngaynews,$ndnews,$target_file);
                        $thongbao = "Cập nhật thành công!";
                    }else if($hinhanhpath=="") {
                        $thongbao = "Chưa tải ảnh lên!";
                    };
                }else if($dem == 1){
                    $thongbao = "Bài viết đã tồn tại!";
                } 

            }

            }
            $this->view(
            "layout1",
            [
                "Pages"=>"insertnews",
                "Thongbao"=>$thongbao,
            ],
        );
        }
}

?>