<?php
require_once ("connect.php");

if (isset($_POST["category_name"]) ){

    $stmt = $connect->prepare("INSERT INTO category (category_name, category_remark) VALUES (?,?)");

    $stmt->bind_param('ss', $category_name, $category_remark);

    $category_name = $_POST['category_name'];
    $remark = $_POST['category_remark'];

    $stmt->execute();


}


//
header("Location:category.php");

$connect->close();
