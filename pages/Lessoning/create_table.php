<?php
require_once ("db_connect.php");

$sql="CREATE TABLE class_data(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
category VARCHAR (30) NOT NULL,
hours INT (3), 
min_people VARCHAR (10),
max_people VARCHAR (10) NOT NULL,
teacher VARCHAR(30),
images VARCHAR(100),
price INT(6) NOT NULL,
info VARCHAR (1000),
date DATETIME NOT NULL,
deadline DATETIME NOT NULL,
class_valid TINYTEXT(4) NOT NULL,
creat_time DATETIME,
update_time DATETIME
)";

if($conn->query($sql)===TRUE){
    echo "資料表 class_data 建立成功!";
}else{
    echo "資料表建立失敗".$conn->error;
}