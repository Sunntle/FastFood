<?php
class donhang extends controller{
    public $billModel;
    public $hangHoaModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
    }
    
    function SayHi(){
        
        $this->view(
            "layout1",
            [
            "Pages"=>"donhang",
            "AllBill"=>$this->billModel->ShowAllBill(),
            
            ],
        );
    }
    function editdonhang(){
        $id = $_GET['id'];
        $this->view(
            "layout1",
            [
            "Pages"=>"editdonhang",
            // "AllBill"=>$this->billModel->ShowAllBill(),
            "idbill"=>$this->billModel->ShowId($id),
            ],
        );
        
    }
    function update(){
        if(isset($_POST['status'])){
            $fl = 0;
            $status = $_POST['status'];

            if ($_POST['status']==2){
                $id = $_POST['id'];                
                $slAllSP = $this->hangHoaModel->soLuong();
                
                // $bill = $this->billModel->ShowId($id);
                $qtysl = $this->billModel->QtyCart($id);
                
                for ($i=0;$i<sizeof($qtysl);$i++){
                    foreach($slAllSP as $ma => $sl){
                        if($sl['maHangHoa'] == $qtysl[$i]['maHangHoa']){
                            if($sl['soLuong'] > $qtysl[$i]['soLuong']){
                                $upQty = ($sl['soLuong'])- ($qtysl[$i]['soLuong']);
                                $this->hangHoaModel->UpdateQtyHH($upQty,$sl['maHangHoa']);
                            }
                        }
                    }
                }    
            }
            $this->billModel->UpdateBill($status,$id);          
            header('Location: /live/admin/donhang/');
        } 
    }

    function dell(){
        $id = $_GET['id'];
        $this->billModel->dellIdCart($id);
        $this->billModel->dellIdBill($id);
        header('Location: /live/admin/donhang/');
    }
}

?>