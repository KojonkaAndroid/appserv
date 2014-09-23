<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
session_start();
if(!session_is_registered(username)){
	header("location:login.html");
}

$database_hostname = "localhost";
$database_username = "root";
$database_password = "yanzhonglu";
$database_database = "school";
$tbl_name="class16";

$conn = mysql_connect($database_hostname,$database_username, $database_password);

$seldb= mysql_select_db($database_database, $conn);
if($seldb){
     $sql="SELECT * FROM $tbl_name WHERE username='$username'";
     $result=mysql_query($sql);
     $row=mysql_fetch_row($result);
     //echo '{"results":[';
       echo json_encode(array('username'=>$row[0], 'score' => $row[2]));
     //echo "]}";
     
}else{
	echo "connection failed";
	
}
   mysql_close($conn);
   //session_destroy();
?>

