<?php
require_once("db_connect.php");

$search=$_POST["search"];
echo $search;

$sql="SELECT * FROM lesson_data WHERE leeons_valid=1  AND (
name LIKE '%.$search.%' OR category LIKE '%.$search.%' OR teacher LIKE '%.$search.%')";
//echo $sql;
$result=$conn->query($sql);
echo $result;
//if ($result->num_rows>0){
//    while($row=$result->fetch_assoc()){
//        echo $row;
//    }
//}