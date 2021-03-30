<?php
require_once("../db_connect.php");

$stmt=$conn->prepare("INSERT INTO user_order(product_id,amount,user_id,order_date) VALUES(?,?,?,?)");
$stmt->bind_param(iiis,$product_id,$amount,$user_id,$order_date);

$product_id=$_POST["product_id"];
$amount=$_POST["amount"];
$user_id=$_POST["user_id"];
$order_date=$_POST["order_date"];
if(!isset($_POST["order_list"])){
    $receive="訂單紀錄";
}else{
    $receive="無法查詢";
}

$stmt->execute();
$stmt->close();
$conn->close();