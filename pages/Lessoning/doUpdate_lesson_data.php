<?php
date_default_timezone_set('Asia/Taipei');
//echo $hours=$_POST["hours"]."<br>";
//echo $date=$_POST["date"]."<br>";
//echo $category=$_POST["category"]."<br>";

$page=$_POST["page"];

if(isset($_POST["name"])){
    require_once("db_connect.php");
    $id=$_POST["id"];
    $name=$_POST["name"];
    $category=$_POST["category"];
    $date=$_POST["date"];
    $deadline=date("Y-m-d", strtotime('Yesterday', strtotime($date)));
    $current_people=$_POST["current_people"];
//    $lesson_status=$_POST["lesson_status"];
    $hours=$_POST["hours"];
    $min_people=$_POST["min_people"];
    $max_people=$_POST["max_people"];
    $teacher=$_POST["teacher"];
    $price=$_POST["price"];
    $info=$_POST["info"];
    $now=date("Y-m-d H:i:s");
//    echo "課程名稱: ".$name. " ,課程類別是: ".$category." 開課日期為: ".$date." 時數為: ".$hours." 人數下限: ".$min_people.", 人數上限: ".$max_people." 老師是: ".$teacher." 課程費用為: ".$price."元<br>";
//    echo "課程簡介:".$info;
//    echo "截止日期:".$deadline;
//    echo "id是:".$id;
    $sql="UPDATE lesson_data SET name='$name', category='$category', hours='$hours', min_people='$min_people', max_people='$max_people', teacher='$teacher', price='$price', info='$info', date='$date', deadline='$deadline', current_people='$current_people', update_time='$now' WHERE id=$id";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ssisssisssis", $name, $category, $hours, $min_people, $max_people, $teacher, $price, $info, $date, $deadline, $current_people, $now);
    $stmt->execute();
    $stmt->close();
    header("Location: http://localhost/A_Midterm-CMS/pages/Lessoning/Lesson.php?page=$page");
}

$conn->close();



?>