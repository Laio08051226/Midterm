<?php
require_once("../../../db_connect_project.php");

$sql_users="SELECT * FROM orders";
$result_users=$conn->query($sql_users);
$total_item=$result_users->num_rows;
$date=date("Y-m-d H:i:s");
$page=1;
$item_per_page=10;

$total_page=floor($total_item/$item_per_page)+1;
if($total_item%$item_per_page==0)$total_page=$total_page-1;

$first_item=($page-1)*$item_per_page+1;

$last_item=$page*$item_per_page;
if($last_item>=$total_item)$last_item=$total_item;

$start=($page-1)*$item_per_page;
//$last_page=;
$sql="SELECT * FROM orders WHERE order_method='lease' LIMIT $start,$item_per_page";
$result=$conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <title>user table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="py-2 text-right">
        目前在第 <?=$page?> 頁, 共有 <?=$total_page?> 頁
    </div>
    <div class="py-2 text-right">
        目前顯示 <?=$first_item?>~<?=$last_item?> 頁, 共有 <?=$total_item?> 筆資料
    </div>
    <table class="table table-bordered table-sm">
        <thead>
        <tr>
            <th>Order_id#</th>
            <th>Customer_name</th>
            <th>Product_name</th>
            <th>Order_method</th>
            <th>Product_price</th>
            <th>QTY</th>
            <th>Discount</th>
            <th>Shipping_cost</th>
            <th>Other_cost</th>
            <th>Total_amount</th>
            <th>Order_date</th>
            <th>Lease_start_date</th>
            <th>Lease_end_date</th>
            <th>Total_lease_days</th>
            <th>Order_status</th>
            <th>Shipping_method</th>
            <th>Address</th>
            <th>Payment </th>
            <th>Payment_status</th>
            <th>Remark</th>
        </tr>
        </thead>
        <tbody>
           <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?=$row["order_id"]?></td>
            <td><?=$row["user_name"]?></td>
            <td><?=$row["product_name"]?></td>
            <td><?=$row["order_method"]?></td>
            <td><?=$row["product_price"]?></td>
            <td><?=$row["order_qty"]?></td>
            <td><?=$row["discount"]?></td>
            <td><?=$row["shipping_cost"]?></td>
            <td><?=$row["other_cost"]?></td>
            <td><?=$row["product_price"]*$row["order_qty"]-$row["discount"]+$row["shipping_cost"]+$row["other_cost"]?></td>
            <td><?=$row["order_date"]?></td>
            <td><?=$row["lease_start_date"]?></td>
            <td><?=$row["lease_end_date"]?></td>
            <?php
            $d1=strtotime ($row["lease_start_date"]);
            $d2=strtotime ($row["lease_end_date"]);
            $days=round(($d1-$d2)/36000/24)
            ?>
            <td><?=$days?></td>
            <td><?=$row["order_status"]?></td>
            <td><?=$row["shipping_method"]?></td>
            <td><?=$row["address"]?></td>
            <td><?=$row["payment"]?></td>
            <td><?=$row["payment_status"]?></td>
            <td><?=$row["remark"]?></td>
                  <?php  }
            }
            ?>
        </tr>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="btn btn-info page-link" href="#">1</a></li>
        </ul>
    </nav>
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
