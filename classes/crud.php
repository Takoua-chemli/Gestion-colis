<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllWithOr($user_id)
	{
		$query = "SELECT * FROM chat where sender='$user_id' or reciever='$user_id ' order by id desc";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	//Display with Order


	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


	public function displayAllWithOrder2($table,$user,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE user_id='$user' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



		public function displayAllWithOrder3($table,$user,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE user_id='$user' or reciever='$user' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayUser2($v1,$v2)
	{
		
		$query = "SELECT * FROM user where id='$v1' or id='$v2' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}





	//Display with Limit
	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


	//Display Specific
	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM $table where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


	public function displayUser($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM user where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


	public function displayUser3($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM user where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}




	public function displayLoginUser($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


	public function displayParcelUser($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM user where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}





	public function displayParcelSupervisor($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM supervisor where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}



	
//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM $table");
		return $q->num_rows;
	}


	public function countAllById($table,$id)
	{
		$q=$this->con->query("SELECT id FROM $table where sender='$id' or reciever='$id' ");
		return $q->num_rows;
	}


	public function countAllParcelUser($table,$id)
	{
		$q=$this->con->query("SELECT user_id FROM $table where user_id='$id' ");
		return $q->num_rows;
	}



	public function countAllComplain($table,$id)
	{
		$q=$this->con->query("SELECT sender FROM $table where sender='$id' ");
		return $q->num_rows;
	}



//Counting Specific
	
	
// Inserting
	public function insertData($post)
	{
		$value1 = $this->cleanse($_POST['value1']);
		$value2 = $this->cleanse($_POST['value2']);
		$query="INSERT INTO table(col1,col2) VALUES('$value1','$value2')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:url?msg=Data was successfully inserted&type=success");
		}else{
			header("Location:url?msg=Error adding data try again!&type=error");
		}
	}

	public function insertChat($post,$id)
	{
		$msg = $this->cleanse($_POST['message']);
		$admin= 'admin';
		$user=$this->displayUser($id);
		$user_id=$user['id'];

		$query="INSERT INTO chat(sender,reciever,message) VALUES('$user_id','$admin','$msg')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:chat.php?msg=Data was successfully inserted&type=success");
		}else{
			header("Location:chat.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertChat2($post,$id)
	{
		$msg = $this->cleanse($_POST['message']);
		$admin= 'admin';
		$user=$this->displayUser($id);
		$user_id=$user['id'];

		$query="INSERT INTO chat(sender,reciever,message) VALUES('$user_id','$admin','$msg')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:chat.php?msg=Data was successfully inserted&type=success");
		}else{
			header("Location:chat.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertChat3($post)
	{
		$msg = $this->cleanse($_POST['message']);
		$id= $this->cleanse($_POST['id']);
		$admin= 'admin';

		$query="INSERT INTO chat(sender,reciever,message) VALUES('$admin','$id','$msg')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:reply.php?id=$id&msg=Data was successfully inserted&type=success");
		}else{
			header("Location:reply.php?id=$id&msg=Error adding data try again!&type=error");
		}
	}






	public function insertNewUser($post)
	{
		$name=$this->cleanse($_POST['name']);
		$address=$this->cleanse($_POST['address']);
		$gender=$this->cleanse($_POST['gender']);
		$phone=$this->cleanse($_POST['phone']);
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$date=date("d-m-y @ g:i A");
		$query="insert into user(fullname,address,gender,phone,email,password,date_created) values('$name','$address','$gender','$phone','$email','$password','$date')";
		$query2="insert into login(name,email,password,role) values('$name','$email','$password',3)";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-c.php?msg=User account was created successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-c.php?msg=Error adding data try again!&type=error");
		}
	}


		public function insertNewUser2($post)
	{
		$name=$this->cleanse($_POST['name']);
		$address=$this->cleanse($_POST['address']);
		$gender=$this->cleanse($_POST['gender']);
		$phone=$this->cleanse($_POST['phone']);
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$date=date("d-m-y @ g:i A");
		$query="insert into user(fullname,address,gender,phone,email,password,date_created) values('$name','$address','$gender','$phone','$email','$password','$date')";
		$query2="insert into login(name,email,password,role) values('$name','$email','$password',3)";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:reg.php?msg=User account was created successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:reg.php?msg=Error adding data try again!&type=error");
		}
	}





	public function insertNewSupervisor($post)
	{
		$name=$this->cleanse($_POST['name']);
		$address=$this->cleanse($_POST['address']);
		$gender=$this->cleanse($_POST['gender']);
		$phone=$this->cleanse($_POST['phone']);
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$loc=$this->cleanse($_POST['loc']);
		$locd=$this->cleanse($_POST['locd']);
		$start_point=$this->cleanse($_POST['start_point']);
		$end_point=$this->cleanse($_POST['end_point']);
		$date=date("d-m-y @ g:i A");
		$query="insert into supervisor(fullname,address,gender,phone,email,password,location,start_point,end_point,location_desc,date_created) values('$name','$address','$gender','$phone','$email','$password','$loc','$start_point','$end_point','$locd','$date')";
		$query2="insert into login(name,email,password,role) values('$name','$email','$password',2)";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-s.php?msg=Supervisor account was created successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-s.php?msg=Error adding data try again!&type=error");
		}
	}




	public function insertLocation($post)
	{
		$name=$this->cleanse($_POST['name']);
		$date=date("d-m-y @ g:i A");
		$query="insert into location(name,date_created) values('$name','$date')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-l.php?msg=Location was created successfully&type=success");
		}else{
			header("Location:view-l.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertRoute($post)
	{
		$df=$this->cleanse($_POST['dst_from']);
		$dt=$this->cleanse($_POST['dst_to']);
		$tp=$this->cleanse($_POST['tp']);
		$pr=$this->cleanse($_POST['pr']);
		$date=date("d-m-y @ g:i A");
		$query="insert into route(destination_from,destination_to,type,price,date_created) values('$df','$dt','$tp','$pr','$date')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-r.php?msg=Route was created successfully&type=success");
		}else{
			header("Location:view-r.php?msg=Error adding data try again!&type=error");
		}
	}

