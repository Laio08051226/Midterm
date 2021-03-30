<?php
require_once("connect.php");
//require_once("connect.php");



$sql_cat= "SELECT * FROM category WHERE category_status >0 ORDER BY id ";
// $stmt=$connect->prepare($sql_cat);
// if($stmt->execute()==ture){
//     while($row=$stmt->fetch_assoc()){
//         echo $row;
//     }
// }else{
//     echo "資料讀取異常";
// }
$result_cat= $connect->query($sql_cat);

$total_cat = $result_cat->num_rows;


?>

<!doctype html>
<html lang="en">
<head>
    <title>產品分類管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>


    <style>
        .products-list:hover {
            background: #efefef;
        }

        .cell:hover {
            color: green;
            background: #ccc;
        }

        /*.page-link{*/
        /*    color:#8bdc8b;*/
        /*}*/
        /*.page-link:hover{*/
        /*    color: green;*/
        /*}*/
        .modal-footer .btn:hover {
            color: red;
        }

        #addbtn {
            background: green;
            color: white;
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
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
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
                    <a href="#" class="d-block">植園職員vv</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
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
                                商品管理
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="search.php" class="nav-link">
                                    <i class="fas fa-warehouse nav-icon"></i>
                                    <p>商品管理</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="category.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>商品分類管理</p>
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
<!--                    <div class="col-sm-6">-->
<!--                        <h1></h1>-->
<!--                    </div>-->
<!--                    <div class="col-sm-6">-->
<!--                        <ol class="breadcrumb float-sm-right">-->
<!--                            <li class="breadcrumb-item">-->
<!---->
<!--                                <a href="#" class="btn btn-app bg-success" type="button" data-toggle="modal"-->
<!--                                   data-target=#add>-->
<!--                                    <i class="fas fa-user"></i>-->
<!--                                    Add new</a></li>-->
<!--                            <span></span>-->
<!--                            <li class="breadcrumb-item">-->
<!--                                <div>-->
<!--                                    <a class="btn btn-app bg-product" href="#">-->
<!--                                        <i class="fas fa-search "></i>-->
<!--                                        Search-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ol>-->
<!--                    </div>-->
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">


            <!-- Default box -->

            <div id="table-wrapper" class="card">
                <div class="card-header">
                    <!--產品分類搜尋-->
                    <div class="col-md-2 p-2 float-right ">
                        <div class="form-group row">

                                <a class="col btn btn-success btn-sm m-1" href="#" type="button" data-toggle="modal" data-target=#addcat>
                                    <i class="fas fa-folder-plus mr-1"></i>
                                    </i>
                                    <p class="nowrap mb-0">Add Category</p>
                                </a>


                                <a class="col btn btn-danger btn-sm m-1" type="button" name="" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    <p class="nowrap mb-0">Batch Delete</p>
                                </a>

                       </div>


                </div>
                <div class="card-body p-5">

                    <table id="product-list" class="table table-bordered text-nowrap projects table-responsive "
                           style="table-layout:fixed">
                        <thead>
                        <tr >
                            <th style="width:1%">
                                <input type="checkbox">
                            </th>

                            <th style="width: 5%">
                                #
                            </th>
                            <th style="width: 7%">
                                商品分類名稱
                            </th>
                            <th style="width: 7%" class="text-center">
                                商品分類備註
                            </th>

                            <!--                                <th style="width: 13%">-->
                            <!---->
                            <!--                                </th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <script>
                            let product_list = [];

                        </script>

                        <!--    從這裡開始寫變數-->


                        <?php
                        if ($result_cat->num_rows > 0) {

                        while ($row = $result_cat->fetch_assoc()) {

                        ?>
                        <script>
                            product_list.push(<?=json_encode($row)?>);
                        </script>
                        <tr class="products-list">

                            <td>
                                <form action="delete_product.php" method="post">
                                    <input type="checkbox" name="select_item[]" value="<?= $row["id"] ?>">

                            </td>
                            <td class="id"><?= $row["id"] ?> </td>
                            <td class="cell"><?= $row["category_name"] ?></td>
                            <td class="col-md-3"><?= $row["category_remark"] ?></td>
                            <td class="project-actions text-right">


                                <a class="btn btn-danger btn-sm mb-1" href="#" data-toggle="modal" data-target="#delete"
                                   onclick="delProduct(<?= $row["id"] ?>)">
                                    <i class="fas fa-trash" >
                                    </i>
                                    Delete
                                </a>
                                <a class="btn btn-info btn-sm mb-1" href="#" data-toggle="modal" data-target="#edit"
                                   onclick="editProduct(<?= $row["id"] ?>)">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                            </td>
                            </form>
                            <!--      search none  -->
                            <?php
                            }
                            } else { ?>
                                <td colspan="17" class="card-body row-cols-lg-3">
                                    <div class="m-3">
                                        <p>很抱歉，搜尋不到該商品類別！</p>
                                        <a href="category.php">返回所有產品分類列表</a>
                                    </div>

                                </td>
                                <?php
                            }
                            ?>
                        </tr>

                        </tbody>
                    </table>

