<?php
require_once("db_connect_project.php");
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$item_per_page=10;
$start=($page-1)*$item_per_page;

$date=date("Y-m-d H:i:s");

if (!isset($_GET['search'])) {
    $sql="SELECT * FROM rental_orders ORDER BY id LIMIT $start,$item_per_page";
}else{
    $search = $_GET['search'];
    $sql = "SELECT * FROM rental_orders WHERE order_id LIKE '%$search%' OR user_name LIKE '%$search%' OR product_name LIKE '%$search%' OR order_method LIKE '%$search%' OR product_price LIKE '%$search%' OR order_qty LIKE '%$search%' OR discount LIKE '%$search%' OR shipping_cost LIKE '%$search%' OR other_cost LIKE '%$search%' OR order_date LIKE '%$search%' OR lease_start_date LIKE '%$search%' OR lease_end_date LIKE '%$search%' OR order_status LIKE '%$search%' OR shipping_method LIKE '%$search%' OR ship_to_address LIKE '%$search%' OR payment_method LIKE '%$search%' OR payment_status LIKE '%$search%' OR remark LIKE '%$search%' LIMIT $start,$item_per_page";

}
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if(!isset($search)){
    $sql_search="SELECT * FROM rental_orders";
}else{
    $sql_search = "SELECT * FROM rental_orders WHERE order_id LIKE '%$search%' OR user_name LIKE '%$search%' OR product_name LIKE '%$search%' OR order_method LIKE '%$search%' OR product_price LIKE '%$search%' OR order_qty LIKE '%$search%' OR discount LIKE '%$search%' OR shipping_cost LIKE '%$search%' OR other_cost LIKE '%$search%' OR order_date LIKE '%$search%' OR lease_start_date LIKE '%$search%' OR lease_end_date LIKE '%$search%' OR order_status LIKE '%$search%' OR shipping_method LIKE '%$search%' OR ship_to_address LIKE '%$search%' OR payment_method LIKE '%$search%' OR payment_status LIKE '%$search%' OR remark LIKE '%$search%'";

}
$result_search = $conn->query($sql_search);
$total_item = $result_search->num_rows;

$total_page=floor($total_item/$item_per_page)+1;
if($total_item%$item_per_page==0)$total_page=$total_page-1;

$first_item=($page-1)*$item_per_page+1;

$last_item=$page*$item_per_page;
if($last_item>=$total_item)$last_item=$total_item;

