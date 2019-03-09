<?php
$A_DATE=$_REQUEST["date"];
$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
                $allRowst=array();
                $allRows=array();
                $a=0;
                $q2="SELECT * FROM Doctor";
                $r2=$db->query($q2);
                while($row2 = mysqli_fetch_array($r2))
                { 
       for($j=1;$j<=14;$j=$j+1) 
       {    $a=$a+1;
           $allRows=array();
   switch ($j) {
        case 1:$allRows[] ="9:00~9:30";
                break;
         case 2:$allRows[] ="9:30~10:00";
                break;
        case 3:$allRows[] ="10:00~10:30";
                break;
        case 4:$allRows[] ="10:30~11:00";
                break;
        case 5:$allRows[] ="11:00~11:30";
                break;
        case 6:$allRows[] ="13:00~13:30";
                break;
        case 7:$allRows[] ="13:30~14:00";
                break;
        case 8:$allRows[] ="14:00~14:30";
                break;
        case 9:$allRows[] ="14:30~15:00";
                break;
        case 10:$allRows[] ="15:00~15:30";
                break;
        case 11:$allRows[] ="15:30~16:00";
                break;
        case 12:$allRows[] ="16:00~16:30";
                break;
        case 13:$allRows[] ="16:30~15:00";
                break;
        case 14:$allRows[] ="17:00~17:30";
                break;
        }          

           $allRows[] =$a;
           $allRows[] = $row2["FirstName"];
           $allRows[] = $row2["LastName"];
           $allRows[] = $row2["Specialty"];  
           $allRows[] = $row2["doctor_id"];
           $allRows[] = $A_DATE;
               $doctor= $row2["doctor_id"]; 
           $q1="SELECT * FROM Appointment wHERE AD='$A_DATE' AND doctor_id='$doctor' AND ind='$j'";   	
                $r1=$db->query($q1);  
           if($r1->num_rows !=0 )
          { $allRows[] ="NO";}
          else
         { $allRows[] ="YES";}
           $allRowst[]= $allRows;  
       }
                        }

           $myJSON = json_encode($allRowst);
           echo $myJSON;
           $db->close();
           
            
?>