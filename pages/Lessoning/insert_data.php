<?php
date_default_timezone_set('Asia/Taipei');

if(isset($_POST["name"])){
    require_once("db_connect.php");
    $name=$_POST["name"];
    $category=$_POST["category"];
    $date=$_POST["date"];
    $deadline=date("Y-m-d", strtotime('Yesterday', strtotime($date)));
    $current_people=0;
    $lesson_status=1;
    $lesson_valid=1;
    $hours=$_POST["hours"];
    $min_people=$_POST["min_people"];
    $max_people=$_POST["max_people"];
    $teacher=$_POST["teacher"];
    $price=$_POST["price"];
    $info=$_POST["info"];
    $today=date("Y-m-d");
    $now=date("Y-m-d H:i:s");
//    echo "課程名稱: ".$name. " ,課程類別是: ".$category." 開課日期為: ".$date." 時數為: ".$hours." 人數下限: ".$min_people.", 人數上限: ".$max_people." 老師是: ".$teacher." 課程費用為: ".$price."元<br>";
//    echo "課程簡介:".$info;
//    echo "截止日期:".$deadline;

    $stmt= $conn->prepare("INSERT INTO lesson_data(name, category, hours, min_people, max_people, teacher, price, info, date, deadline, current_people, lesson_status, create_day, update_time, lesson_valid)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssisssiissi", $name, $category, $hours, $min_people, $max_people, $teacher, $price, $info, $date, $deadline, $current_people, $lesson_status, $today, $now, $lesson_valid);
    $stmt->execute();
    $stmt->close();
    header("Location: http://localhost/CMS/pages/Lessoning/index.php?page=1");
}

$conn->close();


?>