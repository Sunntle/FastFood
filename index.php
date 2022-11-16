<?php
session_start();
require_once "./mvc/bridge.php";
$myApp = new App();
function debug($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}
?>