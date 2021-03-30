<?php
header("Content-Type:text/htm;charset=utf-8");
include("../../db_connect_pdo.php");
$total_sql="SELECT * FROM hello123 WHERE valid = 1";
$stmt=$db_host->prepare($total_sql);
$users=array();
if($stmt->execute()==true){
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $users[]=$row;
  }
}else{
  echo "無法取得資料";
}
$max = 200;
empty($_GET["page"])?($page=1):($page=$_GET["page"]);
$item_per_page = 10;
$start=($page-1)*$item_per_page;

$sql="SELECT * FROM　hello123 WHERE valid =1 LIMIT $start,$item_per_page";

$result_page = $db_host->query($sql);

$total_item=count($users);

$total_page = floor($total_item / $item_per_page) + 1;
if ($total_item % $item_per_page == 0)$total_page = $total_page -1;

$first_item = ($page-1)*$item_per_page + 1;
$last_item = $page*$item_per_page;

if($last_item>=$total_item)$last_item=$total_item;


?>
<!doctype html>
<html lang="en">
  <head>
    <title>促銷活動-安旗</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!--jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- BS4 Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <style>
        .event_table:hover {
            background: #efefef;
        }

        .cell:hover {
            color: green;
            background: #ccc;
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
          <li class="nav-item menu-close">
            <a class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                訂單管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Order/Order.php" class="nav-link">
                  <i class="fas fa-seedling nav-icon"></i>
                  <p>租賃品訂單管理</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>販售品訂單管理</p>
                </a>
              </li> -->
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
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                優惠券系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Discount.php" class="nav-link active">
                    <i class="fas fa-book-reader nav-icon"></i>
                  <p>優惠券管理</p>
                </a>
              </li>
            </ul>
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
                 
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <p class="m-3 py-2 text-right">共 <?= $total_page ?> 頁，<?= $total_item ?> 筆 / 目前在第 <?= $page ?> 頁 /
                顯示第 <?= $first_item ?> 至第 <?= $last_item ?> 筆</p>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
              <i class="fas fa-trash">
              </i>
              批次刪除
            </button>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#AddNew">
              <i class="fas fa-plus-square"></i>
              新增活動
            </button>
          </div>
          <div class="float-right">
              <form action="">
                <input type="text" placeholder="搜尋活動名稱">
                <button type="submit" class="btn btn-default">Search</button>
              </form>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table table-bordered text-nowrap projects table-responsive" id="event_table" style="table-layout:fixed">
              <thead>
                  <tr>
                      <th style="width:1%">     <!--#1 checkbox-->
                      <input type="checkbox" id="selectall">
                      </th>
                      <th style="width: 5%" class="text-center">    <!--#2  id-->
                          ID
                      </th>
                      <th style="width: 10%" class="text-center">    <!--#3  活動名稱-->
                          活動名稱
                      </th>
                      <th style="width:8%" class="text-center">     <!--#4  活動分類-->
                          活動分類
                      </th>
                      <th style="width:8%" class="text-center">    <!--#5   起始日期-->
                          起始日期
                      </th>
                      <th style="width:8%" class="text-center">    <!--#6   結束日期-->
                          結束日期
                      </th>
                      <th style="width: 25%" class="text-center">    <!--#7  活動內容-->
                          活動內容
                      </th>
                      <th style="width: 8%" class="text-center">   <!--#8-->
                          折扣碼
                      </th>
                      <th   style="width: 6%" class="text-center">  <!--#9-->
                          折扣數
                      </th>
                      <th class="text-center style="20%">  <!--#10-->
                          Remark
                      </th>
                      <th style="width:10%" class="text-center">操作</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  for($i=0;$i<=count($users)-1;$i++){?>
                  <tr class="">
                      <td class="text-center cell">  <!--#1 checkbox-->
                      <input type="checkbox" id="<?=$i+1?>">
                      </td>
                      <td class="text-center cell">  <!--#2  id-->
                      <?=$users[$i]["id"]?>
                      </td>
                      <td class="text-center cell">  <!--#3  活動名稱-->
                      <?=$users[$i]["event_name"]?>
                      </td>
                      <td class="text-center cell">  <!--#4  活動分類-->
                      <?=$users[$i]["event_category"]?>
                      </td>
                      <td class="text-center cell">  <!--#5   起始日期-->
                      <?=$users[$i]["event_start"]?>
                      </td>
                      <td class="text-center cell">  <!--#6   結束日期-->
                      <?=$users[$i]["event_end"]?>
                      </td>
                      <td class="text-center cell">    <!--#7  活動內容-->
                      <?=$users[$i]["event_content"]?>
                      </td> <!--#8  活動折扣碼-->
                      <td class="text-center cell">
                      <?=$users[$i]["discount"]?>
                      </td>
                      <td class="text-center cell">  <!--#9  活動折扣數-->
                      <?=$users[$i]["percent_off"]?>
                      </td>
                      <td class="text-center cell">  <!--#10  Remark-->
                      <?=$users[$i]["event_remark"]?>
                      </td>
                      <td class="project-actions text-center">  <!--#11-->
                        <form action="" method="">
                          <button type="button" class="btn btn-primary btn-sm view_btn" id="view_btn_<?=$users[$i]["id"]?>" data-toggle="modal" data-target="#View_data">
                              <i class="fas fa-eye"></i>
                          </button>

                          <button type="button" class="btn btn-info btn-sm upd_btn" id="upd_btn_<?=$users[$i]["id"]?>" data-toggle="modal" data-target="#Update_data">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="submit" class="btn btn-danger btn-sm del_btn" name="del_btn" id="del_btn_">
                              <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>

                  </tr>
              <?php
              } ?>
              </tbody>
          </table>
          <nav aria-label="Page navigation example">
              <ul class="pagination m-3">
                  <li class="page-item">
                      <a class="page-link" href="Discount.php?page=<?= $page - 1 ?>">Previous</a>
                  </li>
                  <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                      <li class="page-item <?php if ($i == $page) echo "active" ?>">
                          <a class="page-link" href="Discount.php?page=<?= $i ?>"> <?= $i ?> </a></li>
                  <?php } ?>
                  <li class="page-item">
                      <a class="page-link" href="Discount.php?page=<?= $page + 1 ?>">Next</a>
                  </li>

              </ul>
          </nav>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>

    <!--Insert Data Modal-->
    <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                  <ul type="none">
                      <li class="left">活動名稱:</li>
                      <li class="left">活動分類:</li>
                      <li class="left">起始日期:</li>
                      <li class="left">結束日期:</li>
                      <li class="left">活動內容:</li>
                      <li class="left">折扣碼:</li>
                      <li class="left">折扣數:</li>
                      <li class="left">備註:</li>
                  </ul>
              </div>
              <form action="insert_data.php" method="POST" id="">
                <div class="col-md-9">
                  <ul class="right" type="none">
                      <li class="right"><input type="text" class="form-control" name="event_name" id="evtName"></li>
                      <li class="right"><input type="text" class="form-control" name="event_category" id="evtCtg"></li>
                      <li class="right"><input type="text" class="form-control" name="event_start" id="evtStart"></li>
                      <li class="right"><input type="text" class="form-control" name="event_end" id="evtEnd"></li>
                      <li class="right"><input type="text" class="form-control" name="event_content" id="evtCnt"></li>
                      <li class="right"><input type="text" class="form-control" name="discount" id="evtDiscount"></li>
                      <li class="right"><input type="text" class="form-control" name="percent_off" id="evtPcentoff"></li>
                      <li class="right"><input type="text" class="form-control" name="event_remark" id="evtRemark"></li>
                  </ul>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="doInsert()">Add New Event!</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit data from Modal -->
    <div class="modal fade" id="Update_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">編輯活動資訊</h5></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="edit_data.php" method="POST" id="insert_form">
          <div class="modal-body">
              <div class="container form-group">
                  <div class="row">
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動名稱:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_name" id="event_name"></div>
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動類別:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_category" id="event_category"></div>
                      <!--start date-->
                      <div class="col-md-3 text-right" >
                          <label for="">活動開始時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_start" id="event_start"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">活動結束時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_end" id="event_end"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">促銷內容:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_content" id="event_content"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動碼:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="discount" id="discount"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">折扣數:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="percent_off" id="percent_off"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">其他注意事項:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_remark" id="event_remark"></div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" id="user_id" name="user_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="Delete_Btn">Delete</button>
              <button type="submit" class="btn btn-primary" id="Update_Btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="View_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">檢視活動資訊</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="" method="POST">
          <div class="modal-body">
              <div class="container form-group">
                  <div class="row">
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動名稱:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_name" id="PMO_name" disabled></div>
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動類別:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_category" id="PMO_category" disabled></div>
                      <!--start date-->
                      <div class="col-md-3 text-right" >
                          <label for="">活動開始時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_start" id="PMO_start" disabled></div>

                      <div class="col-md-3 text-right" >
                          <label for="">活動結束時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_end" id="PMO_end" disabled></div>

                      <div class="col-md-3 text-right" >
                          <label for="">促銷內容:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_content" id="PMO_content" disabled></div>

                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動碼:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="discount" id="PMOdiscount" disabled></div>

                      <div class="col-md-3 text-right" >
                          <label for="">折扣數:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="percent_off" id="PMOpercent_off" disabled></div>

                      <div class="col-md-3 text-right" >
                          <label for="">其他注意事項:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" name="event_remark" id="PMO_remark" disabled></div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  <script src="./js/append.js"></script>

  </body>
</html>
