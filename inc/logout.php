

<?php
session_start();
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>You have successfully logged out....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

header("Location: ../login.php"); // Redirecting To Home Page

?>



