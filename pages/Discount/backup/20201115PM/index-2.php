<?php
header("Content-Type:text/htm;charset=utf-8");
include("../../db_connect_pdo.php");
$sql="SELECT * FROM hello123 WHERE valid = 1";
$stmt=$db_host->prepare($sql);
$users=array();
if($stmt->execute()==true){
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $users[]=$row;
  }
}else{
  echo "無法取得資料";
}
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
                <!-- <button href="#" class="btn btn-app bg-success" data-toggle="modal" data-target="#modal1">
                  <i class="fas fa-plus-square"></i> -->
                 <!-- Add new</button></li> -->
                 <button type="button" class="btn btn-app bg-success" data-toggle="modal" data-target="#AddNew">
                 <i class="fas fa-plus-square"></i>
                  Add New
                 </button>
                 </li>
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
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
            <i class="fas fa-trash">
            </i>
            Batch Delete
          </button>
        </div>
        <div class="card-body p-0 table-responsive-sm">
          <table class="table">
              <thead>
                  <tr>
                      <th style="width:8%"></th>
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
                  </tr>
              </thead>
              <tbody>
                  <?php
                  for($i=0;$i<=count($users)-1;$i++){?>
                  <tr class="">
                      <td class="project-actions text-left">  <!--#11-->
                        <form action="" method="" id="">
                          <a type="button" class="btn btn-info btn-md" id="<?=$i?>" onclick="accessID()">
                              <i class="fas fa-pencil-alt"></i>
                          </a>
                          <button type="sumbit" class="btn btn-danger btn-md delete_data" title="delete" data-toggle="modal" data-target="#Deletedata" name="delete" onclick="">
                              <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                      <td class="text-center">  <!--#1 checkbox-->
                      <input type="checkbox" name="chkbox<?php echo $row["id"];?>">
                      </td>
                      <td class="text-center">  <!--#2  id-->
                      <?=$users[$i]["id"]?>
                      </td>
                      <td class="text-center">  <!--#3  活動名稱-->
                      <?=$users[$i]["event_name"]?>
                      </td>
                      <td class="text-center">  <!--#4  活動分類-->
                      <?=$users[$i]["event_category"]?>
                      </td>
                      <td class="text-center">  <!--#5   起始日期-->
                      <?=$users[$i]["event_start"]?>
                      </td>
                      <td class="text-center">  <!--#6   結束日期-->
                      <?=$users[$i]["event_end"]?>
                      </td>
                      <td class="project-state">    <!--#7  活動內容-->
                      <?=$users[$i]["event_content"]?>
                      </td> <!--#8  活動折扣碼-->
                      <td class="text-center">
                      <?=$users[$i]["discount"]?>
                      </td>
                      <td class="text-center">  <!--#9  活動折扣數-->
                      <?=$users[$i]["percent_off"]?>
                      </td>
                      <td class="text-center">  <!--#10  Remark-->
                      <?=$users[$i]["event_remark"]?>
                      </td>
                      
                  </tr>                 
              <?php
              } ?>
              </tbody>
          </table>
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
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="" method="" id="">    
              <div class="col-md-9">
                  <ul class="right" type="none">
                      <li class="right"><label>活動名稱:</label><input type="text" class="form-control" name="promName"></li>
                      <li class="right"><label>活動分類:</label><input type="text" class="form-control" name="promCtg"></li>
                      <li class="right"><label>活動內容:</label><input type="text" class="form-control" name="promStart"></li>
                      <li class="right"><label>起始日期:</label><input type="text" class="form-control" name="promEnd"></li>
                      <li class="right"><label>結束日期:</label><input type="text" class="form-control" name="promCnt"></li>
                      <li class="right"><label>折扣碼:</label><input type="text" class="form-control" name="promDiscount"></li>
                      <li class="right"><label>折扣數:</label><input type="text" class="form-control" name="promPecntoff"></li>
                      <li class="right"><label>備註:</label><input type="text" class="form-control" name="promRemark"></li>

                  </ul>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick=doUpdate()>Update</button>
            <button type="button" class="btn btn-danger btn-lg" onclick=doDelete()>Delete</button>
          </div>
        </div>
      </div>
    </div>
  
    <script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
        });
      </script>
      <!-- Modal -->
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="container form-group">
                  <div class="row">
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動名稱:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text" ></div>
                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動類別:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>
                      start date
                      <div class="col-md-3 text-right" >
                          <label for="">活動開始時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">活動結束時間:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>
                      
                      <div class="col-md-3 text-right" >
                          <label for="">促銷內容:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">促銷活動碼:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">折扣數:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>

                      <div class="col-md-3 text-right" >
                          <label for="">其他注意事項:</label>
                      </div>
                      <div class="col-md-9"><input class="form-control" type="text"></div>

                  </div>
                </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->





  <!--jQuery.modal plugin-->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
  <script>
      function accessID(){
          $(document).on('click',function(){
            var id = $(this).attr("id")
          })
          
      } 
  </script>
           

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