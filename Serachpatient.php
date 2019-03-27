<?php
$inputtext=$_REQUEST["inputtext"];
$type=$_REQUEST["type"];
if($type==0 &&$inputtext!="" )    
 { 
$a="%";
$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
             $q1="SELECT DISTINCT user_id FROM UserInfo WHERE (FirstName like '$a$inputtext$a' OR LastName like '$a$inputtext$a') AND Specialty = 'PATIENT' ";
             $r1=$db->query($q1);   
echo"<table border='3' >";
echo "<tr><td>First name</td><td >Last name</td><td>Health Card Number</td></tr>";
while($row1 = mysqli_fetch_array($r1))
{



$user_id=$row1["user_id"];

             $q2="SELECT * FROM UserInfo WHERE user_id='$user_id'";
             $r2=$db->query($q2);   
$row2= $r2->fetch_assoc();
$Patient_FN=$row2["FirstName"];
$Patient_LN=$row2["LastName"];
$HealthCardNumber=$row2["HealthCardNumber"];
echo "<tr><td>$Patient_FN</td><td >$Patient_LN</td><td>$HealthCardNumber</td><td><input type='button' value='click' onclick='detailinformation(event)'/><input type='hidden' value='$user_id' /></td></tr>";

}

echo"</table>";
}

else if($type==1 &&$inputtext!="" )    
 { 
$a="%";
$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
             $q1="SELECT DISTINCT user_id FROM UserInfo WHERE (HealthCardNumber like '$inputtext$a') AND Specialty = 'PATIENT' ";
             $r1=$db->query($q1);   
echo"<table border='3' >";
echo "<tr><td>First name</td><td >Last name</td><td>Health Card Number</td></tr>";
while($row1 = mysqli_fetch_array($r1))
{



$user_id=$row1["user_id"];

             $q2="SELECT * FROM UserInfo WHERE user_id='$user_id'";
             $r2=$db->query($q2);   
$row2= $r2->fetch_assoc();
$Patient_FN=$row2["FirstName"];
$Patient_LN=$row2["LastName"];
$HealthCardNumber=$row2["HealthCardNumber"];
echo "<tr><td>$Patient_FN</td><td >$Patient_LN</td><td>$HealthCardNumber</td><td><input type='button' value='click' onclick='detailinformation(event)'/><input type='hidden' value='$user_id' /></td></tr>";

}

echo"</table>";
}



else if($type==2 &&$inputtext!="" )    
 { 
$a="%";
$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
             $q1="SELECT * FROM UserInfo WHERE user_id='$inputtext' ";
             $r1=$db->query($q1);  
echo"<input type='hidden' id='patient_id' value='$inputtext'>";
echo "<h3>Patient detail inforamtion</h3>"; 
echo"<table border='3' >";
while($row1 = mysqli_fetch_array($r1))
{



$user_id=$row1["user_id"];

             $q2="SELECT * FROM UserInfo WHERE user_id='$user_id'";
             $r2=$db->query($q2);   
$row2= $r2->fetch_assoc();
$Patient_FN=$row2["FirstName"];
$Patient_LN=$row2["LastName"];
$HealthCardNumber=$row2["HealthCardNumber"];
$DOB=$row2["DOB"];
echo "<tr><td style='width:150px;'>Fisrt name</td><td style='width:150px;'>$Patient_FN</td></tr>";
echo "<tr><td>Last name</td><td >$Patient_LN</td></tr>";
echo "<tr><td>Health card Number</td><td >$HealthCardNumber</td></tr>";
echo "<tr><td>Date of birth</td><td >$DOB</td></tr>";
}
echo"</table>";
}

