                                      <?php 
    ob_start();
    session_start();
    #include '../inc/checklogin.php';
    #checkLogin();
    include('../inc/config.php');
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
          <h1>All Parcels Tracking
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Parcels Tracking</li>
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
                                <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                            <th>S/N</th>
                                            <th>Parcel Id</th>
                                            <th>Fullname</th>
                                            <th>Location</th>
                                            <th>Destination</th>
                                            <th>Reciever</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>    
                                        <tfoot>
                                            <tr>
                                          <th>S/N</th>
                                            <th>Parcel Id</th>
                                            <th>Fullname</th>
                                            <th>Location</th>
                                            <th>Destination</th>
                                            <th>Reciever</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                                         <?php
     $qt=mysqli_query($con,"SELECT  parcel.*,tracking.pid,tracking.stat from parcel,tracking where parcel.pid=tracking.pid order by id desc");
    $qc=mysqli_num_rows($qt);
    $c=1;
    if ($qc>0) {

     while($dy=mysqli_fetch_array($qt)){
    ?>
                      <tr>
                       <td><?php echo $c++; ?></td>
                        <td><?php echo $dy['pid']; ?></td>
                        <td><?php echo $dy['fullname']; ?></td>
                            <td><?php echo $dy['location']; ?></td>
                             <td><?php echo $dy['destination']; ?></td>
                              <td><?php echo $dy['reciever']; ?></td>
                                <td><?php echo $dy['stat']; ?></td>
                        <td><?php echo $dy['date_created']; ?></td>
                        <td><a href="pay.php?id=<?php echo $dy['id']; ?>" ><i class="fa fa-refresh text-primary"></i></a>|<a href="print.php?id=<?php echo $dy['id']; ?>" ><i class="fa fa-print text-default"></i></a>|<a href="edit-c.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to edit this record?')"><i class="fa fa-edit text-warning"></i></a>|
                        <a href="del-c.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a></td>
                        
                      </tr>
                    <?php
    }
                    
    } else {
    echo "<tr><td colspan='9'><center>No Parcel Tracking at the moment</center</td></tr>";
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