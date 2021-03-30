<?php
require_once ("./db_connect.php");
$db=$conn;
$valid = 0;
@$id=$_POST["id"];
// $event_name=$_POST["event_name"];
// $event_category=$_POST["event_category"];
// $event_start=$_POST["event_start"];
// $event_end=$_POST["event_end"];
// $event_content=$_POST["event_content"];
// $discount=$_POST["discount"];
// $percent_off=$_POST["percent_off"];
// $event_remark=$_POST["event_remark"];

mysqli_query($db,"UPDATE hello123 SET $valid=0 WHERE id ='$id'");
header("location:index.php");

?>