<?php
class home extends controller{
    //model
    public $loaiModel;
    public $hangHoaModel;

    public function __construct()
    {
        $this->loaiModel = $this->model("loaiModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
    }

    function SayHi(){
        $this->view(
            "layout",
            [
            "Pages"=>"banner",
            "loai"=>$this->loaiModel->listAll(),
            "TopSp"=>$this->hangHoaModel->SelectTopSp(),
            ],
        );
    }
}

?>