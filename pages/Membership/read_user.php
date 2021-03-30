<?php
require_once("../db_connect.php");

$id=$_GET["click"];
$sql="SELECT * FROM users WHERE id=$id AND valid=1";
$result=$conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <title>會員資料</title>
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
            <form action="" method="post">
                <?php
                if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                $id=$row["id"];
                ?>
                <h1 class="text-center h3">會員資料</h1>
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="form-group">
                    <label for="">帳號</label>
                    <span class="form-control"><?php echo $row["account"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">密碼</label>
                    <span class="form-control"><?php echo $row["password"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">姓名</label>
                    <span class="form-control"><?php echo $row["user_name"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">會員等級</label>
                    <span class="form-control"><?php echo $row["user_level"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">性別</label>
                    <span class="form-control"><?php echo $row["gender"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">生日</label>
                    <span class="form-control"><?php echo $row["birth_date"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">電話</label>
                    <span class="form-control"><?php echo $row["phone"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <span class="form-control"><?php echo $row["email"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">住址</label>
                    <span class="form-control"><?php echo $row["address"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">建立日期</label>
                    <span class="form-control"><?php echo $row["create_time"] ?></span>
                </div>
                <div class="form-group">
                    <label for="">更新日期</label>
                    <span class="form-control"><?php echo $row["update_time"] ?></span>
                </div>
                <div class="form-group">
                    <a class='btn btn-info' href='update_user.php?edit=<?=$row["id"]?>' role='button'>修改</a>
                    <a class='btn btn-danger' href='delete_user.php?delete=<?=$row["id"]?>' role='button'>刪除</a>
                    <a class="btn btn-secondary" href="Member.php" role="button">回到會員列表</a>
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