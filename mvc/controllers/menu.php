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
    }
    
    function SayHi($a){
        $this->view(
            "layout",
            [
            "Pages"=>"menu",
            "AllType"=>$this->loaiModel->listAll(),
            "AllSP"=>$this->sanpham->listAllSanPham(),
            "ProductbyIDType"=>$this->loaiModel->SelectProductbyIDType($a),
            ],
        );
    }

    
    // function SayHi($page){
    //     $keyword = isset($_GET['keyword']) ? $_GET['keyword']:'';
    //     $countSP = $this->sanpham->countSP($keyword);
    //     $perPage = 3;
    //     $pageCount = (int) ceil($countSP / $perPage); 
    //     $currentPage = isset($page) ? (int) $page : 1;
    //     $offset =  ($currentPage - 1) * $perPage;  
    //     $this->view(
    //         "layout",
    //         [
    //         "Pages"=>"menu",
    //         "currentPage"=>$currentPage,
    //         "AllType"=>$this->sanpham->listAllLoai(),
    //         "AllSP"=>$this->sanpham->listAllSanPham(),
    //         "phantrang"=>$this->sanpham->PhanTrang($keyword,$perPage,$offset),
    //         "countSP"=> $pageCount,          
    //         ],
    //     );
    // }   
    function detailsproduct($a){
        foreach($this->sanpham->SelectProductID($a) as $key){
            $luotXem = $key['luotXem'] + 1;
        }
        $this->sanpham->UpdateLuotXem($luotXem,$a);
        $this->view(
            "layout",
            [
            "Pages"=>"detailsproduct",
            "ProductID"=>$this->sanpham->SelectProductID($a),
            "AllCmt"=>$this->sanpham->listAllCmt(),
            "listAll"=>$this->loaiModel->listAll(),
            "CmtID"=>$this->binhLuan->SelectCmtbyID($a),
            "KhachHang"=>$this->user->listAll(),
            ],
        );
    }
}

?>