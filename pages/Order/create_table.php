<?php
require_once("../../../db_connect_project.php");
$sql="CREATE TABLE rental_orders(
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
order_id VARCHAR(30) NOT NULL,
user_name VARCHAR(30) NOT NULL,
product_name VARCHAR(100) NOT NULL,
order_method VARCHAR(10) NOT NULL,
product_price INT(10),
order_qty INT(10),
discount INT(10),
shipping_cost INT(10),
other_cost INT(10),
order_date DATE,
lease_start_date DATE,
lease_end_date DATE,
order_status VARCHAR(10),
shipping_method VARCHAR(20),
ship_to_address VARCHAR(300),
payment_method VARCHAR(20),
payment_status VARCHAR(20),
remark VARCHAR(500)
)";

if($conn->query($sql)===TRUE){
    echo "資料表建立成功";
}else{
    echo"資料表建立錯誤".$conn->error;
}