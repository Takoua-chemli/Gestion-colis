
<?php
require_once 'library/lib.php';
require_once 'classes/crud.php';
require_once 'classes/auth.php';
?>

<?php
$lib=new Lib;
$validate=new Auth;
if (isset($_POST['login'])) {
$validate->check($_POST);
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

  <title>Gestion De Livraison</title>

  
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

    <a class="navbar-brand mr-1" href="index.html">Gestion De Livraison</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fa fa-bus"></i>
    </button>

  </nav>
<!-- close -->


  <div id="wrapper">



    <div id="content-wrapper">

<div class="container-fluid col-lg-4">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body"><?php $lib->msg();?>
        <form action="login.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
              <label for="inputEmail">Please enter your email:</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Please enter your password:</label>
            </div>
          </div>
          
          <div class="form-group">
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
         
        </form>
        <div class="text-center">
         <a class="d-block small mt-3" href="reg.php">Create an Account</a>
          <a class="d-block small mt-3" href="index.html"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Back to Home</a>
        </div>
      </div>
    </div>
<br/>

        </div>



      <!-- /.container-fluid -->
<!-- Main close -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  
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
<!-- footer close -->