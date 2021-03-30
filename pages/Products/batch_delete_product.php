<?php
require_once("connect.php");






//$selected = $_POST["select_item"];
////selected是一個陣列
//
//var_dump($selected);
//
//
//foreach($selected as $selected_id){
//    $sql_del="UPDATE products SET product_status=0 WHERE id=$selected_id";
//}
//
//
//if($connect->query($sql_del)===TRUE){
//    echo"更新status成功";
//}else{
//    echo"更新status錯誤".$connect->error;
//}
//
//
//
//
//$sql_edit2="UPDATE products SET
//product_status='0',
//WHERE id=$product_id";
//
//$result_edit=$connect->query($sql_edit2);
//
//if($connect->query($sql_edit2)===TRUE){
//
//    echo"更新s成功";
//}else{
//    echo"更新s錯誤".$connect->error;
//}



$connect->close();
//header("Location:index.php");
exit;
