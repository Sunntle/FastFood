<?php
class cart extends controller{
    public $hangHoaModel;
    public function __construct()
    {
        $this->hangHoaModel = $this->model("hangHoaModel");
    }
    
    function SayHi(){
    $this->view(
            "layout",
            [
            "Pages"=>"cart",
            "Cart"=>$this->addtocart(),
            
            ],
        );
    }
    
    function addtocart(){
        ob_start();
        if(!isset($_SESSION['vohang'])) $_SESSION['vohang']=[];
        if (isset($_POST['addtocart']) &&($_POST['addtocart'])) {
            $id = $_POST['maHangHoa'];
            $img = $_POST['hinhAnh'];
            $tensp = $_POST['tenHangHoa'];
            $gia = $_POST['gia'];
            $sl = $_POST['sl'];
            $tt = $sl * $gia;
            $fl=0;           
            for ($i=0;$i<sizeof($_SESSION['vohang']);$i++){  
                if($_SESSION['vohang'][$i][1] == $tensp){
                    $fl=1;
                    
                    $new = $sl + $_SESSION['vohang'][$i][4];
                    $_SESSION['vohang'][$i][4]=$new;
                    break;
                }
            }

            //tao mang vo hang
            if($fl==0){
                $add = array($id,$tensp,$img,$gia,$sl,$tt);
                if (!isset($_SESSION['vohang'])) {
                    $_SESSION['vohang']= array();
                }
                array_push($_SESSION['vohang'], $add);
                header('Location: /live/cart');
            }
        }    
    }


    function updateCart(){
        $slAllSP = $this->hangHoaModel->soLuong();
        $thongbao = "";
        foreach($_POST['slnew'] as $id => $sl ){ 
            for ($i=0;$i<sizeof($_SESSION['vohang']);$i++){  
                if($_SESSION['vohang'][$i][0] == $id){
                    foreach ($slAllSP as $ma => $slALL) {
                        if ($slALL['maHangHoa'] == $id) {
                            if ($slALL['soLuong'] >= $sl) {
                                $_SESSION['vohang'][$i][4] = $sl;
                                break;
                            }else{
                                echo $thongbao = "Số lượng sản phẩm bạn mua đã vượt giới hạn trong kho";
                            }
                        }
                    }
                }   
            }  
        }
        header('Location: /live/cart&thongbao='.$thongbao);
    }




    // function updateCart(){
    //     $slAllSP = $this->hangHoaModel->soLuong();
    //     foreach($_POST['slnew'] as $id => $sl ){ 
    //         for ($i=0;$i<sizeof($_SESSION['vohang']);$i++){  
    //             if($_SESSION['vohang'][$i][0] == $id){

    //                 $_SESSION['vohang'][$i][4] = $sl;
    //                 break;
    //             }   
    //         }  
    //     }
    //     header('Location: /live/cart');
    // }
    // function updateCart($id,$qty){
    //     debug($id);debug($qty);
    //     for ($i=0;$i<sizeof($_SESSION['vohang']);$i++){
    //         if($_SESSION['vohang'][$i][0] == $id){
    //             $_SESSION['vohang'][$i][4] = $qty;
    //             break;
    //         }
    //     }
    //     // header('Location: /live/cart');
    // }



    function dellcart(){
        if(isset($_SESSION['vohang'])){
            echo $_GET['id'];
            if(isset($_GET['id'])){
                array_splice($_SESSION['vohang'],$_GET['id'],1);
                
            }
            else {
                unset($_SESSION['vohang']);
            }
            if (isset($_SESSION['vohang'])) header('Location: /live/cart');
            else header('Location: /live/menuSayHi/1');
        }
    }
}
?>