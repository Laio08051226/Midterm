<?php
require_once("../db_connect.php");

$sql="SELECT * FROM users WHERE valid=1";
$result=$conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <title>會員管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3 class="p-5">修改資料成功！</h3>
    <div>
        <a class="btn btn-info" href="Member.php">回到會員列表</a>
    </div>

</div>
</body>
</html>
