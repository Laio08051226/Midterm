<?php
require_once ("./db_connect.php");
$db=$conn;

// function _get($str){
//     $val = !empty($_GET[$str]) ? $_GET[$str] : null;
//     return $val;
//     }


@$id=$_POST["id"];
$event_name=$_POST["event_name"];
$event_category=$_POST["event_category"];
$event_start=$_POST["event_start"];
$event_end=$_POST["event_end"];
$event_content=$_POST["event_content"];
$discount=$_POST["discount"];
$percent_off=$_POST["percent_off"];
$event_remark=$_POST["event_remark"];

mysqli_query($db,"UPDATE hello123 SET event_name='$event_name', event_category='$event_category', event_start='$event_start', event_end='$event_end', event_content='$event_content', discount='$discount', percent_off='$percent_off', event_remark='$event_remark' WHERE id ='$id'");

header("location:index.php");


// if(!empty($event_name) && !empty($event_category) && !empty($event_start) && !empty($event_end) && !empty($event_content) && !empty($discount) && !empty($percent_off) && !empty($event_remark)){
//     Insert_data($event_name,$event_category,$event_start,$event_end,$event_content,$discount,$percent_off,$event_remark);
// }else{
//     echo "Please Check all bracket again,"."<br>"."because there are something empty!!";
// }'".$_POST["id"]."'



    // if($execute==true){
    //     echo '<script>"Event data have been created successfully!";</script>';
    //     header("location:index-1.php");
    // }else{
    //     echo "Error: ".$sql."<br>".mysqli_error($db);
    // }
//     $sql="UPDATE hello123 SET event_name=$event_name, event_category=$event_category, event_start=$event_start, event_end=$event_end, event_content=$event_content, discount=$discount, percent_off=$percent_off, event_remark=$event_remark WHERE id = ".$_POST["id"]."";

// $execute=mysqli_query($db,$sql);
    
?>
