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
  $crud->insertParcel($_POST,$_SESSION['id'],$lib->gen_receipt());
}
$place= $crud->displayAllWithOrder('location','id','desc');
$reciever= $crud->displayAllWithOrder('user','id','desc');
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
            <h1>Add Parcel
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Add Parcel</li>
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
                      <form action="add-p.php" method="post">
                       <div class="container-fluid">
                        <div class="row">




                         <div class="col-md-6">
                          <div class="form-group has-feedback">Parcel Type:
                            <select class="form-control" required="required" name="type">
                                      <option value="">--Select Category--</option>
                                      <option value="BAG (Below 10kg)">BAG (Below 10kg)</option>
                                       <option value="BAG (10-20kg)">BAG (10-20kg)</option>
                                       <option value="BAG (30-50kg)">BAG (30-50kg)</option>
                                      <option value="CARTON (Below 10g)">CARTON (Below 10g)</option>
                                      <option value="CARTON (10-30g)">CARTON (10-30g)</option>
                                      <option value="CARTON (30-50g)">CARTON (30-50g)</option>
                                      <option value="ENVELOPE (BIG)">ENVELOPE (BIG)</option>
                                       <option value="ENVELOPE (MEDIUM)">ENVELOPE (MEDIUM)</option>
                                        <option value="ENVELOPE (SMALL)">ENVELOPE (SMALL)</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group has-feedback">Quantity
                             <input type="number" class="form-control" placeholder="Quantity" name="qty" required="required" />
                             <span class="glyphicon glyphicon-home form-control-feedback"></span>
                           </div>
                         </div>

                          <div class="col-md-4">
                                      <div class="form-group has-feedback">Select Destination From

                                     <select class="form-control" required="required" name="dst_from">
                                      <option value="">--Select Destination From--</option>
                                      <?php foreach ($place as $k) { ?>
                                        <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                    <?php  } ?>
                                    </select>
                          </div></div>

                              <div class="col-md-4">
                                      <div class="form-group has-feedback">Select Destination To

                                     <select class="form-control" required="required" name="dst_to">
                                      <option value="">--Select Destination To--</option>
                                      <?php foreach ($place as $k) { ?>
                                        <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                    <?php  } ?>
                                    </select>
                          </div></div>


                           <div class="col-md-4">
                                      <div class="form-group has-feedback">Select Reciever

                                     <select class="form-control" required="required" name="reciever">
                                      <option value="">--Select Reciever--</option>
                                      <?php foreach ($reciever as $r) { ?>
                                        <option value="<?=$r['id']?>"><?=$r['fullname']?></option>
                                    <?php  } ?>
                                    </select>
                          </div></div>




                        <div class="col-md-4">
                          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i>&nbsp;Send Parcel</button>
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