<?php
class mybill extends controller
{
    public $billModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
    }
    public function SayHi()
    {
        $mybill =$this->billModel->ShowBill($_GET['lastid']);
        $get = $mybill[0]['id'];
        $this->view(
            "layout",
            [
            "Pages"=>"mybill",
            "Hoadon"=>$this->billModel->ShowBill($_GET['lastid']),
            "count"=> $this->billModel->count($get),
            ],
        );

        
    }
    
}        
        



?>