<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>
<?php
if(isset($_POST['submit'])){
$crud->insertNewSupervisor($_POST);
}
$place= $crud->displayAllWithOrder('location','id','desc');
?>

              <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gestion de Colis</title>
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
          <h1>Add Supervisors
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Supervisors</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
       						 <form action="#" method="post">
                            	<div class="container-fluid">
                            		<div class="row">
                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
							            <input type="text" class="form-control" placeholder="Full name" name="name" required="required" />
							            <span class="glyphicon glyphicon-user form-control-feedback"></span>
							            </div>
                            			</div>

                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
							            <input type="text" class="form-control" placeholder="Address" name="address" required="required" />
							            <span class="glyphicon glyphicon-home form-control-feedback"></span>
							            </div>
                            			</div>

                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
                            				<select class="form-control" name="gender" required="required">
                            					<option value="">--Select your gender--</option>
                            					<option value="male">MALE</option>
                            					<option value="female">FEMALE</option>
                            				</select>
							            </div>
                            			</div>

                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
							            <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="required" />
							            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
							            </div>
                            			</div>

                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
							            <input type="email" class="form-control" placeholder="Email" name="email" required="required" />
							            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							            </div>
                            			</div>

                            			<div class="col-md-4">
                            			<div class="form-group has-feedback">
							            <input type="text" class="form-control" placeholder="Password" name="password" required="required" />
							            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
							            </div>
                            			</div>

                                        <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <select class="form-control" required="required" name="loc">
                                                <option value="">--Select Location Point-</option>
                                                <?php foreach ($place as $k) { ?>
                                        <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                    <?php  } ?>
                                     </select>
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <select class="form-control" required="required" name="start_point">
                                                <option value="">--Select Location Start Point-</option>
                                                <?php foreach ($place as $k) { ?>
                                        <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                    <?php  } ?>
                                     </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <select class="form-control" required="required" name="end_point">
                                                <option value="">--Select Location End Point-</option>
                                                <?php foreach ($place as $k) { ?>
                                        <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                    <?php  } ?>
                                     </select>
                                        </div>
                                        </div>




                                       <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Location Description" name="locd" required="required" />
                                        <span class="glyphicon glyphicon-location form-control-feedback"></span>
                                        </div>
                                        </div>

                            			 <div class="col-md-4">
							             <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i>&nbsp;Add Supervisor</button>
							             </div>
                            			
                            			<div class="col-md-4">
							            <button type="reset" class="btn btn-danger btn-block btn-flat"><i class="fa fa-refresh"></i>&nbspClear</button>
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