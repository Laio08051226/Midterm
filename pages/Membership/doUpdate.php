<?php
require_once("../db_connect.php");

$id=$_POST['id'];

$sql="UPDATE users SET account='$_POST[account]',password='$_POST[password]',user_name='$_POST[user_name]',user_level='$_POST[user_level]',gender='$_POST[gender]',birth_date='$_POST[birth_date]',phone='$_POST[phone]',email='$_POST[email]',address='$_POST[address]',create_time='$_POST[create_time]',update_time='$_POST[update_time]' WHERE id=$id AND valid=1";
if($conn->query($sql)===TRUE){
    header("Location: dashboard.php"); //修改成功的頁面
    echo "修改資料成功";
}else{
    echo "更新資料失敗: ".$conn->error;
}

$conn->close();






