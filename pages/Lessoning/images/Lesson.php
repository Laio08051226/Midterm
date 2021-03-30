<?php
require_once("db_connect.php");

if(isset($_GET["search"])){
    $search=$_GET["search"];
}else {
    $search="";
}
//while(empty($_GET["search"])==''){
//    return $search=$_GET["search"];
//    break;
//}
//課程資料總筆數
if(!empty($_GET["search"])){
    $search=$_GET["search"];
   $sql_lesson= "SELECT * FROM lesson_data WHERE lesson_valid=1 AND(
name LIKE '%$search%' OR category LIKE '%$search%' OR teacher LIKE '%$search%')";
}else{
    $sql_lesson="SELECT * FROM lesson_data WHERE lesson_valid=1";
}

$result_lesson=$conn->query($sql_lesson);
$total_item=$result_lesson->num_rows;

//$page= $_GET["page"];
if(isset($_GET["page"])){
    $page= $_GET["page"];
}else {
    $page=1;
}
$item_per_page=10;
$start=($page-1)*$item_per_page;

//取總頁數
$total_page= floor($total_item/$item_per_page+1);
if($total_item%$item_per_page==0)$total_page=$total_page-1;
//if($page>$total_page) $_GET["page"]=1;
//echo $total_page;
//$search=$_GET["search"];
//資料顯示方式
if(!empty($_GET["search"])){
    $search=$_GET["search"];
    $sql="SELECT * FROM lesson_data WHERE lesson_valid=1 AND(
name LIKE '%$search%' OR category LIKE '%$search%' OR teacher LIKE '%$search%')LIMIT $start,$item_per_page ";
    $result=$conn->query($sql);
    var_dump($result);
}else{
    $sql="SELECT * FROM lesson_data WHERE lesson_valid=1 LIMIT $start,$item_per_page";
    $result=$conn->query($sql);
}
//分頁
//$search=$_GET["search"];
//$sql_page="SELECT * FROM lesson_data WHERE lesson_valid=1 AND(
//name LIKE '%$search%' OR category LIKE '%$search%' OR teacher LIKE '%$search%')";
//$result_page=$conn->query($sql_page);
//$total_item=$result_page->num_rows;
//$total_page= floor($total_item/$item_per_page+1);
//if($total_item%$item_per_page==0)$total_page=$total_page-1;

//關鍵字搜尋
//$search=$_POST["search"];
//echo $search;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Lesson-書香</title>
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
    <a href="#" class="brand-link">
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
          <li class="nav-item menu-close">
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
          <li class="nav-item menu-close">
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
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                商品管理
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>商品管理</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-clipboard nav-icon"></i>
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
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-book-reader nav-icon"></i>
                  <p>課程列表</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                優惠券系統
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
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
            <div>
                目前在第<?=$page?>頁，共有<?=$total_page?>頁
            </div>
              <div>
                  總筆數為<?=$total_item?>筆
              </div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#" class="btn btn-app bg-success" data-toggle="modal" data-target="#add">
                  <i class="fas fa-book-open"></i>
                 新增課程</a></li>
                <!-- 彈出新增小視窗 -->
                <div class="modal" tabindex="-1" id="add" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">新增課程</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="insert_data.php" method="post">
                                    <div class="form-group">
                                        <label for="name">課程名稱</label>
                                        <input type="text" id="name" class="form-control " name="name">
<!--                                        <div id="validationServer03Feedback" class="invalid-feedback">-->
<!--                                            名稱已存在-->
<!--                                        </div>-->
                                    </div>
                                    <div class="form-group">
                                        <label for="">課程類別</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="多肉植物">多肉植物</option>
                                            <option value="不凋花">不凋花</option>
                                            <option value="苔球">苔球</option>
                                            <option value="植栽">植栽</option>
                                            <option value="限時活動">限時活動</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">開課日期</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="form-group ">
                                        <div class="form-row">
                                            <div class="col-4">
                                                <label for="">時數</label>
                                                <select name="hours" id="" class="form-control">
                                                    <option value="1">1小時</option>
                                                    <option value="2">2小時</option>
                                                    <option value="3">3小時</option>
                                                    <option value="4">4小時</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="">人數下限</label>
                                                <input type="number" class="form-control" min="2" max="5" name="min_people">
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    最少2人
                                                </small>
                                            </div>
                                            <div class="col-4">
                                                <label for="">人數上限</label>
                                                <input type="number" class="form-control" min="6" max="16" name="max_people">
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    最多16人
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-6">
                                                <label for="">老師</label>
                                                <input type="text" class="form-control" name="teacher">
                                            </div>
                                            <div class="col-6">
                                                <label for="">課程費用</label>
                                                <input type="text" class="form-control" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">課程簡介</label>
                                        <textarea class="form-control" name="info" placeholder="簡短介紹課程，50字以內" cols="40" rows="5" style="resize:none"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        <button type="submit" class="btn btn-success">新增</button>
                                    </div>
                                </form>
