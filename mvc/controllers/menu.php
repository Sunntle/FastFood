<?php
class menu extends controller{
    public $sanpham;
    public $loaiModel;
    public function __construct()
    {
        $this->sanpham = $this->model("hangHoaModel");
        $this->loaiModel = $this->model("loaiModel");
        $this->binhLuan = $this->model("binhLuanModel");
        $this->user = $this->model("userModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
    }
    

    function SayHi($a){       
        if (isset($_POST['keyword']) && $_POST['keyword'] !=""){    
            $keyword = $_POST['keyword'];
            $se = " tenHangHoa LIKE '%$keyword%'";
            $i="";
            $page = "";
            $data = $this->sanpham->SelectProductbyIDType($i,$se,$page);
        } else{
            if(isset($_GET['page'])){
                $page = $_GET['page'] * 4;
            } else{
                $page = 4;
            }
            $se = "";
            $id = "maLoai = $a";
            $limit = " LIMIT 0,$page";
            $data = $this->sanpham->SelectProductbyIDType($id,$se,$limit);
        }
          
        
        $this->view(
            "layout",
            [
            "Pages"=>"menu",
            "AllType"=>$this->loaiModel->listAll(),
            "ProductbyIDType"=>$data,
            "idLoai"=>$a,
            ],
        ); 
    }
    function search(){

        if (isset($_POST['keyword']) && $_POST['keyword'] !=""){
            
            $keyword = $_POST['keyword'];
            var_dump($keyword);
            $se = $this->sanpham->search();
        } else{
            $se = "Không tìm thấy sản phẩm tương tự ";
        }
        
        
        $this->view(
            "layout",
            [
            "Pages"=>"menu",
            "All"=> $se,
            ],
        );
    }
   
    function detailsproduct($a){
        foreach($this->sanpham->SelectProductID($a) as $key){
            $luotXem = $key['luotXem'] + 1;
        }
        $this->sanpham->UpdateLuotXem($luotXem,$a);        
        if (isset($_POST['binhLuan'])){
            // $name = $_POST['tenKH'];
            $maKh = $_POST['idKH'];
            $mahh = $_POST['maHangHoa'];
            $noiDung = $_POST['noidung'];
            $ngayBl = date("Y/m/d");
            if(empty($_POST['noidung'])){
                $thongbao ="Noi dung không được bỏ trống !";
            }else{
            $this->binhLuan->UpdateBL($noiDung,$ngayBl,$mahh,$maKh);        
            $this->view(
            "layout",
            [
            "Pages"=>"detailsproduct",
            "ProductID"=>$this->sanpham->SelectProductID($a),
            "AllCmt"=>$this->sanpham->listAllCmt(),
            "listAll"=>$this->loaiModel->listAll(),
            "CmtID"=>$this->binhLuan->SelectCmtbyID($a),
            "KhachHang"=>$this->user->listAll(),
            "loai"=>$this->loaiModel->listAll(),
            "TopSp"=>$this->hangHoaModel->SelectTopSp(),
            ],
        ); 
            }


        }
        $this->view(
            "layout",
            [
            "Pages"=>"detailsproduct",
            "ProductID"=>$this->sanpham->SelectProductID($a),
            "AllCmt"=>$this->sanpham->listAllCmt(),
            "listAll"=>$this->loaiModel->listAll(),
            "CmtID"=>$this->binhLuan->SelectCmtbyID($a),
            "KhachHang"=>$this->user->listAll(),
            "loai"=>$this->loaiModel->listAll(),
            "TopSp"=>$this->hangHoaModel->SelectTopSp(),
            // "Thongbao"=>$thongbao,
            ],
        );
    }
}

?>