//Inserting with Files

	public function insertDataWithFiles($post)
	{
		$value1 = $this->cleanse($_POST['value1']);
		$value2 = $this->cleanse($_POST['value2']);

		$img1=$_FILES['img1']['name'];
		$temp=$_FILES['img1']['tmp_name'];
		$folder="images/" ;  
		$pos1=strpos($img1,'.');
		$len1=strlen($img1);
		$ext1=substr($img1, $pos1, $len1); 
		$imgv1=str_replace($img1,'.',uniqid().$ext1 ); 
		$imgf1='mymodel-'.$imgv1;

		move_uploaded_file($temp,$folder.$imgf1)  ;

		$query="INSERT INTO table(col1,col2) VALUES('$value1','$value2')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:url?msg=Data was successfully inserted&type=success");
		}else{
			header("Location:url?msg=Error adding data try again!&type=error");
		}
	}


	public function insertParcel($post,$id,$ref)
	{
		$user=$this->displayUser($this->cleanse($id));
		$uid=$user['id'];
		$type=$this->cleanse($_POST['type']);
		$qty=$this->cleanse($_POST['qty']);
		$destination_from=$this->cleanse($_POST['dst_from']);
		$destination_to=$this->cleanse($_POST['dst_to']);
		$reciever=$this->cleanse($_POST['reciever']);
		$payment_ref=$this->cleanse($ref);
		$charge=$this->displayCharge($destination_from,$destination_to,$type,$qty);
		$payment_status='0';
		$delivery_status='0';
		

		$query="INSERT into parcel(user_id,type,qty,charge,destination_from,destination_to,current_location,reciever,payment_ref,payment_status,delivery_status) values('$uid','$type','$qty','$charge','$destination_from','$destination_to','$destination_from','$reciever','$payment_ref','$payment_status','$delivery_status')";
		$sql = $this->con->query($query);
		
		if ($sql==true) {
			header("Location:view-p.php?msg=Parcel was created successfully&type=success");
		}else{
			header("Location:view-p.php?msg=Error adding data try again!&type=error");
		}
	}


	public function displayCharge($destination_from,$destination_to,$type,$qty)
	{
		$destination_from= $this->cleanse($destination_from);
		$destination_to = $this->cleanse($destination_to);
		$type = $this->cleanse($type);
		$qty = $this->cleanse($qty);
		$query = "SELECT * FROM route where destination_from='$destination_from' AND destination_to='$destination_to' AND type='$type' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$val= $qty * $row['price'];
			return $val;
		}else{
			return "No found records";
		}
	}


	public function displayCharge2($type,$destination_from,$destination_to)
	{
		$destination_from= $this->cleanse($destination_from);
		$destination_to = $this->cleanse($destination_to);
		$type = $this->cleanse($type);
		$query = "SELECT * FROM route where destination_from='$destination_from' AND destination_to='$destination_to' AND type='$type' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['price'];
		}else{
			return "No found records";
		}
	}



