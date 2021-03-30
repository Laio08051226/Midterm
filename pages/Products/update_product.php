<?php
require_once("connect.php");

$product_id = $_POST["id"];
$product_name = $_POST["product_name"];
$product_category = $_POST['product_category'];
$order_method = $_POST['order_method'];
$product_price =$_POST['product_price'];
$buffer_time =$_POST['buffer_time'];
$available_date =$_POST['available_date'];
$maintenance_cycle =$_POST['maintenance_cycle'];
$shipping_method =$_POST['shipping_method'];
$product_img =$_POST['product_img'];
$product_info =$_POST['product_info'];
$product_inventory =$_POST['product_inventory'];
$rented_amount =$_POST['rented_amount'];
$product_status =$_POST['product_status'];
$create_date =date('Y-m-d');
$remark =$_POST['remark'];


$sql_edit="UPDATE products SET
product_name='$product_name' ,
product_category='$product_category' ,
order_method='$order_method',
product_price='$product_price',
buffer_time='$buffer_time',
available_date='$available_date',
maintenance_cycle='$maintenance_cycle',
shipping_method='$shipping_method',
product_img='$product_img',
product_info='$product_info',
product_inventory='$product_inventory',
rented_amount='$rented_amount',
product_status='$product_status',
create_date='$create_date',
remark='$remark'

WHERE id=$product_id";

$result_edit=$connect->query($sql_edit);

if($connect->query($sql_edit)===TRUE){

    echo"更新成功";
}else{
    echo"更新資料錯誤".$connect->error;
}




header("Location:search.php");
$connect->close();

//product_category,order_method,product_price, buffer_time,
//available_date,maintenance_cycle ,shipping_method ,product_img ,product_info ,product_inventory ,rented_amount,
//product_status ,create_date ,remark;


