     <?php 
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();

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
          <h1>All Supervisors
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Supervisors</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

                          <div class="alert alert-dismissible" style="background: #fff;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?php $lib->msg(); ?></strong>
               </div><br/>

              <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        	<tr>
					                        <th>S/N</th>
					                        <th>Fullname</th>
					                        <th>Gender</th>
                                   <th>Address</th>
                                    <th>Phone</th>
					                        <th>Email</th>
					                        <th>Password</th>
                                             <th>Location</th>
                                             <th>Location Description</th>
                                             <th>Date_Created</th>
					                       
					                      </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>S/N</th>
					                        <th>Fullname</th>
					                        <th>Gender</th>
                                   <th>Address</th>
                                    <th>Phone</th>
					                        <th>Email</th>
					                        <th>Password</th>
                                            <th>Location</th>
                                            <th>Location Description</th>
                                            <th>Date_Created</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
     $qt=$crud->displayAllWithOrder('supervisor','id','desc');
    $c=1;
    if ($qt) {

     foreach($qt as $dy){
    ?>
                      <tr>
                       <td><?php echo $c++; ?></td>
                        <td><?php echo $dy['fullname']; ?></td>
                        <td><?php echo $dy['gender']; ?></td>
                        <td><?php echo $dy['address']; ?></td>
                        <td><?php echo $dy['phone']; ?></td>
                        <td><?php echo $dy['email']; ?></td>
                        <td><?php echo $dy['password']; ?></td>
                        <td><?php echo $dy['location']; ?></td>
                        <td><?php echo $dy['location_desc']; ?></td>
                        <td><?php echo $dy['date_created']; ?></td>
                        
                      </tr>
                    <?php
    }
                    
    } else {
    echo "<tr><td colspan='9'><center>No Supervisor at the moment</center</td></tr>";
    }
    ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


  <?php
include 'footer.php';
    ?>
  </body>
</html>