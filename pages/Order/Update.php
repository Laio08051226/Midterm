<?php
include("db_connect_project.php");
if(isset($_POST["action"])&&($_POST["action"]=="update")){
$sql_query="UPDATE rental_orders SET order_id=?, user_name=?, product_name=?, order_method=?, product_price=?, order_qty=?, discount=?, shipping_cost=?, other_cost=?,
order_date=?, lease_start_date=?, lease_end_date=?, shipping_method=?, ship_to_address=?, payment_method=?, remark=? WHERE id=?";
$stmt = $conn->prepare($sql_query);


$stmt->bind_param("ssssiiiiisssssssi",$_POST["order_id"], $_POST["user_name"], $_POST["product_name"], $_POST["order_method"],
    $_POST["product_price"], $_POST["order_qty"], $_POST["discount"], $_POST["shipping_cost"], $_POST["other_cost"], $_POST["order_date"], $_POST["lease_start_date"],
    $_POST["lease_end_date"], $_POST["shipping_method"], $_POST["ship_to_address"], $_POST["payment_method"], $_POST["remark"], $_POST["id"]);

$stmt->execute();
$stmt->close();

header("Location: index.php");
$conn->close();
}
$sql_select = "SELECT id, order_id, user_name, product_name, order_method, product_price, order_qty, discount, shipping_cost, other_cost,
order_date, lease_start_date, lease_end_date, shipping_method, ship_to_address, payment_method, remark FROM rental_orders WHERE id=?";
$stmt=$conn->prepare($sql_select);
$stmt->bind_param("i",$_GET["id"]);
$stmt->execute();
$stmt->bind_result($id, $order_id, $user_name, $product_name, $order_method, $product_price, $order_qty, $discount, $shipping_cost, $other_cost,
    $order_date, $lease_start_date, $lease_end_date, $shipping_method, $ship_to_address, $payment_method, $remark);
$stmt->fetch();

?>
<!doctype html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
    <title>更新訂單資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 align="center">訂單管理系統 -更新功能</h1>
<p align="center"><a href="index.php">回主畫面</a></p>
        <div class="container">
               <form action="" method="post" name="formFix" id="formFix">
                    <table class="form-group" border="1" align="center" cellpadding="4">
                        <tr>
                            <th>欄位</th><th>資料</th>
                        </tr>
                        <tr>
                            <td>訂單編號 *</td><td><input type="text" name="order_id" id="order_id" value="<?=$order_id?>"></td>
                        </tr>
                        <tr>
                            <td>會員姓名 *</td><td><input type="text" name="user_name" id="user_name" value="<?=$user_name?>"></td>
                        </tr>
                        <tr>
                            <td>商品名稱v* </td><td><input type="text" name="product_name" id="product_name" value="<?=$product_name?>"></td>
                        </tr>
                        <tr>
                            <td>租賃/出售 *</td><td><input type="radio" name="order_method" id="radio" value="租賃"<?php if($order_method=="租賃") echo "checked";?>>租賃<input type="radio" name="order_method" id="radio" value="出售"<?php if($order_method=="出售") echo "checked";?>>出售</td>
                        </tr>
                        <tr>
                            <td>商品單價(含稅) *</td><td><input type="number" name="product_price" id="product_price" value="<?=$product_price?>"></td>
                        </tr>
                        <tr>
                            <td>商品數量 *</td><td><input type="text" name="order_qty" id="order_qty" value="<?=$order_qty?>"></td>
                        </tr>
                        <tr>
                            <td>折價活動折抵</td><td><input type="text" name="discount" id="discount" value="<?=$discount?>"></td>
                        </tr>
                        <tr>
                            <td>運費</td><td><input type="text" name="shipping_cost" id="shipping_cost" value="<?=$shipping_cost?>"></td>
                        </tr>
                        <tr>
                            <td>其它</td><td><input type="text" name="other_cost" id="other_cost" value="<?=$other_cost?>"></td>
                        </tr>
                        <tr>
                            <td>訂購時間 </td><td><input type="date" name="order_date" id="order_date" value="<?=$order_date?>"></td>
                        </tr>
                        <tr>
                            <td>租賃開始日期</td><td><input type="date" name="lease_start_date" id="lease_start_date" value="<?=$lease_start_date?>"></td>
                        </tr>
                        <tr>
                            <td>租賃結束日期</td><td><input type="date" name="lease_end_date" id="lease_end_date" value="<?=$lease_end_date?>"></td>
                        </tr>
                        <tr>
                            <td>運送方式</td><td><input type="radio" name="shipping_method" id="radio" value="宅配"<?php if($shipping_method=="宅配") echo "checked";?>>宅配<input type="radio" name="shipping_method" id="radio" value="店到店"<?php if($shipping_method=="店到店") echo "checked";?>>店到店</td>
                        </tr>
                        <tr>
                            <td>運送地址</td><td><input type="text" name="ship_to_address" id="ship_to_address" value="<?=$ship_to_address?>" size="80"></td>
                        </tr>
                        <tr>
                            <td>付款方式</td><td><input type="text" name="payment_method" id="payment_method" value="<?=$payment_method?>"></td>
                        </tr>
                        <tr>
                            <td>備註</td><td><textarea type="text" name="remark" id="remark" value="<?=$remark?>" size="300"></textarea></td>
                        </tr>
                        <tr>
                            <td class="form-group" colspan="2" align="center">
                                <input name="id" type="hidden" value="<?php echo $id;?>">
                                <input name="action" type="hidden" value="update">
                                <input type="submit" name="button" value="更新資料">
                                <input type="reset" name="button2" value="重新填寫">
                            </td>
                        </tr>
                    </table>
                </form>
        </div>
</body>
</html>
<?php
$stmt -> close();
$conn->close();
?>