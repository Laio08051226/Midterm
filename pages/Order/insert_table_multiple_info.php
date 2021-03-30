<?php
require_once("../../../db_connect_project.php");

$stmt = $conn->prepare("INSERT INTO rental_orders(order_id, user_name, product_name, order_method, product_price, order_qty, discount, shipping_cost,other_cost,
order_date, lease_start_date, lease_end_date, order_status, shipping_method, ship_to_address, payment_method, payment_status,remark)
VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssiiiiisssssssss', $order_id, $user_name, $product_name, $order_method, $product_price, $order_qty, $discount, $shipping_cost,$other_cost,
$order_date, $lease_start_date, $lease_end_date, $order_status, $shipping_method, $ship_to_address, $payment_method, $payment_status, $remark);

$order_id="#10051";
$user_name="Freddie";
$product_name="小天使大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=1;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-01";
$lease_start_date="2020/12/28";
$lease_end_date="2021-09-16";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="臺中市西屯區臺南大道二段1號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10052";
$user_name="Hilde";
$product_name="天堂鳥大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=2;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-01";
$lease_start_date="2020/12/26";
$lease_end_date="2021-09-18";
$order_status="取消訂單";
$shipping_method="宅配";
$ship_to_address="臺中市西屯區臺南大道一段100號";
$payment_method="credit card";
$payment_status="unpaid";
$remark=1;
$stmt->execute();

$order_id="#10053";
$user_name="Maisie";
$product_name="灰玫瑰大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=3;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-02";
$lease_start_date="2020/12/24";
$lease_end_date="2021-09-20";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="臺中市西屯區臺南大道一段1號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10054";
$user_name="Hart";
$product_name="莫德蘭孔雀大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=4;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-02";
$lease_start_date="2020/12/22";
$lease_end_date="2021-09-22";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="台北市松山區園區街83號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10055";
$user_name="Dina";
$product_name="斑葉海桐大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=5;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-03";
$lease_start_date="2020/12/20";
$lease_end_date="2021-09-24";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="台北市松山區園區街1331號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10056";
$user_name="Laraine";
$product_name="琴葉榕大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=1;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-03";
$lease_start_date="2020/12/18";
$lease_end_date="2021-09-26";
$order_status="租賃中";
$shipping_method="店到店/宅配";
$ship_to_address="台北市松山區園區街1239號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10057";
$user_name="Stephanie";
$product_name="龜背竹大型植栽";
$order_method="租賃";
$product_price=50;
$order_qty=2;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-04";
$lease_start_date="2020/12/16";
$lease_end_date="2021-09-28";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="台北市松山區園區街1813號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10058";
$user_name="Waly";
$product_name="永士雲集 – 招貴人盆栽";
$order_method="租賃";
$product_price=50;
$order_qty=3;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-04";
$lease_start_date="2020/12/14";
$lease_end_date="2021-09-03";
$order_status="取消訂單";
$shipping_method="店到店/宅配";
$ship_to_address="台北市松山區園區街100號";
$payment_method="credit card";
$payment_status="unpaid";
$remark=1;
$stmt->execute();

$order_id="#10059";
$user_name="Waverley";
$product_name="植藝交響曲 – 大氣桌花";
$order_method="租賃";
$product_price=50;
$order_qty=4;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-05";
$lease_start_date="2020/12/12";
$lease_end_date="2021-09-06";
$order_status="租賃中";
$shipping_method="宅配";
$ship_to_address="臺中市西屯區臺灣大道十段119號";
$payment_method="credit card";
$payment_status="paid";
$remark=1;
$stmt->execute();

$order_id="#10060";
$user_name="Chloe";
$product_name="紅心蝴蝶 – 第一名蘭花盆栽";
$order_method="租賃";
$product_price=50;
$order_qty=5;
$discount=70;
$shipping_cost=70;
$other_cost=0;
$order_date="2020-11-05";
$lease_start_date="2020/12/10";
$lease_end_date="2021-09-09";
$order_status="取消訂單";
$shipping_method="店到店/宅配";
$ship_to_address="桃園市中壢區春德路1191號";
$payment_method="credit card";
$payment_status="unpaid";
$remark=1;
$stmt->execute();

$stmt->close();