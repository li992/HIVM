<?php
$serverName="hivm.database.windows.net";
    $connectionOptions = array(
   		 "Database"=> "HIVM",
   		 "UID"=>"GroupUser",
   		 "PWD"=>"hivm-admin01"
    );
    
    $conn = sqlsrv_connect($serverName,$connectionOptions);
    if($conn){
   	 echo"connection established.<br/>";
    }
    else{
   	 echo"Connection could not be established.<br/>";
   	 die(print_r(sqlsrv_errors(),true));
    }
?>