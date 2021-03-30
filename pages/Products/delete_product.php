<?php
require_once("connect.php");

$product_del_id =$_POST['del_id'];
$product_status_del=0;


$sql_del="UPDATE products SET
product_status='$product_status_del'

WHERE id='$product_del_id'";



$result_del=$connect->query($sql_del);

if($connect->query($sql_del)===TRUE){
     echo"更新s成功";
}else{
    echo"更新s錯誤".$connect->error;
}


header("Location:search.php");
$connect->close();