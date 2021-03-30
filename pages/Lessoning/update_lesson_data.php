<?php
require_once("db_connect.php");
$id=$_GET["id"];
$page=$_GET["page"];
$name=$_GET["name"];

$sql="SELECT * FROM lesson_data WHERE id=$id";
$result=$conn->query($sql);
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

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-0">
    <!-- Brand Logo -->
    <a href="./Member.php" class="brand-link">
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
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>會員資格管理</p>
                </a>
              </li> -->
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
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="fas fa-chalkboard-teacher nav-icon"></i>
              <p>
                課程系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Lesson.php" class="nav-link active">
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
<!--                <div class="card-header">-->
<!--                    <h3>課程修改</h3>-->
<!--                </div>-->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Member.php?page=<?=$page?>">課程列表</a></li>
                        <li class="breadcrumb-item active" aria-current="page">課程修改-<?=$name?></li>
                    </ol>
                </nav>
                <div class="card-body p-5">
                    <?php
                    if($result->num_rows>0){
                        if($row=$result->fetch_assoc()){ ?>
                    <form action="doUpdate_lesson_data.php" class="text-left" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-1">
<!--                                    <label for="id">id</label>-->
                                    <input type="text" id="id" class="form-control" name="id" value="<?=$row["id"]?>" hidden>
                                </div>
                                <div class="col-1">
                                    <!--                                    <label for="id">id</label>-->
                                    <input type="text" id="page" class="form-control" name="page" value="<?=$page?>" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">課程名稱</label>
                            <input type="text" id="name" class="form-control" name="name" value="<?=$row["name"]?>">
                        </div>
                        <div class="form-group">
                            <label for="">課程類別</label>
                            <select name="category" id="" class="form-control" value="<?=$row["category"]?>">
                                <option value="多肉植物">多肉植物</option>
                                <option value="不凋花">不凋花</option>
                                <option value="苔球">苔球</option>
                                <option value="植栽">植栽</option>
                                <option value="限時活動">限時活動</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">開課日期</label>
                            <input type="date" class="form-control" name="date" value="<?= date('Y-m-d',strtotime($row['date']));?>">
                        </div>
                        <div class="form-group ">
                            <div class="form-row">
                                <div class="col-4">
                                    <label for="">時數</label>
                                    <select name="hours" id="" class="form-control" value="<?=$row["hours"]?>">
                                        <option <?php if($row["hours"]==1) echo "selected='on'";?>value="1">1小時</option>
                                        <option <?php if($row["hours"]==2) echo "selected='on'";?>value="2">2小時</option>
                                        <option <?php if($row["hours"]==3) echo "selected='on'";?>value="3">3小時</option>
                                        <option <?php if($row["hours"]==4) echo "selected='on'";?>value="4">4小時</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">人數下限</label>
                                    <input type="number" class="form-control" min="2" max="5" name="min_people" value="<?=$row["min_people"]?>">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        最少2人
                                    </small>
                                </div>
                                <div class="col-4">
                                    <label for="">人數上限</label>
                                    <input type="number" class="form-control" min="6" max="16" name="max_people" value="<?=$row["max_people"]?>">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        最多16人
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-4">
                                    <label for="">老師</label>
                                    <input type="text" class="form-control" name="teacher" value="<?=$row["teacher"]?>">
                                </div>
                                <div class="col-4">
                                    <label for="">課程費用</label>
                                    <input type="text" class="form-control" name="price" value="<?=$row["price"]?>">
                                </div>
                                <div class="col-4">
                                    <label for="">報名人數</label>
                                    <input type="text" class="form-control" name="current_people" value="<?=$row["current_people"]?>">
                                </div>
<!--                                <div class="col-3">-->
<!--                                    <label for="">課程狀態</label>-->
<!--                                    <select name="lesson_status" id="lesson_status" class="form-control" value="--><?//=$row["lesson_status"]?><!--">-->
<!--                                        <option --><?php //if($row["lesson_status"]==0) echo "selected='on'";?><!--value="0">已額滿</option>-->
<!--                                        <option --><?php //if($row["lesson_status"]==1) echo "selected='on'";?><!--value="1">可購買</option>-->
<!--                                        <option --><?php //if($row["lesson_status"]==2) echo "selected='on'";?><!--value="2">已結束</option>-->
<!--                                    </select>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">課程簡介</label>
                            <textarea class="form-control" name="info" placeholder="簡短介紹課程，50字以內" cols="40" rows="5" style="resize:none"><?=$row["info"]?></textarea>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="Lesson.php?page=<?=$page?>" role="button">上一頁</a>
                            <button type="submit" class="btn btn-success">修改</button>
                        </div>
                    </form>
                     <?php   }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>