//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM $table WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}


	public function deleteAll($id, $table,$url) 
	{ 
		$email= $this->cleanse($id);
		$query = "DELETE FROM $table WHERE email = '$email' ";
		$query2 = "DELETE FROM login WHERE email = '$email' ";

		$result = $this->con->query($query);

		if ($result == true) {
			$this->con->query($query2);
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}





	//Delete Items
	public function deleteTwo($id,$id1,$t,$id2,$t2,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM $t WHERE $id1 = $id";
		$query2 = "DELETE FROM $t2 WHERE $id2 = $id";

		$result = $this->con->query($query);
		$result2 = $this->con->query($query2);

		if ($result == true && $result2 == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}



	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


	public function updateUser($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$query2="UPDATE user SET password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			$this->con->query($query2);
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


	public function updateSupervisor($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$query2="UPDATE supervisor SET password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			$this->con->query($query2);
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}

	public function updateParcelLocation($location,$id)
	{
		
		$query="UPDATE parcel SET current_location='$location' WHERE id='$id' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:view-p.php?msg=Parcel Location was updated successfully&type=success");
		}else{
			header("Location:view-p.php?msg=Error updating account try again!&type=error");
		}
	}


	public function updateParcelPay($table,$value,$url)
	{
		$check=$this->displayOne('parcel',$value);
		$pay=$check['payment_status'];
		if ($pay === '0') {
			$query="UPDATE parcel SET payment_status='1' WHERE id='$value' ";
		} else {
			$query="UPDATE parcel SET payment_status='0' WHERE id='$value' ";
		}

		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:$url?msg=Payment was updated successfully&type=success");
		}else{
			header("Location:$url?msg=Error updating account try again!&type=error");
		}
	}
	

	public function updateParcelDelivery($table,$value,$url)
	{
		$check=$this->displayOne('parcel',$value);
		
		$delivery=$check['delivery_status'];
		if ($delivery === '0') {
			$query="UPDATE parcel SET delivery_status='1' WHERE id='$value' ";
		} else {
			$query="UPDATE parcel SET delivery_status='0' WHERE id='$value' ";
		}

		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:$url?msg=Delivery was updated successfully&type=success");
		}else{
			header("Location:$url?msg=Error updating account try again!&type=error");
		}
	}

	//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}


//Mailing Function
	public function mailing($post)
	{
		$name=$this->cleanse($_POST['name']);
		$email=$this->cleanse($_POST['email']);
		$phone=$this->cleanse($_POST['phone']);
		$subject=$this->cleanse($_POST['subject']);
		$text=$this->cleanse($_POST['message']);

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "From: " . $email . "\r\n"; // Sender's E-mail  ---charset=iso-8859-1
		$headers .= 'Content-type: text/html; charset=utf8_encode' . "\r\n";

		$message ='<table style="width:100%">
		<tr>
		<td>'.$name.'  '.$subject.'</td>
		</tr>
		<tr><td>Email: '.$email.'</td></tr>
		<tr><td>phone: '.$subject.'</td></tr>
		<tr><td>Text: '.$text.'</td></tr>

		</table>';
		$to='support@dilproperty.com';

		if (@mail($to, $subject, $message, $headers))
		{
			header("Location:contact.php?msg=Your message has been sent, we will contact you in a moment&type=success");
		}else{
			header("Location:contact.php?msg=message failed sending, please try again later!&type=error");
		}

	}



	public function cleanse($str)
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

