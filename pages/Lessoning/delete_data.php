<?php
require_once("db_connect.php");
$id=$_GET["id"];
echo $id;
$sql="SELECT * FROM lesson_data WHERE id='$id'";

//$sql="UPDATE lesson_data SET lesson_valid=0 WHERE id=$id";
$result=$conn->query($sql);
//echo $result;
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($id == $row["id"]){
        $sql_update= "UPDATE lesson_data SET lesson_valid = 0 WHERE id=$id";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("i",$lesson_valid);
        $stmt->execute();
//        $stmt->bind_result($name, $lesson_valid);
//        $stmt->fetch();
//        $stmt->close();
//        $conn->close();
        $data=array(
            "status"=>1,
            "message"=>"新增成功"
        );
    }else{
        $data=array(
            "status"=>2,
            "message"=>"新增失敗"
        );
    }
}else{
    $data=array(
        "status"=>0,
        "message"=>"找不到此ID"
    );
}
echo json_encode($data);