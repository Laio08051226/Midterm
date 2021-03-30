<?php
require_once("../db_connect.php");

$id=$_GET["edit"];
$sql="SELECT * FROM users WHERE id=$id AND valid=1";
$result=$conn->query($sql);

date_default_timezone_set('Asia/Taipei');
$now=date('Y:m:d H:i:s');

?>
<!doctype html>
<html lang="en">
<head>
    <title>修改會員資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="doUpdate.php" method="post">
            <?php
            if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
                 $id=$row["id"];
                 ?>
                <h1 class="text-center h3">修改會員資料</h1>
                <div>
                </div>
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group">
                    <label for="">帳號</label>
                    <input type="text" class="form-control" name="account" value="<?php echo $row["account"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">密碼</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $row["password"]?>" required>
                </div>
                <div class="form-group">
                    <label for="">姓名</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row["user_name"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">會員等級</label>
                    <input type="radio" name="user_level" value="一般會員" <?php if($row["user_level"]=="一般會員")echo "checked"?> required><label for="">一般會員</label>
                    <input type="radio" name="user_level" value="白金會員" <?php if($row["user_level"]=="白金會員")echo "checked"?> required><label for="">白金會員</label>
                </div>
                <div class="form-group">
                    <label for="">性別</label>
                    <input type="radio" name="gender" value="Male" <?php if($row["gender"]=="Male")echo "checked"?> required ><label for="">男性</label>
                    <input type="radio" name="gender" value="Female" <?php if($row["gender"]=="Female")echo "checked"?> required><label for="">女性</label>
                </div>
                <div class="form-group">
                    <label for="">生日</label>
                    <input type="date" class="form-control" name="birth_date" value="<?php echo $row["birth_date"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">電話</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $row["phone"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row["email"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">住址</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $row["address"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">註冊日期</label>
                    <span class="form-control"><?php echo $row["create_time"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">更新日期</label>
                    <span class="form-control"><?php echo $now ?></span>
                </div>
                <div class="form-group">
                    <a href="doUpdate.php"><input class="btn btn-info" type="submit" value="修改"></a>
                    <a class="btn btn-secondary" href="Member.php" role="button">取消</a>
                </div>
        </div>
        <?php }
        }
        ?>
        </form>
    </div>
</div>
</div>
</body>
</html>
