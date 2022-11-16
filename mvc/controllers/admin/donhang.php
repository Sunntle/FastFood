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
            $fl = 0;
            $status = $_POST['status'];

            if ($_POST['status']==2){
                $id = $_POST['id'];
                echo $id;
                $fl = 1;
                $bill =$this->billModel->ShowId($id);
                debug($bill);

                
            }

            
            // $this->billModel->UpdateBill($status,$id);          
            // header('Location: /live/admin/donhang/');
        } 
    }

    function dell(){
        $id = $_GET['id'];
        $this->billModel->dellIdBill($id);
        header('Location: /live/admin/donhang/');
    }
}

?>