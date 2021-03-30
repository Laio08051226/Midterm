<?php
header("Content-Type:text/htm;charset=utf-8");
require_once ("../../db_connect.php");
$db=$conn;



if(isset($_POST["id"])==TRUE){
    //$user_data=array();
    $sql="SELECT * FROM hello123 WHERE id='".$_POST["id"]."'";
    $result =$conn->query($sql);
    $row=$result->fetch_assoc();
    echo json_encode($row);
    //$result=$conn->query($sql);
    //     if($result->num_rows>0){
    //         while($row=$result->fetch_assoc()){
    //             $user_data[]=$row;
    //             echo json_encode($user_data);
    //     }
    // }else{
    // echo "沒有資料";
    // }
}




?>