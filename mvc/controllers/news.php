<?php
class news extends controller{
    
    public $newsModel;
    public function __construct()
    {
        $this->newsModel = $this->model("newsModel");
    }
    function SayHi(){
        $this->view(
            "layout",
            [
            "Pages"=>"news",
            "AllNews"=>$this->newsModel->SelectAllNews(),
            ],
        );
    }
    function details(){
        $this->view(
            "layout",
            [
            "Pages"=>"news-details",
            "NewsID"=> $this->newsModel->SelectNewsID($_GET['newsID']),
            ],
        );
    }
}

?>