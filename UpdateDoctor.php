<?php

$user_id=$_REQUEST["id"];
$type=$_REQUEST["type"];
$a_date=$_REQUEST["date"];

if($type==1)
{

if($a_date=="" ||$a_date==null)
{
$a_date=date("Y-m-d");
}

$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              $q1="SELECT * FROM appointmentDB where patient_id='$user_id' AND appointmen_date <='$a_date'";	
                $r1=$db->query($q1);  
                $allRowst=array();
                $allRows=array();
                while($row1 = mysqli_fetch_array($r1))
                {
$doctor_id=$row1["doctor_id"];
           $q2="SELECT * FROM UserInfo WHERE user_id='$doctor_id'";  
           $r2=$db->query($q2);  
           $row2 = mysqli_fetch_array($r2);
           $allRows=array();
           $allRows[] = $row2["FirstName"];
           $allRows[] = $row2["LastName"];
           $allRows[] = $row2["Specialty"];
           $allRows[] = $row1["appointment_id"];
           $allRows[] = $row1["appointmen_date"];

switch ($row1["time"]) {
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

           $allRows[] = $time;
           $allRowst[]= $allRows;    
          
}
           $myJSON = json_encode($allRowst);
           echo $myJSON;
           $db->close();



}
else
{$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              $q1="SELECT * FROM UserInfo WHERE Specialty <> 'PATIENT'";  	
                $r1=$db->query($q1);  
                $allRowst=array();
                $allRows=array();
                while($row1 = mysqli_fetch_array($r1))
                {
           $allRows=array();
           $allRows[] = $row1["FirstName"];
           $allRows[] = $row1["LastName"];
           $allRows[] = $row1["Specialty"];
           $allRows[] = $row1["user_id"];
           $allRowst[]= $allRows;    
          
                 }
           $myJSON = json_encode($allRowst);
           echo $myJSON;
           $db->close();
           
}
?>