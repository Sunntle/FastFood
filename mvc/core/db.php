<?php
//ket noi dtb
class db{
    public $con;
    protected $host ="localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "duan";
    protected $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
    function __construct()
    {
        try{
            $this->con = new PDO("mysql:host=$this->host; dbname=$this->dbname; charset=utf8",$this->username, $this->password,$this->options);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            exit();
        };
        
    }
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(),1);// tach chuoi truyen vao tu vi tri 1
        try{
            $stmt = $this->con->prepare($sql);
            $stmt->execute($sql_args);
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($con);
        }
    }
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(),1);// tach chuoi truyen vao tu vi tri 1
        try{
            $stmt = $this->con->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } 
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($con);
        }
    }
    function pdo_query_id($sql){
        $sql_args = array_slice(func_get_args(),1);// tach chuoi truyen vao tu vi tri 1
        try{
            $stmt = $this->con->prepare($sql);
            $stmt->execute($sql_args);
            $id = $this->con->lastInsertId();
            return $id;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($con);
        }
    }

}
?>