<?php
require_once ("connect.php");
date_default_timezone_set('Asia/Taipei');

//if (isset($_POST["product_name"])&&isset($_POST["product_name"])) {

$stmt = $connect->prepare("INSERT INTO products (product_name, product_category,order_method,product_price, buffer_time,
available_date,maintenance_cycle ,shipping_method ,product_info ,product_inventory ,rented_amount,
product_status ,create_date ,remark)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$stmt ->bind_param('sisiisissiiiss',$product_name,$product_category,$order_method,$product_price,
$buffer_time,$available_date,$maintenance_cycle,$shipping_method,
//    $product_img,
$product_info,$product_inventory,$rented_amount,$product_status,$create_date,$remark);

$product_name = $_POST["product_name"];
$product_category = $_POST['product_category'];
$order_method = $_POST['order_method'];
$product_price =$_POST['product_price'];
$buffer_time =$_POST['buffer_time'];
$available_date =$_POST['available_date'];
$maintenance_cycle =$_POST['maintenance_cycle'];
$shipping_method =$_POST['shipping_method'];
//$product_img =$_POST['product_img'];
$product_info =$_POST['product_info'];
$product_inventory =$_POST['product_inventory'];
$rented_amount =$_POST['rented_amount'];
$product_status =$_POST['product_status'];

$create_date =date('Y-m-d');
$remark =$_POST['remark'];



$stmt->execute();
//
header("Location:search.php");

$connect->close();
