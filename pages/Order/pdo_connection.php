<?php
header("Content-Type: text/html; charset=utf-8");
$db_host="localhost";
$db_username="root";
$db_password="12345";
$db_name="project";
 try{
     $db_link=new PDO(
         "mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password);
 }catch(PDOException $e){
     echo "資料庫連結失敗!<br>";
     echo "Error: ".$e->getMessage();
     exit();
 }
echo "資料庫連線成功!";
 $db_host=NULL;


?>