<!--                    <nav aria-label="Page navigation example">-->
<!--                        <ul class="pagination m-3">-->
<!---->
<!---->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="index.php?page=--><?//= $page - 1 ?><!--">Previous</a>-->
<!--                            </li>-->
<!--                            --><?php //for ($i = 1; $i <= $total_search_page; $i++) { ?>
<!--                                <li class="page-item --><?php //if ($i == $page) echo "active" ?><!--">-->
<!--                                    <a class="page-link" href="search.php?page=--><?//= $i ?><!--&product_search=--><?//= $product_search ?><!-- "> --><?//= $i ?><!-- </a></li>-->
<!--                            --><?php //} ?>
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="search.php?page=-->
<!--                                    --><?php
//                                if($page<$total_search_page){ echo $page+1;
//                                }else{ echo $page=1;}
//                                ?>
<!--                                    &product_search=--><?//= $product_search ?>
<!--                                    ">Next</a>-->
<!--                            </li>-->
<!---->
<!--                        </ul>-->
<!--                    </nav>-->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!--      刪除彈出視窗在這-->
        <div id="delete" class="modal inmodal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
             data-keyboard="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-dark">提醒
                        <button type="button" class="close" data-dismiss="modal">
                            <span class="text-right">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center "><p>確定要刪除此筆商品分類嗎?<p id="del_category_name"><p></p></div>

                        <form action="delete_category.php" method="post" id="catDel">
                            <div class="text-center">
                                <div class="form-group">
                                    <input  hidden type="text" class="form-control" name="del_category_id" id="del_category_id">
                                </div>
                                <button class="btn bg-danger" type="submit" href="delete_category.php">
                                    刪除</button>
                                <button class="btn bg-warning" data-dismiss="modal">取消</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--      修改商品表單在這-->

        <div id="edit" class="modal inmodal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
             data-keyboard="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="text-center"><p>修改商品資料</p></div>

                        <button type="button" class="close" data-dismiss="modal">
                            <span class="text-right">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="update_category.php" method="post" name="productEdit" id="productEdit">

                            <div class="">
                                <div class="form-group">
                                    <label for="edit_product_id">商品分類編號</label>
                                    <input type="text" class="form-control" name="id" id="edit_product_id" value=""
                                           readonly>
                                    <label for="edit_category_name">商品分類名稱*</label>
                                    <input type="text" class="form-control" name="product_name" id="edit_category_name"
                                           value="">
                                </div>

