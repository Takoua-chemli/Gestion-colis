<?php
include_once 'config.php';

class Auth extends Config
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function check($post)
	{
		$email=$this->sanitize($_POST['email']);
		$password=$this->sanitize($_POST['password']);
		$query = "SELECT * FROM login WHERE email= '$email' and password='$password'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			$this->setval(1,$row['email']);
			$this->role($row['role']);

			return $row;
		}else{
			$this->redirect('login');
		}
	}

	public function setval($login,$id)
	{
		$_SESSION['login'] = $login;
		$_SESSION['id'] = $id;
	}

	public function role($val)
	{
		$value=(int)$val;
		if ($value === 1) {
			$this->redirect('admin');
		} elseif ($value === 2) {
			$this->redirect('supervisor');
		} elseif ($value === 3) {
			$this->redirect('user');
		}else{
			return "invalid role";
		}
		
	}

	

	public function redirect($type)
	{
		if ($type === 'user') {
			header("location:user/dashboard.php");
		} else if ($type === 'admin') {
			header("location:admin/dashboard.php");
		}else if ($type === 'supervisor') {
			header("location:supervisor/dashboard.php");
		} elseif ($type === 'login') {
			header("location:login.php?msg=Invalid email or password!&type=error");
		} else {
			header("location:login.php?msg=No info found!&type=info");
		}

	}



	public function sanitize($str='')
	{
		 #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}

	}

}
?>
