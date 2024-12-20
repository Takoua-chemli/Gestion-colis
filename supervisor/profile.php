     <?php 
     ob_start();
     require_once '../library/lib.php';
     require_once '../classes/crud.php';

     $lib=new Lib;
     $crud=new Crud;

     $lib->check_login2();

     if(isset($_POST['submit'])){
        $crud->updateUser($_POST);
    }

    $pv=$crud->displayLoginUser($_SESSION['id']);
    ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Parcel Tracking System | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
   <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
    <link href="../plugins/style.css" rel="stylesheet" type="text/css" />

    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
<?php
include 'header.php';
?>
      <!-- Left side column. contains the logo and sidebar -->
<?php
include 'sidebar.php';
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>Profile
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>
        <?php
        if (!empty($_SESSION['pmsg'])) {
           ?>
            <div class="alert alert-dismissible" style="background: #fff;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?php echo $_SESSION['pmsg']; ?></strong>
               </div><br/>
      <?php
       } else {
            # code...
        }
        
        ?>
              
        <!-- Main content -->
        <section class="content">

              <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card"><?php $lib->msg(); ?>
                            <div class="card-body">
                   <form action="profile.php" method="post">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-4">
                                  <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Full name"  value="<?php echo $pv['name']; ?>" required="required" disabled/>
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                                  </div>



                                  <div class="col-md-4">
                                  <div class="form-group has-feedback">
                          <input type="email" class="form-control" placeholder="Email" value="<?php echo $pv['email']; ?>" disabled />
                          <input type="hidden" name="email" value="<?php echo $pv['email']; ?>"/>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                                  </div>

                                  <div class="col-md-4">
                                  <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $pv['password']; ?>" required="required" />
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                                  </div>

                                   <div class="col-md-4">
                           <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-refresh"></i>&nbsp;Update</button>
                           </div>
                                  
                                 
                                </div>
                                
                              </div>
         
        </form>     

                            </div>
                        </div>
    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


  <?php
include 'footer.php';
    ?>
  </body>
</html>