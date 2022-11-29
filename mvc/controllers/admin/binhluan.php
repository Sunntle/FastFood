<?php
class binhluan extends controller{
    public $binhLuanModel;
    public $hangHoaModel;
    public function __construct()
    {
        $this->binhLuanModel = $this->model("binhLuanModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
        $this->userModel = $this->model("userModel");
    }
    public function SayHi(){
        $arr[]="";
        foreach($this->binhLuanModel->SelectBLByGroup() as $key) {
            foreach($this->hangHoaModel->SelectProductID($key['maHangHoa']) as $value){
                $tenHangHoa = $value['tenHangHoa'];
                $soBL=$key['count(maHangHoa)'];
                foreach($this->binhLuanModel->SelectNgayBLMoiNhat($key['maHangHoa']) as $date){
                    $dateMax=$date['max(ngayBL)'];
                }
                foreach($this->binhLuanModel->SelectNgayBLCuNhat($key['maHangHoa']) as $date2){
                    $dateMin=$date2['min(ngayBL)'];
                }
            }
            $arr[]=[$tenHangHoa,$soBL,$dateMax,$dateMin,$key['maHangHoa']];
        }
        $this->view(
            "layout1",
            [
            "Pages"=> "listbinhluan",
            "arr"=>$arr,
            ],
        );
    }
    public function ChiTietBinhLuan(){
        $this->view(
            "layout1",
            [
            "Pages"=> "listbinhluantheohang",
            "listAll"=>$this->binhLuanModel->SelectBLByMaHH($_POST['maBL']),
            "listAllKH"=>$this->userModel->listAll(),
            ],
        );
    }
    public function SuaBinhLuan(){
        $this->view(
            "layout1",
            [
            "Pages"=> "editbinhluan",
            ],
        );
    }
    public function XoaBinhLuan(){
        $this->binhLuanModel->DeleteBL($_GET['maBL']);
        header("location: ./");
    }
}
?>