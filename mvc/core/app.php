<?php
class App{
    //http://localhost/live/controller/action/param
    protected $controller="home";
    protected $action="SayHi";
    protected $params=[];

    function __construct(){
        $arr =$this->UrlProcess();
        if(isset($arr)&&$arr[0]=="admin"){
            unset($arr[0]);
            if(isset($arr[1])){
                if(file_exists("./mvc/controllers/admin/".$arr[1].".php")){
                    $this->controller = $arr[1];
                    unset($arr[1]);//huy mang
                }
            }
            require_once "./mvc/controllers/admin/".$this->controller.".php";
    
            //xu li action
            if(isset($arr[2])){
                if(method_exists($this->controller,$arr[2])){//kiem tra function-action co ton tai trong controller dang chay hay khong
                    $this->action = $arr[2];
                }
                unset($arr[2]);
            }   
            //xu li params
            $this->params = $arr? array_values($arr):[];
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->action], $this->params ); //tao bien controller chay ham action voi tham so params
        }else{
            if(isset($arr)){
                if(file_exists("./mvc/controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);//huy mang
                }
            }
            require_once "./mvc/controllers/".$this->controller.".php";
    
            //xu li action
            if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){//kiem tra function-action co ton tai trong controller dang chay hay khong
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }   
            //xu li params
            $this->params = $arr? array_values($arr):[];
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->action], $this->params); //tao bien controller chay ham action voi tham so params
        }
        //xu li controller
        
    }
    function UrlProcess(){
        // controller/action/param
        if(isset($_GET['url'])){
           return explode("/", filter_var(trim($_GET['url'], "/")));           
        }
    }
}
?>