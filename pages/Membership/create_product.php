<?php
require_once("../db_connect.php");
$sql="CREATE TABLE products(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
category_id INT(3),
price INT(6)
)";

if($conn->query($sql)===TRUE){
    echo "資料表 products 建立完成";
}else{
    echo "建立資料表錯誤:".$conn->error;
}

$conn->close();
