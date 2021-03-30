<?php
require_once("../db_connect.php");

$id=$_POST['id'];

$sql="UPDATE users SET valid=0 WHERE id=$id";

if($conn->query($sql)===TRUE){
    header("Location: dashboard.php"); //修改成功的頁面
    echo "刪除資料成功";
}else{
    echo "刪除資料失敗: ".$conn->error;
}

$conn->close();