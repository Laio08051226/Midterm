<?php
require_once("../db_connect.php");

$sql_account="SELECT * FROM users WHERE valid=1";
$result_account=$conn->query($sql_account);
$total_user=$result_account->num_rows;

if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
}
$user_per_page=10;
$start=($page-1)*$user_per_page;

$total_page=floor($total_user/$user_per_page)+1;
if($total_user%$user_per_page===0)$total_user=$total_page-1;

$first_account=($page-1)*$user_per_page+1;
$last_account=$page*$user_per_page;
if($last_account>=$total_user)$last_account=$total_user;

$sql="SELECT * FROM users WHERE valid=1 LIMIT $start,$user_per_page";
$result=$conn->query($sql);

//Search
if(!isset($_GET['search'])) {
    $sql="SELECT * FROM users WHERE valid=1 ORDER BY id LIMIT $start,$user_per_page";
}else{
    $search = $_GET['search'];
    $sql = "SELECT * FROM users WHERE account LIKE '%$search%' OR user_name LIKE '%$search%' OR user_level LIKE '%$search%' OR gender LIKE '%$search%' OR birth_date LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%' OR create_time LIKE '%$search%' OR update_time LIKE '%$search%' LIMIT $start,$user_per_page";
}
$result = $conn->query($sql);
$queryResult = $result->num_rows;
if(!isset($search)){
    $sql_search="SELECT * FROM users WHERE valid=1";
}else{
    $sql_search = "SELECT * FROM users WHERE account LIKE '%$search%' OR user_name LIKE '%$search%' OR user_level LIKE '%$search%' OR gender LIKE '%$search%' OR birth_date LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%' OR create_time LIKE '%$search%' OR update_time LIKE '%$search%'";
}


//
?>
<!doctype html>
<html lang="en">
  <head>
    <title>會員系統-梓平</title>
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
          <a href="#" class="d-block">您好，後台管理員!</a>
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
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                會員系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Member.php" class="nav-link active">
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
        <div style="height:500px"></div>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="height:5%">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <!-- <a href="Addnew.php" class="btn btn-app bg-success">
                  <i class="fas fa-user"></i>
                 Add new</a></li>
                 <span></span>
              <li class="breadcrumb-item"><div>
                <a class="btn btn-app bg-product" href="#">
                  <i class="fas fa-search "></i>
                  Search
                </a>
              </div>--></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <p class="m-3 py-2 text-right">共 <?=$total_page ?> 頁，<?=$total_user?>筆/目前在第<?=$page?>頁/顯示第<?=$first_account?>至第<?=$last_account?>筆</p>
      <div class="card">
        <div class="card-header">
          <div class="float-right">
            <div class="form-group">
              <form action="" method="get">
                  <input type="text" name="search" placeholder="Search"
                      <?php if(isset($_GET['search'])){?>
                          value="<?=$_GET['search']?>"
                      <?php } ?>>
                  <button type="submit" class="btn btn-info">Search</button>
                  <span class="text-primary">
                      There are <?=$queryResult?> results!
                  </span>
              </form>
            </div>
          </div>
          <div class="float-left">
              <a class="btn btn-danger btn-sm" href="doDelete.php">
                <i class="fas fa-trash">
                </i>
                批次刪除
              </a>
              <a href="Addnew.php" class="btn btn-sm btn-success">
                  <i class="fas fa-user-plus"></i>
                 新增會員
                </a>
          </div>            
        </div>

        <div class="card-body p-0">
          <table class="table table table-bordered text-nowrap projects table-responsive">
              <thead>
              <tr>
                  <th class="text-nowrap text-center"><input type='checkbox' name='checkboxes' value='checkbox'></th>
                  <th class="text-nowrap text-center">IDx</th>
                  <th class="text-nowrap text-center">帳號</th>
                  <th class="text-nowrap text-center">密碼</th>
                  <th class="text-nowrap text-center">會員姓名</th>
                  <th class="text-nowrap text-center">會員等級</th>
                  <th class="text-nowrap text-center">性別</th>
                  <th class="text-nowrap text-center">生日</th>
                  <th class="text-nowrap text-center">電話</th>
                  <th class="text-nowrap text-center">email</th>
                  <th class="text-nowrap text-center">住址</th>
                  <th class="text-nowrap text-center">建立日期</th>
                  <th class="text-nowrap text-center">更新日期</th>
                  <th class="text-nowrap text-center"></th>
              </tr>
              </thead>
              <tbody>
              <?php
              if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){ ?>
                      <tr>
                      <td class='text-nowrap text-center'><input type='checkbox' name='checkboxes' value='checkbox<?=$row["id"]?>'>
                      <td class='text-nowrap text-center'><?=$row["id"]?></td>
                      <td class='text-nowrap text-center'><?=$row["account"]?></td>
                      <td class='text-nowrap text-center'><?=$row["password"]?></td>
                      <td class='text-nowrap text-center'><?=$row["user_name"]?></td>
                      <td class='text-nowrap text-center'><?=$row["user_level"]?></td>
                      <td class='text-nowrap text-center'><?=$row["gender"]?></td>
                      <td class='text-nowrap text-center'><?=$row["birth_date"]?></td>
                      <td class='text-nowrap text-center'><?=$row["phone"]?></td>
                      <td class='text-nowrap text-center'><?=$row["email"]?></td>
                      <td class='text-nowrap text-center'><?=$row["address"]?></td>
                      <td class='text-nowrap text-center'><?=$row["create_time"]?></td>
                      <td class='text-nowrap text-center'><?=$row["update_time"]?></td>
                      <td>
                        <a type="button" class="btn btn-warning btn-sm" href="read_user.php?click=<?=$row["id"]?>">
                        <i class="fas fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-success btn-sm" href="user_order.php?order_list=<?=$row["id"]?>">
                        <i class="fas fa-shopping-cart"></i>
                        </a>
                        <a type="button" class="btn btn-info btn-sm" href="update_user.php?edit=<?=$row["id"]?>">
                        <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a type="button" class="btn btn-danger btn-sm" href="delete_user.php?delete=<?=$row["id"]?>">
                        <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
              <?php    }
              }
              ?>
                  </tr>
              </tbody>
          </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="Member.php?page=<?php if($page<=1){echo $page=1;}else{echo $page-1;}?>">Previous</a></li>
                    <?php for($i=1; $i<=$total_page; $i++){ ?>
                        <li class="page-item" <?php
                        if($i==$page)echo "active";
                        ?>"><a class="page-link" href="Member.php?page=<?=$i?>"><?=$i?></a></li>
                   <?php }?>
                    <li class="page-item"><a class="page-link" href="Member.php?page=<?php if($page>=$total_page){echo $page=$total_page;}else{echo $page+1;}?>">Next</a></li>
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