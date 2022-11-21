<?php
session_start();
require_once "./mvc/bridge.php";
$myApp = new App();
function debug($param)
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}
function checkLogin(){
    return isset($_SESSION['login']);
}
?>