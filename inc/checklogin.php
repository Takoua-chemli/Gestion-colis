<?php
function check_login()
{
if($_SESSION['login']=="")
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../login.php";	
		$_SESSION['msg']='<span style="color:red;">'."Session is expired, please login..".'</span>';	
		header("Location: http://$host$uri/$extra");
	}
}
?>