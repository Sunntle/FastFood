<?php
class donhang extends controller{
    public $billModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
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
            $status = $_POST['status'];
            $id = $_POST['id'];
            $this->billModel->UpdateBill($status,$id);
            header('Location: /live/admin/donhang/');
        } 
    }

    function dell(){
        $id = $_GET['id'];
        $this->billModel->dellIdBill($id);
        header('Location: /live/admin/donhang/');
    }
}

?>