<!--                                <div class="row">-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="edit_product_category">商品分類*</label>-->
<!--                                        <select class="form-control custom-select" name="product_category"-->
<!--                                                id="edit_product_category">-->
<!--                                            <option >選擇商品分類</option>-->
<!--                                            <option value="1">大型盆栽</option>-->
<!--                                            <option value="2">中型盆栽</option>-->
<!--                                            <option value="3">小型盆栽</option>-->
<!--                                            <option value="4">小菜盆栽</option>-->
<!--                                            <option value="5">園藝工具</option>-->
<!--                                            <option value="6">花草種子</option>-->
<!--                                            <option value="7">精緻禮盒</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="">租賃/出售*</label>-->
<!--                                        <div class="row">-->
<!--                                            <div class="m-2 form-check">-->
<!--                                                <input class="form-check-input " type="radio" name="order_method"-->
<!--                                                       value="租賃" checked>-->
<!--                                                <label class="form-check-label" for="order_method1" id="order_method03">-->
<!--                                                    租賃-->
<!--                                                </label>-->
<!--                                            </div>-->
<!--                                            <div class="m-2 form-check ">-->
<!--                                                <input class="form-check-input " type="radio" name="order_method"-->
<!--                                                       value="出售" id="order_method04">-->
<!--                                                <label class="form-check-label" for="order_method2">-->
<!--                                                    出售-->
<!--                                                </label>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="product_price">租賃費用/售價*</label>-->
<!--                                        <input type="number" class="form-control" name="product_price"-->
<!--                                               id="edit_product_price" min="0" value="" placeholder="0">-->
<!--                                    </div>-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="buffer_time">歸還緩衝時間/日</label>-->
<!--                                        <input type="number" class="form-control" id="edit_buffer_time"-->
<!--                                               name="buffer_time" min="0" value="" placeholder="日">-->
<!--                                    </div>-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="maintenance_cycle">維護週期</label>-->
<!--                                        <input type="number" class="form-control" id="edit_maintenance_cycle"-->
<!--                                               name="maintenance_cycle" min="0" value="" placeholder="日">-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    <label for="available_date">下次可以租借日期</label>-->
<!--                                    <input type="date" class="form-control" id="edit_available_date"-->
<!--                                           name="available_date" value="edit_available_date">-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="shipping_method">運送方式</label>-->
<!--                                    <select class="form-control dropdown" id="edit_shipping_method"-->
<!--                                            name="shipping_method">-->
<!--                                        <option id="edit_shipping_method01" value="宅配">限宅配</option>-->
<!--                                        <option id="edit_shipping_method02" value="店到店">全家店到店</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="product_inventory">目前商品庫存量</label>-->
<!--                                        <input type="number" class="form-control" id="edit_product_inventory"-->
<!--                                               name="product_inventory" min="0" placeholder="請輸入商品庫存量">-->
<!--                                    </div>-->
<!--                                    <div class="col form-group">-->
<!--                                        <label for="rented_amount">已出租/出售數量</label>-->
<!--                                        <input type="number" class="form-control" id="edit_rented_amount"-->
<!--                                               name="rented_amount" min="0" placeholder="0">-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    <label for="product_info">商品簡介</label>-->
<!--                                    <input type="text" class="form-control" id="edit_product_info" name="product_info"-->
<!--                                           placeholder="請輸入商品簡介">-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="product_img">商品照片</label>-->
<!--                                    <input type="file" class="form-control-file" id="edit_product_img"-->
<!--                                           name="product_img">-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    <label for="product_status">上架狀態*</label>-->
<!--                                    <select class="form-control dropdown" id="edit_product_status"-->
<!--                                            name="product_status">-->
<!--                                        <option value="1">上架</option>-->
<!--                                        <option value="0">下架</option>-->
<!--                                    </select>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <label for="remark">備註</label>
                                    <input type="text" class="form-control mb-3" id="edit_remark" name="remark">
                                </div>
                                <div class="modal-footer">
                                    <button id="cat_edit_btn" class="btn btn-block bg-primary" type="submit"
                                            href="update_product.php">確定修改
                                    </button>
                                    <!--                                        <input value="刪除" class="btn bg-danger" type="submit" href="delete_product.php" >-->


                                    <button class="btn bg-warning" data-dismiss="modal">取消</button>

                                </div>
                            </div>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--      新增商品表單在這-->

    <div id="addcat" class="modal inmodal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
         data-keyboard="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center"><p>新增商品分類</p></div>
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="text-right">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="insert_category.php" method="post" name="catAdd" >
                        <div class="">
                            <div class="form-group ">
                                <label for="cat_name">商品分類名稱*</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" required
                                       placeholder="請輸入分類名稱">
                            </div>
