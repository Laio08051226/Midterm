<?php
header("Content-Type:text/html;charset=utf-8");
$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="localdb";

try{
    $db_host=new PDO(
        "mysql:host={$db_host};dbname={$db_name};charset=utf8",$db_username,$db_password
    );
}catch(PDOException $e){
    echo "資料連線失敗<br>";
    echo "Error: ".$e->getMessage();
    exit;
}

// echo "資料庫連線成功";

// $db_host= NULL;

?>