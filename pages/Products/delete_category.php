<?php
require_once("connect.php");

$cat_del_id =$_POST['del_category_id'];
$cat_status_del=0;


$sql_del="UPDATE category SET
category_status='$cat_status_del'

WHERE id='$cat_del_id'";



$result_del=$connect->query($sql_del);

if($connect->query($sql_del)===TRUE){
     echo"更新s成功";
}else{
    echo"更新s錯誤".$connect->error;
}

//
header("Location:category.php");
$connect->close();