<!--                            <div class="row">-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="product_category">商品分類*</label>-->
<!--                                    <select class="form-control custom-select" name="product_category"-->
<!--                                            id="product_category" required>-->
<!--                                        <option selected>選擇商品分類</option>-->
<!--                                        <option value="1">大型盆栽</option>-->
<!--                                        <option value="2">中型盆栽</option>-->
<!--                                        <option value="3">小型盆栽</option>-->
<!--                                        <option value="4">小菜盆栽</option>-->
<!--                                        <option value="5">園藝工具</option>-->
<!--                                        <option value="6">花草種子</option>-->
<!--                                        <option value="7">精緻禮盒</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="">租賃/出售*</label>-->
<!--                                    <div class="row">-->
<!--                                        <div class="m-2 form-check ">-->
<!--                                            <input class="form-check-input " type="radio" name="order_method" id="order_method01" value="租賃"-->
<!--                                                   checked>-->
<!--                                            <label class="form-check-label" for="order_method">-->
<!--                                                租賃-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                        <div class="m-2 form-check ">-->
<!--                                            <input class="form-check-input " type="radio" id="order_method02" name="order_method"-->
<!--                                                   value="出售">-->
<!--                                            <label class="form-check-label" for="order_method">-->
<!--                                                出售-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="product_price">租賃費用/售價*</label>-->
<!--                                    <input type="number" class="form-control" name="product_price" id="product_price"-->
<!--                                           min="0" placeholder="$">-->
<!--                                </div>-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="buffer_time">歸還緩衝時間/日</label>-->
<!--                                    <input type="number" class="form-control" id="buffer_time" name="buffer_time"-->
<!--                                           min="0" placeholder="日">-->
<!--                                </div>-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="maintenance_cycle">維護週期</label>-->
<!--                                    <input type="number" class="form-control" id="maintenance_cycle"-->
<!--                                           name="maintenance_cycle" min="0" placeholder="日">-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group">-->
<!--                                <label for="available_date">下次可以租借日期</label>-->
<!--                                <input type="date" class="form-control" id="available_date" name="available_date">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="shipping_method">運送方式</label>-->
<!--                                <select class="form-control dropdown" id="shipping_method" name="shipping_method">-->
<!--                                    <option selected disabled>請選擇運送方式</option>-->
<!--                                    <option value="宅配">限宅配</option>-->
<!--                                    <option value="店到店">全家店到店</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="product_inventory">目前商品庫存量</label>-->
<!--                                    <input type="number" class="form-control" id="product_inventory"-->
<!--                                           name="product_inventory" min="0" placeholder="請輸入商品庫存量">-->
<!--                                </div>-->
<!--                                <div class="col form-group">-->
<!--                                    <label for="rented_amount">已出租/出售數量</label>-->
<!--                                    <input type="number" class="form-control" id="rented_amount" name="rented_amount"-->
<!--                                           min="0" placeholder="0">-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group">-->
<!--                                <label for="product_info">商品簡介</label>-->
<!--                                <input type="text" class="form-control" id="product_info" name="product_info"-->
<!--                                       placeholder="請輸入商品簡介">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="product_img">商品照片</label>-->
<!--                                <input type="file" class="form-control-file" id="exampleFormControlFile1"-->
<!--                                       name="product_img">-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group">-->
<!--                                <label for="product_status">上架狀態*</label>-->
<!--                                <select class="form-control dropdown" id="product_status" name="product_status"-->
<!--                                        required>-->
<!--                                    <option value="1">上架</option>-->
<!--                                    <option value="0">下架</option>-->
<!--                                </select>-->
<!--                            </div>-->
                            <div class="form-group">
                                <label for="cat_remark">備註</label>
                                <input type="text" class="form-control mb-3" id="category_remark" name="category_remark">
                            </div>
                            <div class="modal-footer">
                                <button id="cat_add_btn" class="btn btn-block bg-primary" type="submit">確定新增</button>
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


</script>
<script>
    // product-info最多只能顯示15字元
    $(function () {
        let len = 15;
        $(".JQellipsis").each(function (i) {
            if ($(this).text().length > len) {
                $(this).attr("title", $(this).text());
                let text = $(this).text().substring(0, len - 1) + "...";
                $(this).text(text);
            }
        });
    });

    // 把該列product資料抓出來
    function editProduct(id) {
        // console.log(id)
        let product_detail = product_list.find((item, index) => {
            return item["id"] == id;
        })
        console.log(product_detail)
        document.getElementById("edit_category_name").value = product_detail.category_name;
        document.getElementById("edit_product_id").value = product_detail.id;

    }

</script>
<script>

    function delProduct(id){
        // console.log(id)
        let product_detail = product_list.find((item, index) => {
            return item["id"] == id;
        })
        console.log(product_detail);

        document.getElementById("del_category_id").value = product_detail.id;
        document.getElementById("del_category_name").innerText = product_detail.category_name;
    }


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

