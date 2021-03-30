<?php
require_once("../db_connect.php");

$id=$_GET["order_list"];
$sql="SELECT * FROM users WHERE id=$id AND valid=1";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $user_name=$row["user_name"];
}

$order_sql="SELECT user_order.*,products.name AS product_name,products.price FROM user_order JOIN products ON user_order.product_id=products.id WHERE user_order.user_id=$id";
$result_order=$conn->query($order_sql);

?>
<!doctype html>
<html lang="en">
<head>
    <title>會員訂購紀錄</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3><?=$user_name?> 的訂單紀錄</h3>
    <table class="table table-bordered table-hover table-sm">
        <thead class="table-success">
        <tr>
            <th>訂購日期</th>
            <th>品項</th>
            <th>單價</th>
            <th>數量</th>
            <th>小計</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($result_order->num_rows>0){
            while($row=$result_order->fetch_assoc()){
                $id=$row["id"];
                ?>
                <tr>
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <td><?= $row["order_date"]?></td>
                    <td><?= $row["product_name"]?></td>
                    <td><?= $row["price"]?></td>
                    <td><?= $row["amount"]?></td>
                    <td><?= $row["price"]*$row["amount"]?></td>
                </tr>
         <?php   }
        }
        ?>
        </tbody>
    </table>
    <div>
        <a class="btn btn-info" href="Member.php">回到會員列表</a>
    </div>
</div>
</body>
</html>
