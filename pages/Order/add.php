<?php
if(isset($_POST["action"])&&($_POST["action"]=="add")){
    require_once("db_connect_project.php");

    $sql_query = "INSERT INTO rental_orders(order_id, user_name, product_name, order_method, product_price, order_qty, discount, shipping_cost, other_cost,
order_date, lease_start_date, lease_end_date, shipping_method, ship_to_address, payment_method, remark) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt=$conn->prepare($sql_query);

$stmt->bind_param("ssssiiiiisssssss", $_POST["order_id"], $_POST["user_name"], $_POST["product_name"], $_POST["order_method"],
    $_POST["product_price"], $_POST["order_qty"], $_POST["discount"], $_POST["shipping_cost"], $_POST["other_cost"], $_POST["order_date"], $_POST["lease_start_date"],
    $_POST["lease_end_date"], $_POST["shipping_method"], $_POST["ship_to_address"], $_POST["payment_method"], $_POST["remark"]);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: index.php");
}
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
    <title>新增訂單</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 align="center">訂單管理系統 - 新增功能</h1>
<p align="center"><a href="index.php">回主畫面</a></p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg--4 col-md-6">
            <div class="card mt-3 p-2">
                <form action="" method="post" name="formAdd" id="formAdd">
                    <div class="form-group">
                            <h3>欄位</h3><h3>資料</h3>
                    </div>
                    <?php $day=date("Y/m/d")?>
                    <div>
                            <div class="form-group"><label for="order_id">訂單編號 *</label><input type="text" name="order_id" id="order_id"></div>
                            <div class="form-group"><label for="user_name">會員姓名 *</label><input type="text" name="user_name" id="user_name"></div>
                            <div class="form-group"><label for="product_name">商品名稱* </label><input type="text" name="product_name" id="product_name"></div>
                            <div class="form-group"><label for="order_method">租賃/出售 *</label><input type="radio" name="order_method" id="radio" value="租賃" checked>租賃<input type="radio" name="order_method" id="radio" value="出售">出售</div>
                            <div class="form-group"><label for="product_price">商品單價(含稅) *</label><input type="number" name="product_price" id="product_price"></td></div>
                            <div class="form-group"><label for="order_qty">商品數量 *</label><input type="text" name="order_qty" id="order_qty"></div>
                            <div class="form-group"><label for="discount">折價活動折抵</label><input type="text" name="discount" id="discount"></div>
                            <div class="form-group"><label for="shipping_cost">運費</label><input type="text" name="shipping_cost" id="shipping_cost"></div>
                            <div class="form-group"><label for="other_cost">其它</label><input type="text" name="other_cost" id="other_cost"></div>
                            <div class="form-group"><label for="order_date">訂購時間 </label><input type="text" name="order_date" id="order_date" value="<?=$day?>"></div>
                            <div class="form-group"><label for="lease_start_date">租賃開始日期</label><input type="date" name="lease_start_date" id="lease_start_date"></div>
                            <div class="form-group"><label for="lease_end_date">租賃結束日期</label><input type="date" name="lease_end_date" id="lease_end_date"></td>
                            <div class="form-group"><label for="shipping_method">運送方式</label><input type="radio" name="shipping_method" id="radio" value="宅配" checked>宅配<input type="radio" name="shipping_method" id="radio" value="店到店">店到店</div>
                            <div class="form-group"><label for="ship_to_address">運送地址</label><input type="text" name="ship_to_address" id="ship_to_address" size="80"></div>
                            <div class="form-group"><label for="payment_method">付款方式</label><input type="text" name="payment_method" id="payment_method"></div>
                            <div class="form-group"><label for="remark">備註</label><textarea type="text" name="remark" id="remark" size="300"></textarea></div>
                            <div class="form-group">
                                <input name="action" type="hidden" value="add">
                                <input type="submit" name="button1" value="新增資料">
                                <input type="reset" name="button2" value="重新填寫">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
<!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"-->
<!--        crossorigin="anonymous"></script>-->
</body>
</html>
