<?php

$server_name="localhost";
$user_name="root";
$password="";
$db_name="products";

$connect = new mysqli($server_name,$user_name,$password,$db_name);
if($connect->connect_error){
    die(("連線錯誤"). $connect->connect_error);
}else{
//    echo "資料庫連線成功";
}



?>