<?php
require_once("db_connect.php");
//$sql= "UPDATE class_data SET create_day='2020-11-12',update_time='2020-11-12 10:00:00' WHERE id BETWEEN  101 AND 155";
$sql= "UPDATE lesson_data SET lesson_valid= 1";


if($conn->query($sql)===TRUE) {
    echo "資料更新完成";
}else{
    echo "資料更新失敗: "."<br>";
}