<?php
require_once ("../../db_connect.php");
$db=$conn;

$valid = 0;

if($_POST["id"]){
    $sql ="INSERT INTO hello123(valid) VALUES('$valid') WHERE id='".$_POST["id"]."'";

    $execute=mysqli_query($db,$sql);

        if($execute==true){
            echo '<script>"Event data have been created successfully!";</script>';
            header("location:index-1.php");
        }else{
            echo "Error: ".$sql."<br>".mysqli_error($db);
        }

}else{
    echo "無接收到資料";
}

?>