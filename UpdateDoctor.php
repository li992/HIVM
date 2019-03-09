<?php

$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              $q1="SELECT * FROM Doctor";  	
                $r1=$db->query($q1);  
                $allRowst=array();
                $allRows=array();
                while($row1 = mysqli_fetch_array($r1))
                {
           $allRows=array();
           $allRows[] = $row1["FirstName"];
           $allRows[] = $row1["LastName"];
           $allRows[] = $row1["Specialty"];
           $allRows[] = $row1["doctor_id"];
           $allRowst[]= $allRows;    
          
                 }
           $myJSON = json_encode($allRowst);
           echo $myJSON;
           $db->close();
           
            
?>