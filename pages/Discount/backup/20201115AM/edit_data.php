<?php
require_once ("../../db_connect.php");
$db=$conn;

$event_name=$_POST["event_name"];
$event_category=$_POST["event_category"];
$event_start=$_POST["event_start"];
$event_end=$_POST["event_end"];
$event_content=$_POST["event_content"];
$discount=$_POST["discount"];
$percent_off=$_POST["percent_off"];
$event_remark=$_POST["event_remark"];
$id=$_POST["user_id"];

$sql="INSERT INTO hello123(event_name, event_category, event_start, event_end, event_content, discount, percent_off, event_remark) VALUES ('$event_name','$event_category','$event_start','$event_end','$event_content','$discount','$percent_off','$event_remark') WHERE id= $id";

$execute=mysqli_query($db,$sql);

  if($execute==TRUE){
    echo "資料更新成功";
  }else {
    echo "更新失敗，請確認連線狀態".$sql."<br>".mysqli_error($db);
  }
  


?>
