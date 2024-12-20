<?php
$info=$crud->displayLoginUser($_SESSION['id']);
?>
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>P</b>TS</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/user1-128x128.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"> <?php echo $info['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/user1-128x128.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $info['name']; ?> - Admin
                      <small>Admin since <?php echo $info['date_created']; ?></small>
                    </p>
                  </li>
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" onClick="return confirm('Are you sure you want to Logout?')" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>