else if($type==3 &&$inputtext!="" )    
 { 

$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
$TODAY=date("Y-m-d");
echo "<h3>Patient Medical History</h3>";            
  
               $q2="SELECT * FROM  appointmentDB WHERE patient_id ='$inputtext' AND appointmen_date < '$TODAY' ORDER BY appointmen_date,time";  	
               $r2=$db->query($q2);
             echo"<table border='3' >";
   echo"<tr><td>Doctor name</td><td>Specialty</td><td>date</td><td>time</td></tr>";            
               while($row2 = $r2->fetch_assoc())
               {
               $date=$row2["appointmen_date"];
               $doctor_id=$row2["doctor_id"];
               $appointment_id=$row2["appointment_id"];
//translate time index to time period
               
 switch ($row2["time"]) {
        case 1: $time= "9:00~9:30";
                break;
         case 2: $time= "9:30~10:00";
                break;
        case 3: $time= "10:00~10:30";
                break;
        case 4: $time= "10:30~11:00";
                break;
        case 5: $time= "11:00~11:30";
                break;
        case 6: $time= "13:00~13:30";
                break;
        case 7: $time= "13:30~14:00";
                break;
        case 8: $time= "14:00~14:30";
                break;
        case 9: $time= "14:30~15:00";
                break;
        case 10: $time= "15:00~15:30";
                break;
        case 11: $time= "15:30~16:00";
                break;
        case 12: $time= "16:00~16:30";
                break;
        case 13: $time= "16:30~15:00";
                break;
        case 14: $time= "17:00~17:30";
                break;
        }          


//get dotcto infromation 
$q3="SELECT * FROM UserInfo WHERE user_id='$doctor_id'";  	
$r3=$db->query($q3);
$row3= $r3->fetch_assoc();
$Doctor_FN=$row3["FirstName"];
$Doctor_LN=$row3["LastName"];
$Specialty=$row3["Specialty"];

               echo"<tr><td>$Doctor_FN $Doctor_LN </td><td>$Specialty</td><td>$date</td><td>$time</td><td><input type='button' value='Detail' onclick='appointment_list(event)'/><input type='hidden' value='$appointment_id' /></td></tr>";

               }

               echo"</table>";
}

else if($type==4 &&$inputtext!="" )   
{




$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}

       

//appoinment table
            
               echo"<table><tr><td><h2>Medicla Histroy:<h2></td></tr>";
               
               $q2="SELECT * FROM  appointmentDB WHERE appointment_id='$inputtext' ORDER BY appointmen_date,time";  	
               $r2=$db->query($q2);              
               while($row2 = $r2->fetch_assoc())
               {
               $date=$row2["appointmen_date"];
               $doctor_id=$row2["doctor_id"];
//translate time index to time period

 switch ($row2["time"]) {
        case 1: $time= "9:00~9:30";
                break;
         case 2: $time= "9:30~10:00";
                break;
        case 3: $time= "10:00~10:30";
                break;
        case 4: $time= "10:30~11:00";
                break;
        case 5: $time= "11:00~11:30";
                break;
        case 6: $time= "13:00~13:30";
                break;
        case 7: $time= "13:30~14:00";
                break;
        case 8: $time= "14:00~14:30";
                break;
        case 9: $time= "14:30~15:00";
                break;
        case 10: $time= "15:00~15:30";
                break;
        case 11: $time= "15:30~16:00";
                break;
        case 12: $time= "16:00~16:30";
                break;
        case 13: $time= "16:30~15:00";
                break;
        case 14: $time= "17:00~17:30";
                break;
        }          


//get dotcto infromation 

$q3="SELECT * FROM UserInfo WHERE user_id='$doctor_id' ";  	
$r3=$db->query($q3);
$row3= $r3->fetch_assoc();
$doctor_FN=$row3["FirstName"];
$doctor_LN=$row3["LastName"];
$commmond=$row2["comment"];
echo"<tr><td> $date $time with doctor: $doctor_FN $doctor_LN </td></tr>";
	    echo"</table>";	

              }
echo"<h3  >Comment</h3>";
echo"<textarea disabled    rows='5' cols='50'>$commmond</textarea>";

echo"<input type='button' value='back' onclick='backto_list()' style='display:display:block;'/>";


}

?>