<!--                                <p>Modal body text goes here.</p>-->
                            </div>

                        </div>
                    </div>
                </div>
              <li class="breadcrumb-item"><div>
                <a class="btn btn-app bg-product" href="#">
                  <i class="fas fa-search "></i>
                  搜尋
                </a>

              </div></li>
            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header d-flex align-items-center">
            <div>
                <a class="btn btn-danger btn-sm batch-delete" href="#">
                    <i class="fas fa-trash">
                    </i>
                    批次刪除
                </a>
            </div>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="請輸入關鍵字..." name="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜尋</button>
                </form>
            </nav>
        </div>
        <div class="card-body p-0">
          <table class="table table-bordered table-hover table-responsive projects">
              <thead>
                  <tr class="text-nowrap text-center">
                      <th style="width:1%">
                        <input type="checkbox" class="check_btn" onclick="check()">
                      </th>
                      <th style="width: 5%">id</th>
                      <th style="width: 7%">課名</th>
                      <th style="width: 3%">分類</th>
                      <th style="width: 3%">開課日期</th>
                      <th style="width: 5%">時數</th>
                      <th style="width: 5%">人數下限</th>
                      <th style="width: 5%">人數上限</th>
                      <th style="width: 8%">老師</th>
                      <th style="width: 5%">費用</th>
                      <th style="width: 30%">課程簡介</th>
                      <th style="width: 5%">報名人數</th>
                      <th style="width: 5%">課程狀態</th>
                      <th style="width: 13%">創建日期</th>
                      <th style="width: 13%">更新日期</th>
                      <th style="width: 13%">操作</th>
                  </tr>
              </thead>
              <tbody class="table_body">
              <?php
              if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){ ?>
              <tr class="text-nowrap text-center">
                  <td>
                      <input type="checkbox" class="check_item" value="<?=$row["id"]?>">
                  </td>
                  <td><?= $row["id"]?></td>
                  <td><?= $row["name"]?></td>
                  <td><?= $row["category"]?></td>
                  <td><?= $row["date"]?></td>
                  <td><?= $row["hours"]?>hr</td>
                  <td><?= $row["min_people"]?></td>
                  <td><?= $row["max_people"]?></td>
                  <td><?= $row["teacher"]?></td>
                  <td>$<?= $row["price"]?></td>
                  <td class="text-wrap"><?= $row["info"]?></td>
                  <td><?= $row["current_people"]?></td>
                  <td class="project-state">
                      <?php
                        if($row["lesson_status"]==0){
                            echo '<span class="badge badge-danger">已額滿'.'</span>';
                        }elseif ($row["lesson_status"]==1){
                            echo '<span class="badge badge-success">可購買'.'</span>';
                        }else {
                            echo '<span class="badge badge-secondary">已結束'.'</span>';
                        }
                      ?>
                  </td>
                  <td><?= $row["create_day"]?></td>
                  <td><?= $row["update_time"]?></td>
                  <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="update_lesson_data.php?page=<?=$page?>&id=<?=$row["id"]?>&name=<?=$row["name"]?>">
                          <i class="fas fa-pencil-alt">
                          </i>
                          編輯
                      </a>
                      <a class="btn btn-danger btn-sm"  id="delete" href="#">
                          <i class="fas fa-trash">
                          </i>
                          刪除
                      </a>
                  </td>
              </tr>
                <?php  }
              }
              ?>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
        <nav class="d-flex justify-content-center" aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="index.php?page=<?php if($page<=1){echo $page=1;}else{echo $page-1;}?>&search=<?=$search?>">Previous</a></li>
                <?php for($i=1; $i<=$total_page; $i++){ ?>
                <li class="page-item <?php
                if($i==$page)echo "active";?>
                "><a class="page-link" href="index.php?page=<?=$i?>&search=<?=$search?>"><?=$i?></a></li>
               <?php }
                ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php if($page>$total_page-1){echo $page=1;}else{echo $page+1;}?>&search=<?=$search?>">Next</a></li>
            </ul>
        </nav>
      <!-- /.card -->
    </section>
  </div>
      <script>
          //單次刪除按鈕
          const table_body = document.querySelector(".table_body")
          // let delete_btn= document.querySelector("#delete");
          // let data_id= delete_btn.parentNode.parentNode.children[1]
          // let data_name= delete_btn.parentNode.parentNode.children[2]
          // console.log(data_name)
         table_body.addEventListener("click", function(event){
             // console.log(event.target)
              if(event.target.classList.contains("btn-danger")){
                  let data_id = event.target.parentNode.parentNode.children[1].innerHTML
                  let data_name= event.target.parentNode.parentNode.children[2].innerHTML
                  console.log(data_id)
                  console.log(data_name)
                  const result = Swal.fire({
                      title: `確定要刪除<br>${data_name} ?`,
                      text: `一經刪除就不可回復`,
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#d33',
                      cancelButtonColor: '#3085d6',
                      confirmButtonText: '確定刪除',
                      cancelButtonText: '返回',
                  }).then((result)=>{
                      console.log(result)
                      console.log(data_id)
                      if(result.value){
                          $.ajax({
                              method: "GET",
                              url: "delete_data.php",
                              // dataType: "json",
                              data: {
                                  id: data_id
                              }
                          })
                              .done(function () {
                                  // if(response.status==1){
                                  Swal.fire(
                                      '刪除成功!',
                                      '你的課程資料已經刪除',
                                      'success'
                                  )
                                  // setTimeout(window.location.replace(location.href),2000)
                                  setTimeout("window.location.href='index.php?page=1'",2000);
                              }).fail(function (jqXHr, textStatus) {
                              console.log("Request failed: "+ textStatus);
                          })
                      }
                  })
              }else if(event.target.classList.contains("check_item")){
                  let check_item = event.target
                  console.log(check_item)
                  if(check_item.checked == true){
                      check_item_id.push(check_item.value)
                  }else if(check_item.checked == false){

                  }else{
                      check_item_id=[]
                  }
              }
         })

      </script>
      <script>
          //全選checkbox
          var check_item_id = []
          function check(){
              let check_btn = document.querySelector(".check_btn")
              // console.log(check_btn)
              if(check_btn.checked==true){
                  // let check_item_value = []
                  let check_item = document.getElementsByClassName("check_item")
                  for(let i=0; i<check_item.length; i++){
                      check_item[i].checked = true;
                      check_item_id.push(check_item[i].value)
                      // console.log(check_item_id)
                  }
                  // if(check_item[i].checked == false){
                  //     let unSelected = check_item[i].value
                  //     check_item_id.indexOf(unSelected)
                  //     console.log(check_item_id)
                  // }
                  return (check_item_id)
              }else {
                  let check_item = document.getElementsByClassName("check_item")
                  for(let i=0; i<check_item.length; i++){
                      check_item[i].checked = false;
                      check_item_id=[]
                  }
              }
          }
      </script>
      <script>
          //批量刪除按鈕
          let batch_delete = document.querySelector(".batch-delete")
          batch_delete.addEventListener('click',function (){
              console.log("選取的ID為:" + check_item_id)
              // console.log(check_item_id[0])
              const result = Swal.fire({
                  title: `確定要刪除整批資料?`,
                  text: `一經刪除就不可回復`,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#a3a1a1',
                  confirmButtonText: '我確定刪除!',
                  cancelButtonText: '返回',
              // })
              }).then((result)=>{
                  // console.log(result)
                  // console.log(check_item_id)
                  // console.log(check_item_id[0])
                  if(result.value){
                      if(check_item_id.length != 0){
                          $.ajax({
                              method: "GET",
                              url: "batch_delete_data.php",
                              // dataType: "html",
                              data: {
                                  id: check_item_id
                              }

                          })
                              .done(function () {
                                  // if(response.status==1){
                                  Swal.fire(
                                      '刪除成功!',
                                      '你的課程資料已經刪除',
                                      'success'
                                  )
                                  // setTimeout(window.location.replace(location.href),2000)
                                  setTimeout("window.location.href='index.php?page=1'",2000);
                              }).fail(function (jqXHr, textStatus) {
                              console.log("Request failed: "+ textStatus);
                          })
                      }else if(check_item_id.length == 0){
                          Swal.fire(
                              '執行取消',
                              '你還沒有選取唷 :)',
                              'question'
                          )
                      }

                  }
              })
          })
      </script>
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