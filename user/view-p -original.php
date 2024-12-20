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
            <h1>All Parcels
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Parcels</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">

            <!-- Container fluid  -->
            <div class="container-fluid">
              <!-- Start Page Content -->
              <div class="row">
                <div class="col-md-12">
                  <div class="card"><?php $lib->msg(); ?>
                  <div class="card-body">
                    <div class="table-responsive m-t-40">
                      <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th>Cost</th>
                            <th>Charge</th>
                            <th>Destination_From</th>
                            <th>Destination_To</th>
                            <th>Current_Location</th>
                            <th>Reciever</th>
                            <th>Payment_Ref</th>
                            <th>Payment_Status</th>
                            <th>Delivery_Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>    
                        <tfoot>
                          <tr>
                            <th>S/N</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th>Cost</th>
                            <th>Charge</th>
                            <th>Destination_From</th>
                            <th>Destination_To</th>
                            <th>Current_Location</th>
                            <th>Reciever</th>
                            <th>Payment_Ref</th>
                            <th>Payment_Status</th>
                            <th>Delivery_Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                         <?php
                           $user=$crud->displayUser($_SESSION['id']);
                           $qt=$crud->displayAllWithOrder3('parcel',$user['id'],'id','desc');

                         $c=1;
                         if ($qt) {

                           foreach($qt as $dy){
                            $x=$crud->displayOne('user',$dy['reciever']);
                            $y=$crud->displayOne('user',$dy['user_id']);
                            $id=$x['id'];$name=$x['fullname'];
                            ?>
                            <tr>
                             <td><?php echo $c++; ?></td>
                             <td><?php echo $y['fullname']; ?></td>
                             <td><?php echo $y['email']; ?></td>
                             <td><?php echo $dy['type']; ?></td>
                             <td><?php echo $dy['qty']; ?></td>
                             <td><?php echo $lib->money('naira',$crud->displayCharge2($dy['type'],$dy['destination_from'],$dy['destination_to'])); ?></td>
                             <td><?php echo $lib->money('naira',$dy['charge']); ?></td>
                             <td><?php echo $dy['destination_from']; ?></td>
                             <td><?php echo $dy['destination_to']; ?></td>
                             <td><?php echo $dy['current_location']; ?></td>
                             <td><?php echo $name; ?></td>
                             <td><?php echo $dy['payment_ref']; ?></td>
                             <td><?php
                             if ($dy['payment_status'] == '0') {
                              echo "Not Paid";
                            } else {
                             echo "Paid";
                           }

                           ?></td>
                           <td><?php
                           if ($dy['delivery_status'] == '0') {
                            echo "Not Delivered";
                          } else {
                           echo "Delivered";
                         }

                         ?></td>
                         <td><?php echo $dy['date_created']; ?></td>
                         <td><a href="print.php?id=<?php echo $dy['id']; ?>" ><i class="fa fa-eye text-default"></i></a></td>

                        </tr>
                        <?php
                      }

                    } else {
                      echo "<tr><td colspan='9'><center>No Parcel at the moment</center</td></tr>";
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

 <!-- jQuery 2.1.3 -->
      <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
      <!-- Bootstrap 3.3.2 JS -->
      <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- DATA TABES SCRIPT -->
      <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
      <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src='../plugins/fastclick/fastclick.min.js'></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/app.min.js" type="text/javascript"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../dist/js/demo.js" type="text/javascript"></script>
      <!-- page script -->
      <script type="text/javascript">
        $(function () {
          $("#example1").dataTable();
          $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
          });
        });
      </script>
    </body>
    </html>