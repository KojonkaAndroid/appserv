<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
$username=$_POST['username'];
$password=sha1($_POST['password']); 
$score=$_POST['score'];

//echo "user name=".$username."<br>"
 $database_hostname = "localhost";
    $database_username = "root";
    $database_password = "yanzhonglu";
    $database_database = "school";
    $tbl_name="class16";
    
    $conn = mysql_connect($database_hostname,$database_username, $database_password);
    
    $seldb= mysql_select_db($database_database, $conn);
    if($seldb){
    
    	//echo "connection success!<BR>";
    	$sql="SELECT * FROM $tbl_name WHERE username='$username'";
    	$result=mysql_query($sql);
    	$count=mysql_num_rows($result);
    	if($count==1){
    	
    		//echo "account already exists<br>";
                echo "1";
    	}
    	else {
    		//echo "add user now<br>";
    		//echo "password=".sha1($password)."<br>";
    		$sql = "INSERT INTO class16 (username, password, score) VALUES ('$username', '$password', '$score')";
    		$result = mysql_query($sql);
    		if(! $result )
    		{
    			die('Could not enter data: ' . mysql_error());
    		}
    		//echo "Entered data successfully\n";
                echo "0";
    		mysql_close($conn);
         }
    }else{
    	//echo  "connection failed<BR>";
        echo "2";
    }
    


?>