if(isset($_GET['search'])){
    $search=$_GET['search'];
}else{
    $search="";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Order-顏哥</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

  </head>

  <body class="hold-transition sidebar-mini">
  <td class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-0">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">植園後台管理系統</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">您好，後台管理員!</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                會員系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Membership/Member.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>所有會員列表</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                訂單管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Order.php" class="nav-link active">
                  <i class="fas fa-seedling nav-icon"></i>
                  <p>租賃品訂單管理</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                商品管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Products/Product.php" class="nav-link">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>商品管理</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="../Products/category.php" class="nav-link">
                    <i class="far fa-clipboard nav-icon"></i>
                    <p>商品分類管理</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a class="nav-link">
              <i class="fas fa-chalkboard-teacher nav-icon"></i>
              <p>
                課程系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Lessoning/Lesson.php" class="nav-link">
                    <i class="fas fa-book-reader nav-icon"></i>
                  <p>課程列表</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                優惠券系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Discount/Discount.php" class="nav-link">
                    <i class="fas fa-book-reader nav-icon"></i>
                  <p>優惠券管理</p>
                </a>
              </li>
            </ul>
          </li>      
        </ul>
        <div style="height:700px"></div>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              </li>
              <span></span>
              <li class="breadcrumb-item"><div>
              </div></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <p class="m-3 py-2 text-right">共 <?=$total_page?> 頁，<?=$total_item?> 筆 / 目前在第 <?=$page?> 頁 / 顯示第<?=$first_item?> 至第 <?=$last_item?> 筆</p>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="float-right">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search"
                    <?php if(isset($_GET['search'])){?>
                        value="<?=$_GET['search']?>"
                      <?php } ?>>
                <button type="submit" >Search</button>
                <?= "There are ".$total_item."results!";?>
            </form>
          </div>
          <div class="float-left row">
              <a class="btn btn-danger btn-sm" href="#">
                <i class="fas fa-trash">
                批次刪除
                </i>
              </a>
            <div style="width:3px"></div>
            <form class="post">
              <a type="button" class="button btn btn-sm btn-success display:inline block" name="Add new" value="" onclick="location.href='add.php'"><i class="fas fa-file-alt"><span></span>新增訂單</i>
              </a>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table table-bordered text-nowrap projects table-responsive">
              <thead>
                  <tr>
                      <th style="width:1%">
                        <input type="checkbox" class="check_btn" onclick="check()">
                      </th>
                      <th style="width: 5%" class="text-center">
                          Order_id#
                      </th>
                      <th style="width: 11%" class="text-center">
                          Customer_name
                      </th>
                      <th style="width: 20%" class="text-center">
                          Product_name
                      </th>
                      <th style="width:3%" class="text-center">
                          Order_method
                      </th>
                      <th style="width:10%" class="text-center">
                          Total_amount
                      </th>
                      <th style="width:12%" class="text-center">
                          Order_date
                      </th>
                      <th style="width:12%" class="text-center">
                          Lease_start_date
                      </th>
                      <th style="width:12%" class="text-center">
                          Lease_end_date
                      </th>
                      <th style="width: 5%" class="text-center">
                          Status
                      </th>
                      <th style="width: 13%" class="text-center">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($result)){?>
                  <tr class="">
                      <td>
                          <input type="checkbox" class="check_item" value="<?=$row["id"]?>">
                      </td>
                      <td>
                          <?=$row["order_id"]?>
                      </td>
                      <td>
                          <?=$row["user_name"]?>
                      </td>
                      <td>
                          <?=$row["product_name"]?>
                      </td>
                      <td>
                          <?=$row["order_method"]?>
                      </td>
                      <?php
                      $d1=strtotime ($row["lease_start_date"]);
                      $d2=strtotime ($row["lease_end_date"]);
                      $days=round(($d2-$d1)/36000/24)
                      ?>
                      <td>
                          <?=$row["product_price"]*$row["order_qty"]*$days-$row["discount"]+$row["shipping_cost"]+$row["other_cost"]?>
                      </td>
                      <td>
                          <?=$row["order_date"]?>
                      </td>
                      <td>
                          <?=$row["lease_start_date"]?>
                      </td>
                      <td>
                          <?=$row["lease_end_date"]?>
                      </td>
                      <?php

                      if($days > 0){
                          $status= "租賃中";
                          $color="badge badge-success";
                      }elseif($days == 0){
                          $status= "完成";
                          $color="badge badge-secondary";
                      }elseif ($days < 0){
                          $status= "取消訂單";
                          $color="badge badge-danger";
                      }
                      ?>
                      <td class="project-state">
                          <span class="<?=$color?>" id="www<?=$row['id']?>"><?=$status?></span>
                      </td>
                      <td>
                          <div class="container d-flex justify-content-center mt-100">
                              <!-- Button to Open the Modal --> <button type="button" class="btn openmodal" data-toggle="modal" data-target="#modal1"> Click here </button> <!-- The Modal -->
                              <div class="modal fade" id="modal1">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                              <h4 class="modal-title"><?=$row["product_name"]?><br> Limited Edition</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div> <!-- Modal body -->
                                          <div class="modal-body">
                                              <div class="container">
                                                  <h6>Item Details</h6>
                                                  <div class="row">
                                                      <div class="col"> <img class="img-fluid" src="https://i.imgur.com/iItpzRh.jpg"> </div>
                                                      <div class="col-xs-6" style="padding-top: 2vh;">
                                                          <ul type="none">
                                                              <li>Size: 11</li>
                                                              <li>Color: Desert Sage</li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <h6>Order Details</h6>
                                                  <div class="row">
                                                      <div class="col-xs-6">
                                                          <ul type="none">
                                                              <li class="left">Order number:</li>
                                                              <li class="left">Date:</li>
                                                              <li class="left">Price:</li>
                                                              <li class="left">Shipping:</li>
                                                              <li class="left">Total Price:</li>
                                                          </ul>
                                                      </div>
                                                      <div class="col-xs-6">
                                                          <ul class="right" type="none">
                                                              <li class="right">#BBRT-3456981</li>
                                                              <li class="right">19-03-2020</li>
                                                              <li class="right">$690</li>
                                                              <li class="right">$30</li>
                                                              <li class="right">$720</li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <h6>Shipment</h6>
                                                  <div class="row" style="border-bottom: none">
                                                      <div class="col-xs-6">
                                                          <ul type="none">
                                                              <li class="left">Estimated arrival</li>
                                                          </ul>
                                                      </div>
                                                      <div class="col-xs-6">
                                                          <ul type="none">
                                                              <li class="right">25-03-2020</li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div> <!-- Modal footer -->
                                          <div class="modal-footer"> <button type="button" class="btn">Track order</button> </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>
                      <td class="project-actions text-right">
                          <div class="btn btn-info btn-sm">
                              <i class="fas fa-pencil-alt">

                              <?="<td><a href='Update.php?id=".$row["id"]."'>Update</a>"?></i>
                          </div>
                      </td>
                      <td>
                          <div class="btn btn-danger btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                              <?="<td><a href='delete.php?id=".$row["id"]."'>Delete</a>"?>
                          </div>
                      </td>

                  </tr>
                  <tr>
                      <?php  }

                      ?>
              </tbody>
          </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                        <?php for($i=1;$i<=$total_page; $i++){?>
                            <li class="page-item <?php if($i==$page)echo "active";?>">
                            <a class="page-link" href="<?php
                            if(isset($search)){
                                echo "Order.php?page=".$i."&search=".$search;
                            }else{
                                echo "Order.php?page=".$i;
                            }
                            ?>"><?=$i?></a></li>
                            <?php
                        }?>

                    </ul>
            </nav>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  </div>

  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  </body>
</html>
<script>

</script>