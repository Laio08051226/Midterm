<?php
if(!isset($_POST["account"])){
    echo "請用表單填寫資料";
    exit();
}
require_once("../db_connect.php");
$account=$_POST["account"];
$sql="SELECT account FROM users WHERE account='$account'";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "帳號已存在";
    echo "<a class='btn btn-info' href='Member.php'>回到會員列表</a>";
    exit();
}

date_default_timezone_set('Asia/Taipei');
$now=date('Y:m:d H:i:s');

$stmt=$conn->prepare("INSERT INTO users(account,password,user_name,user_level,gender,birth_date,phone,email,address,create_time,update_time,valid) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssssi',$account,$password,$user_name,$user_level,$gender,$birth_date,$phone,$email,$address,$create_time,$update_time,$valid);

$account=$_POST["account"];
$password=$_POST["password"];
$user_name=$_POST["user_name"];
$user_level=$_POST["user_level"];
$gender=$_POST["gender"];
$birth_date=$_POST["birth_date"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];
$create_time=$now;
$update_time=$now;
$valid=1;

$stmt->execute();
$stmt->close();
header("Location:dashboard.php");
$conn->close();