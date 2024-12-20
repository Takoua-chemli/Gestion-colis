<?php
session_start();

class Lib
{
	
	function __construct()
	{
		# code...
	}



	public function encrypt($value)
	{
		return base64_encode($value);
	}

	public function decrypt($value)
	{
		return base64_decode($value);
	}

	public function money($type, $value)
{
    $result = null;
    $numericValue = floatval($value); // Convert $value to float
    switch ($type) {
        case "naira":
            $result = "&#8358;" . $this->currencyFormat($numericValue);
            break;
        case "pound":
            $result = "&#163;" . $this->currencyFormat($numericValue);
            break;
        case "yen":
            $result = "&#165;" . $this->currencyFormat($numericValue);
            break;
        case "euro":
            $result = "&#8364;" . $this->currencyFormat($numericValue);
            break;
        case "dollar":
            $result = "&#36;" . $this->currencyFormat($numericValue);
            break;
        case "tnd": // Nouveau cas pour TND
            $result = "&#8363;" . $this->currencyFormat($numericValue); // TND symbol is "&#8363;"
            break;
        default:
            $result = "" . $this->currencyFormat($numericValue);
    }
    return $result;
}


	public function currencyFormat($number)
	{
		$decimalplaces = 2;
		$decimalcharacter = '.';
		$thousandseparater = ',';
		return number_format($number,$decimalplaces,$decimalcharacter,$thousandseparater);
	}

	public function pre($arr)
	{
		echo '<pre>';
		print_r($arr);
	}

	public function date()
	{
		$date=date("d-m-y");
		return $date;
	}


	public function time()
	{
		$time=date("g:i A");
		return $time;
	}

	public function datetime()
	{
		$datetime=date("d-m-y @ g:i A");
		return $datetime;
	}


	public function genid()
	{
		return uniqid();
	}

	public function gen_receipt()
	{
		$brand = '#ref-';
		$cur_date = date('d').date('m').date('y');
		$invoice = $brand.$cur_date;
		$customer_id = rand(00000 , 99999);
		$uRefNo = $invoice.'-'.$customer_id;
		return $uRefNo;
	}


	public function gen_random_num($length = 10) {
		$number = '1234567890';
		$numberLength = strlen($number);
		$randomNumber = '';
		for ($i = 0; $i < $length; $i++) {
			$randomNumber .= $number[rand(0, $numberLength - 1)];
		}
		return $randomNumber;
	}



	public function redirect($url,$msg,$type)
	{
		if ($type === 'success') {
			$_SESSION['msg']="<span class='text-primary'>".$msg."</span>";
			header("location:$url");
		} else if ($type === 'error') {
			$_SESSION['msg']="<span class='text-error'>".$msg."</span>";
			header("location:$url");
		} else {
			$_SESSION['msg']="<span class='text-info'>NO INFO</span>";
			header("location:$url");
		}

	}

		public function redirect2($url)
	{
		header("location:$url");

	}

	public function msg()
	{
		if (isset($_GET['msg'])) {
			if ($_GET['type'] === 'success') {
				echo "<span style='color:green;'>".$_GET['msg']."</span>";
			} elseif ($_GET['type'] === 'info') {
				echo "<span style='color:blue;'>".$_GET['msg']."</span>";
			} elseif ($_GET['type'] === 'error'){
				echo "<span style='color:red;'>".$_GET['msg']."</span>";
			}else{
				echo "<span style='color:red;'>Invalid</span>";
			}
		}
	}



	public function checkmsg()
	{
		if(!empty($_SESSION['msg']))
		{	
			echo $_SESSION['msg'];
		}
		
	}


	public function check_login()
	{
		if($_SESSION['login']=="")
		{	
			$this->redirect('url?msg=You must login to access requested page!&type=error','','');
		}
	}



	public function check_login2()
	{
		if($_SESSION['login']=="")
		{	
			$msg="You must login to access requested page";	
			$this->redirect('../login.php',$msg,'error');
		}
	}

	public function check_id($value)
	{
		if(empty($value))
		{	
			
			$this->redirect2('index.php');
		}
	}


	public function logout()
	{
		$_SESSION['login'] = "";
		$_SESSION['id'] = "";
		session_unset();	
		$this->redirect('../login.php?msg=You have successfully logged out&type=success','','');
	}


	public function group_val($value)
	{
		if ($value === '1') {
			echo "Vehicle";
		}elseif ($value === '2') {
			echo "Property";
		}elseif ($value === '3') {
			echo "Service";
		}
	}



