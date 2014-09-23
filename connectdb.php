<?php

    $database_hostname = "localhost";
    $database_username = "root";
    $database_password = "yanzhonglu";
    $database_database = "school";
    
    $conn = mysql_connect($database_hostname,$database_username, $database_password);
    
    $seldb= mysql_select_db($database_database, $conn);
    
    if($seldb){

    	echo "connection success!<BR>";
    	
    	$data = mysql_query("SELECT * FROM class16") 
        or die(mysql_error()); 

    	Print "<table border cellpadding=3>";
    	while($info = mysql_fetch_array( $data ))
    	{
    		Print "<tr>";
    		Print "<th>username:</th> <td>".$info['username'] . "</td> ";
    		Print "<th>password:</th> <td>".$info['password'] . " </td></tr>";
    	}
    	Print "</table>";

        mysql_close($conn);
    }
    else{
    	echo  "connection failed<BR>";
    }
    
?>