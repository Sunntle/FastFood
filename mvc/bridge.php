<?php
require_once "./mvc/core/app.php";
require_once "./mvc/core/controller.php";
require_once "./mvc/core/db.php";
function debug($param)
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}
function checkLogin(){
    return isset($_SESSION['login']);
}
function formatString($str){
    $str = trim($str);
    $str = strtolower($str);
    $str = ucwords($str);
}
?>