<?php
header("Content-Type:text/htm;charset=utf-8");
include("../../db_connect_pdo.php");
$sql="SELECT * FROM hello123 WHERE valid = 1";
$stmt=$db_host->prepare($sql);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!--jQuery.modal -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"> -->
    
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
          <li class="nav-header">EXAMPLES</li>
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
                <button href="#" class="btn btn-app bg-success" data-toggle="modal" data-target="#modal1">
                  <i class="fas fa-plus-square"></i>
                 Add new</button></li>
                 <span></span>
              <li class="breadcrumb-item"><div>
                <button class="btn btn-app bg-product" href="#">
                  <i class="fas fa-search "></i>
                  Search
                </button>
              </div></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
      Launch static backdrop modal
    </button>
    <section class="content"> -->

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-danger btn-sm" href="#">
            <i class="fas fa-trash">
            </i>
            Batch Delete
          </button>
        </div>
        <div class="card-body p-0 table-responsive-sm">
          <table class="table">
              <thead>
                  <tr>
                      <th style="width:1%">     <!--#1 checkbox-->
                      <input type="checkbox">
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
                      <th>  <!--#11-->

                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  if ($stmt->execute()){
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                             ?>
                  <tr class="">
                      <td class="text-center">  <!--#1 checkbox-->
                      <input type="checkbox" name="chkbox<?=$row["id"]?>">
                      </td>
                      <td class="text-center">  <!--#2  id-->
                      <?=$row["id"]?>
                      </td>
                      <td class="text-center">  <!--#3  活動名稱-->
                      <?=$row["event_name"]?>
                      </td>
                      <td class="text-center">  <!--#4  活動分類-->
                      <?=$row["event_category"]?>
                      </td>
                      <td class="text-center">  <!--#5   起始日期-->
                      <?=$row["event_start"]?>
                      </td>
                      <td class="text-center">  <!--#6   結束日期-->
                      <?=$row["event_end"]?>
                      </td>
                      <td class="project-state">    <!--#7  活動內容-->
                      <?=$row["event_content"]?>
                      </td> <!--#8  活動折扣碼-->
                      <td class="text-center">
                      <?=$row["discount"]?>
                      </td>
                      <td class="text-center">  <!--#9  活動折扣數-->
                      <?=$row["percent_off"]?>
                      </td>
                      <td class="text-center">  <!--#10  Remark-->
                      <?=$row["event_remark"]?>
                      </td>
                      <td class="project-actions text-right">  <!--#11-->
                          <button class="btn btn-info btn-sm" href="">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm" href="">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                      </td>
                  </tr>
                  <?php  }
                  }     ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">新增促銷活動</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <!-- <h6>Item Details</h6> -->
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-xs-6" style="padding-top: 2vh;">
                            </div>
                        </div>
                        <!-- <h6>Order Details</h6> -->
                        
                          <div class="row">
                            <div class="col-xs-6">
                                <ul type="none">
                                    <li class="left">活動名稱:</li>
                                    <li class="left">活動分類:</li>
                                    <li class="left">活動內容:</li>
                                    <li class="left">起始日期:</li>
                                    <li class="left">結束日期:</li>
                                    <li class="left">折扣碼:</li>
                                    <li class="left">折扣數:</li>
                                    <li class="left">備註:</li>
                            <div class="col-xs-6">
                                </ul>
                            </div>
                        <form action="insertdata.php" method="POST">    
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
                            <div class="modal-footer"><button type="submit" class="btn btn-primary" onclick="doInsert()">Add New Event!</button></div>
                          </div>
                        </form>
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
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
    </div> -->

  <!--jQuery.modal plugin-->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->

  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  
  <script src="../../dist/js/append.js"></script>

  </body>
</html>