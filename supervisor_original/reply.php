 <?php 
 $id=$_GET['id'];
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
		<h1>Complain/Request
		  <small></small>
		</h1>
		<ol class="breadcrumb">
		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		  <li class="active">Complain/Request</li>
		</ol>
	   </section>

	   <!-- Main content -->
	   <section class="content">

<?php
 $qt=mysqli_query($con,"SELECT chat.sender,chat.reciever,chat.message,chat.date_created from chat where chat.sender='$id' or chat.reciever='$id'  order by chat.id desc");
    $qc=mysqli_num_rows($qt);
    $c=1;
?>
		<div class='row'>
		  <div class='col-md-10 col-md-push-1'>
		    <!-- DIRECT CHAT -->
		    <div id="myDirectChat" class="box box-warning direct-chat direct-chat-warning">
			 <div class="box-header with-border">
			   <h3 class="box-title">Direct Chat</h3>
			   <div class="box-tools pull-right">
				<span data-toggle="tooltip" title=" <?php echo $qc; ?> New Messages" class='badge bg-yellow'><?php echo $qc; ?></span>
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
				<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			   </div>
			 </div><!-- /.box-header -->
			 <div class="box-body">
			   <!-- Conversations are loaded here -->
			   <div class="direct-chat-messages">
  <?php
    
    if ($qc>0) {

	while($dy=mysqli_fetch_array($qt)){


  ?>
 
				 <!-- Message to the right -->
				<div class="direct-chat-msg right">
				  <div class='direct-chat-info clearfix'>
				    <span class='direct-chat-name pull-right'><?php echo $dy['fullname']; ?></span>
				    <span class='direct-chat-timestamp pull-left'><?php echo $dy['date_created']; ?>|<a href="del-c.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a></span>
				  </div><!-- /.direct-chat-info -->
				  <?php
				  if ($dy['gender']=='male') {
				   ?>
				    <img class="direct-chat-img" src="../dist/img/avatar5.png" alt="message user image" /><!-- /.direct-chat-img -->
				    <?php
				  } else {
				  ?>
				   <img class="direct-chat-img" src="../dist/img/avatar2.png" alt="message user image" /><!-- /.direct-chat-img -->
				  <?php
				  } 
				  ?>
				 
				  <div class="direct-chat-text">
				    <?php echo $dy['message']; ?>
				  </div><!-- /.direct-chat-text -->
				</div><!-- /.direct-chat-msg -->
  <?php
	 }
	 
    ?> 
				  
 <?php
				
    } else {
    echo "<center>No Chat at the moment</center</td></tr>";
    }
    ?>


			   </div><!--/.direct-chat-messages-->


			   <!-- Contacts are loaded here -->
			   <div class="direct-chat-contacts">
				<ul class='contacts-list'>
				  <?php
 $qtt=mysqli_query($con,"SELECT * from user order by id desc");
    $qct=mysqli_num_rows($qtt);
	if ($qct>0) {
$ty=1;
	while($dx=mysqli_fetch_array($qtt)){
?>

				  <li>
				    <a href="reply.php?id=<?php echo $dx['id']; ?>">
					<?php
				  if ($dx['gender']=='male') {
				   ?>
				    <img class="direct-chat-img" src="../dist/img/avatar5.png" alt="message user image" /><!-- /.direct-chat-img -->
				    <?php
				  } else {
				  ?>
				   <img class="direct-chat-img" src="../dist/img/avatar2.png" alt="message user image" /><!-- /.direct-chat-img -->
				  <?php
				  } 
				  ?>
					 <div class='contacts-list-info'>
					   <span class='contacts-list-name'>
					    <?php echo $dx['fullname']; ?>
						<small class='contacts-list-date pull-right'><?php echo $dx['date_created']; ?></small>
					   </span>
					   <span class='contacts-list-msg'>User <?php echo $ty++; ?>...</span>
					 </div><!-- /.contacts-list-info -->
				    </a>
				  </li><!-- End Contact Item -->
 <?php
    }
				
    } else {
    echo "<center>No User at the moment</center>";
    }
    ?>
				
				</ul><!-- /.contatcts-list -->
			   </div><!-- /.direct-chat-pane -->

			 </div><!-- /.box-body -->
			 <div class="box-footer">
			   <form action="#" method="post">
				<div class="input-group">
				  <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
				  <span class="input-group-btn">
				    <button type="button" class="btn btn-warning btn-flat">Send</button>
				  </span>
				</div>
			   </form>
			 </div><!-- /.box-footer-->
		    </div><!--/.direct-chat -->
		  </div><!-- /.col -->

	    
		</div><!-- /.row -->


	   </section><!-- /.content -->
	 </div><!-- /.content-wrapper -->



    <?php
include 'footer.php';
    ?>
  </body>
</html>