<?php
require_once ("connect.php");
$max=101;
empty($_GET["page"])? ($page=1):($page=$_GET["page"]);
$item_per_page=10;
$start=($page-1)*$item_per_page;


$sql_total="SELECT * FROM products WHERE product_status=1";
$sql="SELECT * FROM products WHERE product_status=1 LIMIT $start,$item_per_page";
//$sql="SELECT id,product_name,product_category,order_method,product_price,buffer_time,
//available_date,maintenance_cycle,shipping_method,product_img,product_info,product_inventory,
//rented_amount,product_status,create_date,buyer_list,remark FROM products WHERE id>$id ";

$result_total =$connect->query($sql_total);
$result=$connect->query($sql);

$total_item=$result_total->num_rows;
$total_page=floor($total_item/$item_per_page)+1;
if($total_item%$item_per_page==0){
    $total_page=$total_page-1;
}
$first_item=($page-1)*$item_per_page+1;
$last_item=$page*$item_per_page;

?>
<!doctype html>
<html lang="en">
  <head>
    <title>產品管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

      <style>
          .products-list:hover{
              background: #efefef;
          }
            .cell:hover{
                color: green;
              background: #ccc;
          }
            /*.page-link{*/
            /*    color:#8bdc8b;*/
            /*}*/
          /*.page-link:hover{*/
          /*    color: green;*/
          /*}*/
        .modal-footer .btn:hover{
            color:red;
        }
        #addbtn{
            background: green;
            color:white;
        }

      </style>

  </head>
  
  
  <body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  <aside class="main-sidebar sidebar-dark-primary elevation-0">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
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
          <li class="nav-header">植園</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                會員系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>所有會員列表</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>會員資格管理</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                訂單管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-seedling nav-icon"></i>
                  <p>租賃品訂單管理</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>販售品訂單管理</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                產品管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>租賃品交期管理</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>販售品管理</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="fas fa-chalkboard-teacher nav-icon"></i>
              <p>
                課程系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/projects.html" class="nav-link">
                  <i class="fas fa-user-alt-slash nav-icon"></i>
                  <p>會員資格管理</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                優惠券系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>      
        </ul>
        <div style="height:500px"></div>
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

                <a href="#" class="btn btn-app bg-success" type="button" data-toggle="modal" data-target=#add>
                  <i class="fas fa-user"></i>
                 Add new</a></li>
                 <span></span>
              <li class="breadcrumb-item"><div>
                <a class="btn btn-app bg-product" href="#">
                  <i class="fas fa-search "></i>
                  Search
                </a>
              </div></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">


      <!-- Default box -->
        <p class="m-3 py-2 text-right">共 <?= $total_page?> 頁，<?= $total_item ?> 筆 / 目前在第 <?= $page ?> 頁 / 顯示第 <?= $first_item ?> 至第 <?= $last_item ?> 筆</p>
      <div id="table-wrapper" class="card">
        <div class="card-header">
          <a class="btn btn-danger btn-sm" name="" href="#">
            <i class="fas fa-trash">
            </i>
            Batch Delete
          </a>

        </div>
        <div class="card-body p-0">

          <table  id="product-list" class="table table-bordered text-nowrap projects table-responsive" style="table-layout:fixed" >
              <thead>
                  <tr>
                      <th style="width:1%">
                        <input type="checkbox">
                      </th>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 7%">
                          商品名稱
                      </th>
                      <th style="width:3%">
                          商品分類
                      </th>
                      <th style="width:18%">
                          租賃/出售
                      </th>
                      <th style="width:15%">
                          費用/售價
                      </th>
                      <th style="width: 5%" class="text-center">
                          歸還緩衝時間<small>(日)</small>
                      </th>
                      <th style="width: 13%">
                          下次可租借日期
                      </th>
                      <th style="width: 13%">
                          維護週期<small>(日)</small>
                      </th>
                      <th style="width: 13%">
                          運送方式
                      </th>
                      <th style="width: 13%">
                          商品照片
                      </th>
                      <th style="width: 13%">
                          商品說明
                      </th>
                      <th style="width: 13%">
                          目前商品庫存量
                      </th>
                      <th style="width: 13%">
                          已出租/出售數量
                      </th>
                      <th style="width: 13%">
                          上架狀態
                      </th>
                      <th style="width: 13%">
                          更新日期
                      </th>
                      <th style="width: 13%">
                          曾訂購名單
                      </th>
                      <th style="width: 13%">

                      </th>
                                        </tr>
              </thead>
              <tbody>
