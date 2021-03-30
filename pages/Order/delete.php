<?php
require_once("db_connect_project.php");
if(isset($_POST["action"])&&($_POST["action"]=="delete")){
    $sql_query="DELETE FROM rental_orders WHERE id=?";
    $stmt=$conn->prepare($sql_query);
    $stmt->bind_param("i",$_POST["id"]);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
}
$sql_select = "SELECT id, order_id, user_name, product_name, order_method, product_price, order_qty, discount, shipping_cost, other_cost,
order_date, lease_start_date, lease_end_date, shipping_method, ship_to_address, payment_method, remark FROM rental_orders WHERE id = ?";
$stmt=$conn->prepare($sql_select);
$stmt->bind_param("i",$_GET["id"]);
$stmt->execute();
$stmt->bind_result($id, $order_id, $user_name, $product_name, $order_method, $product_price, $order_qty, $discount, $shipping_cost, $other_cost,
    $order_date, $lease_start_date, $lease_end_date, $shipping_method, $ship_to_address, $payment_method, $remark);
$stmt->fetch();

?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
    <title>刪除訂單資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 align="center">訂單管理系統 - 刪除功能</h1>
<p align="center"><a href="index.php">回主畫面</a></p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg--4 col-md-6">
            <div class="card mt-3 p-2">
                <form action="" method="post" name="formFix" id="formFix">
                    <table border="1" align="center" cellpadding="4" class="form-group">
                        <tr>
                            <th>欄位</th>
                            <th>資料</th>
                        </tr>
                        <tr>
                            <td>訂單編號</td><td><?=$order_id?></td>
                        </tr>
                        <tr>
                            <td>會員姓名</td><td><?=$user_name?></td>
                        </tr>
                        <tr>
                            <td>商品名稱</td><td><?=$product_name?></td>
                        </tr>
                        <tr>
                            <td>租賃/出售</td>
                            <td><?php if($order_method=="租賃"){echo "租賃";}else{echo "出售";}?></td>
                        </tr>
                        <tr>
                            <td>商品單價(含稅)</td><td><?=$product_price?></td>
                        </tr>
                        <tr>
                            <td>商品數量</td><td><?=$order_qty?></td>
                        </tr>
                        <tr>
                            <td>折價活動折抵</td><td><?=$discount?></td>
                        </tr>
                        <tr>
                            <td>運費</td><td><?=$shipping_cost?></td>
                        </tr>
                        <tr>
                            <td>其它</td><td><?=$other_cost?></td>
                        </tr>
                        <tr>
                            <td>訂購時間</td><td><?=$order_date?></td>
                        </tr>
                        <tr>
                            <td>租賃開始日期</td><td><?=$lease_start_date?></td>
                        </tr>
                        <tr>
                            <td>租賃結束日期</td><td><?=$lease_end_date?></td>
                        </tr>
                        <tr>
                            <td>運送方式</td><td><?=$other_cost?></td>
                            <td><?php if($order_method=="宅配"){echo "宅配";}else{echo "店到店";}?></td>
                        </tr>
                        <tr>
                            <td>運送地址</td><td><?=$ship_to_address?></td>
                        </tr>
                        <tr>
                            <td>付款方式</td><td><?=$payment_method?></td>
                        </tr>
                        <tr>
                            <td>備註</td><td><?=$remark?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input name="id" type="hidden" value="<?php echo $id;?>">
                                <input name="action" type="hidden" value="delete">
                                <input type="submit" name="button" id="button" value="確定要刪除這筆資料嗎?">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
<?php
$stmt->close();
$conn-> close();
?>
