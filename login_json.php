<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
ob_start();
session_start();
$username=$_POST['username'];
$password=sha1($_POST['password']);
    
$database_hostname = "localhost";
$database_username = "root";
$database_password = "yanzhonglu";
$database_database = "school";
$tbl_name="class16";

$conn = mysql_connect($database_hostname,$database_username, $database_password);

$seldb= mysql_select_db($database_database, $conn);
if($seldb){

	//echo "connection success!<BR>";
	$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		 
		//echo "login succuss<br>";
		session_register("username");
		session_register("password");
		header("location:login_success_json.php");
		exit;
	}
	else {
		echo "login fail<br>";
	
	}
	mysql_close($conn);
}else{
	echo  "connection failed<BR>";
}

?>