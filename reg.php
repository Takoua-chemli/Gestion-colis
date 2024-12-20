<?php
ob_start();
require_once 'library/lib.php';
require_once 'classes/crud.php';

$lib=new Lib;
$crud=new Crud;

?>
<?php
if(isset($_POST['submit'])){
$crud->insertNewUser2($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PARCEL TRACKING SYSTEM</title>

  
  <!-- Custom fonts for this template-->
  <link href="users/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="users/css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
    body{
  background: url(users/images/a11.png) no-repeat;
  width:100%;
  min-height: 700px;
  background-size: cover;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
    }
  </style>

</head>

<body id="page-top">

  <!-- Head open -->

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">PARCEL TRACKING SYSTEM</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fa fa-bus"></i>
    </button>

  </nav>
<!-- close -->
  <div id="wrapper">

    <div id="content-wrapper">
<div class="container-fluid col-lg-7">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register to create an account</div>
      <div class="card-body"><?php $lib->msg(); ?>
        <form action="reg.php" method="post">
          <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="FullName" name="name" class="form-control" placeholder="FullName" required="required" autofocus="autofocus">
                  <label for="FullName">Fullname</label>
                </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                  <input type="email" id="Email" class="form-control" name="email" placeholder="Email" required="required">
                  <label for="Email">Email</label>
                </div>
          </div>
          <div class="form-group">
          <div class="form-label-group">
                  <input type="text" id="Password" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="Password">Password</label>
                </div>
          </div>
          <div class="form-group">
        <div class="form-label-group">
                  <input type="text" id="Phone" name="phone" class="form-control" placeholder="Phone Number" required="required">
                  <label for="Phone">Phone Number</label>
                </div>
          </div>
          <div class="form-group">
           <div class="form-label-group">
              <input type="text" id="Address" name="address" class="form-control" placeholder="Address" required="required">
              <label for="Address">Address</label>
            </div>
          </div>

           <div class="form-group">
                 <select class="form-control" required="required" name="gender">
                                      <option value="">--Select your gender--</option>
                                      <option value="male">MALE</option>
                                      <option value="female">FEMALE</option>
                                    </select>
            </div>
          </div>
          
          <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
         
        </form>
        <div class="text-center">
         <a class="d-block small mt-3" href="login.php">Click to Login</a>
         
          <a class="d-block small mt-3" href="index.html"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Back to Home</a>
        </div>
      </div>
    </div>
<br/>

  </div>



      <!-- /.container-fluid -->
<!-- Main close -->
  <!-- Bootstrap core JavaScript-->
  <script src="users/vendor/jquery/jquery.min.js"></script>
  <script src="users/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="users/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="users/vendor/chart.js/Chart.min.js"></script>
  <script src="users/vendor/datatables/jquery.dataTables.js"></script>
  <script src="users/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="users/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="users/js/demo/datatables-demo.js"></script>
  <script src="users/js/demo/chart-area-demo.js"></script>

</body>

</html>