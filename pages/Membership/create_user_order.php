<?php
require_once("../db_connect.php");
$sql="CREATE table user_order(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(4) NOT NULL,
amount INT(3) NOT NULL,
user_id INT(6),
order_date DATE NOT NULL
)";

if($conn->query($sql)===TRUE){
    echo "資料表 user_order 建立完成";
}else{
    echo "建立失敗: ".$conn->error;
}