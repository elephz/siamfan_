<?php include "command/indexcommand.php";?>
<?php if (isset($_SESSION["admin_id"])) { 
    $adminnamd = $_SESSION["admin_name"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/csscustom.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link logout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'aside.php';?>
<?php
 echo '<script type="text/javascript">';
 echo "var page = 'p';";
 echo '</script>';
if(isset($_GET['p'])){
  $p = $_GET['p'];
  echo '<script type="text/javascript">';
  echo "page = '$p';";
  echo '</script>';
} ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ตารางสมาชิกทั้งหมด</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <form>
                  <div class="form-row">

                    <div class="form-group col-md-2">
                      <label for="inputEmail4">ค้นหาตามรายชื่อ</label>
                      <input type="text" placeholder ="ค้นหาตามรายชื่อ" id="search" class='form-control '>
                    </div>
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-3"></div>
                   
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">แสดงตามเพศ</label>
                      <select name=""  class='form-control gender'>
                      <option value="0">เลือกทั้งหมด</option>
                      <?php  while ($gerderlist = mysqli_fetch_assoc($gender)) {?>
                        <option value="<?php echo $gerderlist['Gender_id'] ?>"><?php echo $gerderlist['Gender_name'] ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <label for="inputPassword4">รายการ</label>
                      <select name=""  class='form-control limit'>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    </div>
                    <div class="form-group col-md-1 text-right ">
                    <label for="inputPassword4">ระงับการใช้งาน</label>
                      <label class='switch '>
                            <input type='checkbox' check='false'  class='switch2'  >
                            <span class='slider'></span>
                        </label>
                    </div>
                  </div>
                </form>
                
                
                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example"  class="table">
                  <thead>
                  <tr>
                    <th>รหัสสมาชิก</th>
                    <th>ชื่อ</th>
                    <th>เพศ</th>
                    <th>อายุ</th>
                    <th>สมัครเมื่อ</th>
                    <th>ระงับการใช้งาน</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <div class="row pagination-row d-inline-block">
                  <nav aria-label="Page navigation example">
                      <ul class="pagination">
                          <li class="page-item previous"><a class="page-link btn-control" control='left' href="#">Previous</a></li>

                          <li class="page-item"><a class="page-link btn-control" control='right' href="#">Next</a></li>
                      </ul>
                  </nav>
                </div>
                <div class='text-right float-right d-inline-block'>Showing <span id='start' ></span> to <span id='end' ></span> of <span id='total' ></span> entries</div>
                <div class="clearfix"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- modal -->
  <div class="modal fade" id="report">
  <!-- modal-lg -->
        <div class="modal-dialog "> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดการรายงาน</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="mocal-footer">
                    
                </div>
            </div>
        </div>
    </div>
        <!-- modal -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>

<script src="asstes/script/alluser.js"></script>
<script src="asstes/script/logout.js"></script>


</body>
</html>
<?php  }else{
   header("Location: login.php ");
} ?>