	public function clean($connection,$value)
	{
       #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($con,$str);
		}
	}


	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 
		
 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!"; 
		
	}

	//Category Grouping
	public function categoryValue($value)
	{
		$v= $this->cleanse($value);
		if ($v === '1') {
			$r="New";
		}elseif ($v === '2') {
			$r="Trending";
		}elseif ($v === '3') {
			$r="Special";
		}elseif ($v === '4') {
			$r="None";
		}else {
			$r="None";
		}

		return $r;
	}





	public function check_empty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "$value field empty <br />";
			}
		} 
		return $msg;
	}
	
	public function is_age_valid($age)
	{
		//if (is_numeric($age)) {
		if (preg_match("/^[0-9]+$/", $age)) {	
			return true;
		} 
		return false;
	}
	
	public function is_email_valid($email)
	{
		//if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
			return true;  
		}
		return false;
	}
}




function clear_error (){
	$this->ERROR = "";
}
//************************************************************
//	Strips whitespace (tab or space) from a string

function strip_space ($text){
	$Return = ereg_replace("([ 	]+)","",$text);
	return ($Return);
}

//************************************************************
//	Returns true if string contains only numbers

function is_allnumbers ($text){
	if ($this->CLEAR) { 
		$this->clear_error(); 
	}

	if (empty($text)){
		$this->ERROR =  " No value Submited";
		return false;
	}

	if ($text<1){
		$this->ERROR = "Should be positive numerics";
		return false;
	}
	if ( (gettype($text)) !=  "integer" ){ 
		return false; 
	}

	$Bad = $this->strip_numbers($text);

	if (empty($Bad)){
		return true;
	}
	return false;
}

//************************************************************

//Returns true if string contains only numbers

function is_nonNegNumber ($text){

	if ($this->CLEAR) { $this->clear_error(); }

	if (empty($text)){
		$this->ERROR = "No value submited";
		return false;
	}

	if ( (gettype($text)) == "float")	{ return true; }
	$Bad = eregi_replace("([0-9.])", "", $text);

	if (empty($Bad)){
		return true;
	}else {
		$this->ERROR = "Value should be Positive Integer";
		return false;
	}
}

//************************************************************

//	Strip numbers from a string

function strip_numbers ($text){
	$Stripped = eregi_replace("([0-9]+)", "", $text);
	return ($Stripped);
}

/**********************************************
* Checks a string for whitespace. True or False
**/
function has_space ($text){
	if ( ereg("[ 	]",$text) ){
		return true;
	}
	return false;
}

/****
**  Phone number validator
***/
function is_phone ($Phone = ""){
	if ($this->CLEAR) { $this->clear_error(); }

	if ( empty ( $Phone)){
		$this->ERROR = "No Phone number submitted";
		return false;
	}

	$Num = $Phone;
	$Num = $this->strip_space($Num);
	$Num = eregi_replace("(\(|\)|\-|\+)","",$Num);
	if (!$this->is_allnumbers($Num)){
		$this->ERROR = "bad data in phone number";
		return false;
	}

	if ( (strlen($Num)) < 7){
		$this->ERROR = "number is too short [$Num][$Phone]";
		return false;
	}

		// 000 000 000 0000
 		// CC  AC  PRE SUFX = max 13 digits

	if ( (strlen($Num)) > 13){
		$this->ERROR = "number is too long [$Num][$Phone]";
		return false;
	}

	return true;
}

/*****************
* Email validation
**/

function is_email ($email_address = ""){
	if ($this->CLEAR) { $this->clear_error(); }


	if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
		$this->ERROR = "Invalid email Address Submitted";
		return false;
	}

	function is_number($number)	{
		if (!preg_match("/^[0-9]+$/", $number)){
			return false;
		}
		return true;
	}

	function isfloat($number)	{
		// ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
		if (!preg_match("/^[0-9]*[\.][0-9]*+$/", $number)){
			return false;
		}
		return true;
	}



/******************************************************************
* This function checks the given string is alphanumeric word or not
* and return true or false accordingly.
**/
function is_alpha_numeric($str){
	if ( empty($str) ||$str=="" ) {
		$this->ERROR = "In Valid values Submited";
		return false;
	}
	if ( !preg_match("/^[A-Za-z0-9_ ]+$/", $str ) ) {
		$this->ERROR = "Please provide  valid  ";
		return false;
	}
	return true;
}
function is_only_alpha_numeric($str){
	if ( empty($str) ||$str=="" ) {
		$this->ERROR = "In Valid values Submited";
		return false;
	}
	if ( !preg_match("/^[A-Za-z0-9]+$/", $str ) ) {
		$this->ERROR = "Please provide  valid  ";
		return false;
	}
	return true;
}

function is_alpha($str){
	if ( empty($str) ||$str=="" ) {
		return false;
	}

	if ( !preg_match("/^[A-Za-z ]+$/", $str ) ) {
		return false;
	}
	return true;
}

function is_nullvalue($nullval){
	if ($this->CLEAR) { $this->clear_error(); }
	if ($nullval==""){
		$this->ERROR = "No content found";
		return false;
	}
	if (strlen($nullval)<1){
		$this->ERROR = "No content found";
		return false;
	}
	return true;
}





//MATHEMATICAL FUNCTIONS

}

?>