<!--    從這裡開始寫變數-->
                  <?php
                  if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){

                  ?>
                  <tr class="products-list">

                      <td>
                      <form action="batch_delete_product.php" method="post">
                          <input type="checkbox" name="select_item[]" value="<?= $row["id"]?>">



                      </td>
                      <td class="id"><?= $row["id"]?> </td>
                      <td class="cell"><?= $row["product_name"]?></td>
                      <td class="cell"><?= $row["product_category"]?></td>
                      <td class="cell"><?= $row["order_method"]?></td>
                      <td class="cell align-right"><?= $row["product_price"]?></td>
                      <td class="cell"><?= $row["buffer_time"]?></td>
                      <td class="cell"><?= $row["available_date"]?></td>
                      <td class="cell"><?= $row["maintenance_cycle"]?></td>
                      <td class="cell"><?= $row["shipping_method"]?></td>
                      <td class="cell"><?= $row["product_img"]?>.jpg</td>
                      <td class="info-wrapper cell"> <small><p class="JQellipsis"><?= $row["product_info"]?></p></small></td>
                      <td class="cell"><?= $row["product_inventory"]?></td>
                      <td class="cell"><?= $row["rented_amount"]?></td>
<!--      product_status-->
                      <td class="project-state">
                          <span class="badge badge-success">Certified</span>
                      </td>
                      <td><?= $row["create_date"]?></td>
                      <td><?= $row["buyer_list"]?></td>

                      <td class="project-actions text-right">


                          <button class="btn btn-danger btn-sm" href="delete_product.php" type="submit">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                          <a class="btn btn-info btn-sm mb-1" href="#" data-toggle="modal" data-target="#edit" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                      </td>
                      </form>
<!--      search none  -->
                      <?php
                      }} else { ?>
                      <div class="card-body">搜尋不到該商品</div>
                      <?php
                      }
                        ?>
                  </tr>
                  
              </tbody>
          </table>
            <nav aria-label="Page navigation example" >
                <ul class="pagination m-3">


                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?= $page-1 ?>">Previous</a>
                    </li>
                     <?php for ($i=1;$i<=$total_page;$i++){ ?>
                    <li class="page-item <?php if($i==$page) echo"active" ?>">
                        <a class="page-link" href="index.php?page=<?=$i ?>"> <?=$i ?> </a></li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?= $page+1 ?>">Next</a>
                    </li>

                </ul>
            </nav>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>

      <!--      修改商品表單在這-->

      <div id="edit" class="modal inmodal fade"  tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
          <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="text-center"><p >修改商品資料</p></div>

                      <button type="button" class="close" data-dismiss="modal">
                          <span class="text-right">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" >

                      <form action="update_product.php" method="post" name="productEdit" id="productEdit">
                          <?php
                          $product_id=1;
//                              $_POST['product_id']  ;
                          $sql_edit = "SELECT * FROM products WHERE id = $product_id";
                          $result_edit = $connect->query($sql_edit);

                          if ($result_edit->num_rows>0) {
                          while($result_edit->fetch_assoc()){
                            foreach ($result_edit as $value_edit);
                                    //var_dump($value_edit); //$result_edit是一個陣列
                          ?>
                          <div class="">
                              <div class="form-group ">
                                  <label for="product_name">商品編號</label>
                                  <input type="text" class="form-control" name="id" id="product_id" value="<?php echo $value_edit["id"] ?>" readonly>
                                  <label for="product_name">商品名稱*</label>
                                  <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $value_edit["product_name"] ?>" >
                              </div>

                              <div class="row">
                                  <div class="col form-group">
                                      <label for="product_category">商品分類*</label>
                                      <select class="form-control custom-select" name="product_category" id="product_category">
                                          <option selected >選擇商品分類</option>
                                          <option value="1">大型盆栽</option>
                                          <option value="2">中型盆栽</option>
                                          <option value="3">小型盆栽</option>
                                          <option value="4">小菜盆栽</option>
                                          <option value="5">園藝工具</option>
                                          <option value="6">花草種子</option>
                                          <option value="7">精緻禮盒</option>
                                      </select>
                                  </div>
                                  <div class="col form-group">
                                      <label for="">租賃/出售*</label>
                                      <div class="row">
                                          <div class="m-2 form-check ">
                                              <input class="form-check-input " type="radio" name="order_method" value="租賃" checked>
                                              <label class="form-check-label" for="order_method1">
                                                  租賃
                                              </label>
                                          </div>
                                          <div class="m-2 form-check ">
                                              <input class="form-check-input " type="radio" name="order_method" value="出售">
                                              <label class="form-check-label" for="order_method2">
                                                  出售
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col form-group">
                                      <label for="product_price">租賃費用/售價*</label>
                                      <input type="number" class="form-control" name="product_price" id="product_price" min="0" value="<?= $value_edit["product_price"] ?>" placeholder="0" >
                                  </div>
                                  <div class="col form-group">
                                      <label for="buffer_time">歸還緩衝時間/日</label>
                                      <input type="number" class="form-control" id="buffer_time" name="buffer_time" min="0" value="<?= $value_edit["buffer_time"] ?>" placeholder="日">
                                  </div>
                                  <div class="col form-group">
                                      <label for="maintenance_cycle">維護週期</label>
                                      <input type="number" class="form-control" id="maintenance_cycle"  name="maintenance_cycle" min="0" value="<?= $value_edit["maintenance_cycle"] ?>" placeholder="日">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="available_date">下次可以租借日期</label>
                                  <input type="date" class="form-control" id="available_date" name="available_date" >
                              </div>
                              <div class="form-group">
                                  <label for="shipping_method">運送方式</label>
                                  <select class="form-control dropdown" id="shipping_method" name="shipping_method" >
                                      <option value="限宅配">限宅配</option>
                                      <option value="宅配/全家店到店">宅配/全家店到店</option>
                                  </select>
                              </div>

                              <div class="row">
                                  <div class="col form-group">
                                      <label for="product_inventory">目前商品庫存量</label>
                                      <input type="number" class="form-control" id="product_inventory" name="product_inventory" min="0" placeholder="請輸入商品庫存量">
                                  </div>
                                  <div class="col form-group">
                                      <label for="rented_amount">已出租/出售數量</label>
                                      <input type="number" class="form-control" id="rented_amount" name="rented_amount" min="0" placeholder="0">
                                  </div>

                              </div>

                              <div class="form-group">
                                  <label for="product_info">商品簡介</label>
                                  <input type="text" class="form-control" id="product_info" name="product_info" placeholder="請輸入商品簡介">
                              </div>
                              <div class="form-group">
                                  <label for="product_img">商品照片</label>
                                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img" >
                              </div>

                              <div class="form-group">
                                  <label for="product_status">上架狀態*</label>
                                  <select class="form-control dropdown" id="product_status" name="product_status" >
                                      <option value="1">上架</option>
                                      <option value="0">下架</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="remark">備註</label>
                                  <input type="text" class="form-control mb-3" id="remark" name="remark">
                              </div>
                              <div class="modal-footer" >
                                  <button id="addbtn" class="btn btn-block bg-primary" type="submit" >確定修改</button>
                                  <button class="btn bg-danger" data-dismiss="modal">取消</button>
                              </div>
                          <?php } }?>
                          </div>
                  </div>

                  </form>
              </div>

          </div>
      </div>
  </div>

      <!--      新增商品表單在這-->

      <div id="add" class="modal inmodal fade"  tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
          <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="text-center"><p >新增商品</p></div>
                      <button type="button" class="close" data-dismiss="modal">
                          <span class="text-right">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" >

                      <form action="insert_product.php" method="post" name="productAdd" id="productAdd">
                        <div class="">
                            <div class="form-group ">
                                <label for="product_name">商品名稱*</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" required placeholder="請輸入商品名稱">
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="product_category">商品分類*</label>
                                    <select class="form-control custom-select" name="product_category" id="product_category" required>
                                        <option selected >選擇商品分類</option>
                                        <option value="1">大型盆栽</option>
                                        <option value="2">中型盆栽</option>
                                        <option value="3">小型盆栽</option>
                                        <option value="4">小菜盆栽</option>
                                        <option value="5">園藝工具</option>
                                        <option value="6">花草種子</option>
                                        <option value="7">精緻禮盒</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                        <label for="">租賃/出售*</label>
                                        <div class="row">
                                            <div class="m-2 form-check ">
                                                <input class="form-check-input " type="radio" name="order_method" value="租賃" checked>
                                                <label class="form-check-label" for="order_method1">
                                                    租賃
                                                </label>
                                            </div>
                                            <div class="m-2 form-check ">
                                                <input class="form-check-input " type="radio" name="order_method" value="出售">
                                                <label class="form-check-label" for="order_method2">
                                                    出售
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <label for="product_price">租賃費用/售價*</label>
                                    <input type="number" class="form-control" name="product_price" id="product_price" min="0" placeholder="$" >
                                </div>
                                <div class="col form-group">
                                    <label for="buffer_time">歸還緩衝時間/日</label>
                                    <input type="number" class="form-control" id="buffer_time" name="buffer_time" min="0" placeholder="日">
                                </div>
                                <div class="col form-group">
                                    <label for="maintenance_cycle">維護週期</label>
                                    <input type="number" class="form-control" id="maintenance_cycle"  name="maintenance_cycle" min="0" placeholder="日">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="available_date">下次可以租借日期</label>
                                <input type="date" class="form-control" id="available_date" name="available_date" >
                            </div>
                            <div class="form-group">
                                <label for="shipping_method">運送方式</label>
                                <select class="form-control dropdown" id="shipping_method" name="shipping_method" >
                                    <option value="1">限宅配</option>
                                    <option value="2">宅配/全家店到店</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <label for="product_inventory">目前商品庫存量</label>
                                    <input type="number" class="form-control" id="product_inventory" name="product_inventory" min="0" placeholder="請輸入商品庫存量">
                                </div>
                                <div class="col form-group">
                                    <label for="rented_amount">已出租/出售數量</label>
                                    <input type="number" class="form-control" id="rented_amount" name="rented_amount" min="0" placeholder="0">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="product_info">商品簡介</label>
                                <input type="text" class="form-control" id="product_info" name="product_info" placeholder="請輸入商品簡介">
                            </div>
                            <div class="form-group">
                                <label for="product_img">商品照片</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img" >
                            </div>

                            <div class="form-group">
                                <label for="product_status">上架狀態*</label>
                                <select class="form-control dropdown" id="product_status" name="product_status" required>
                                    <option value="1">上架</option>
                                    <option value="0">下架</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="remark">備註</label>
                                <input type="text" class="form-control mb-3" id="remark" name="remark">
                            </div>
                            <div class="modal-footer" >
                                <button id="addbtn" class="btn btn-block bg-primary" type="submit" >確定新增</button>
                                <button class="btn bg-warning" type="reset" name="button2" value="重新填寫">重新填寫</button>
                                <button class="btn bg-danger" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                        </div>

                      </form>
                  </div>

              </div>
          </div>
      </div>

  </div>

  <script>

      function Edit(){
          let pid=document.getElementById('id').value;
          console.log( pid );

      }
  </script>
  <script>
      // product-info最多只能顯示15字元
      $(function(){
          let len = 15;
          $(".JQellipsis").each(function(i){
              if($(this).text().length>len){
                  $(this).attr("title",$(this).text());
                  let text=$(this).text().substring(0,len-1)+"...";
                  $(this).text(text);
              }
          });
      });

  </script>
  <script>

  </script>
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>      

  </body>
</html>