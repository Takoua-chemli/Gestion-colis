<?php

include_once 'db/db.php';

class Config
{
	private $server=DB_SERVER;
	private $db=DB_NAME;
	private $user=DB_USER;
	private $password=DB_PASSWORD;

	protected $con;
	
	function __construct()
	{
		$this->con = new mysqli($this->server,$this->user,$this->password,$this->db);
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		}else{
			return $this->con;
		}
	}
	
}
?>
