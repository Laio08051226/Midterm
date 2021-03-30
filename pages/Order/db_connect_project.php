<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_connect="project";
$conn=@new mysqli($server_name, $user_name, $password, $db_connect);
//if($conn->connect_error){
//    die("連線錯誤:". $conn->connect_error);
//}else{
//    echo"資料庫連線成功";
//}
?>
