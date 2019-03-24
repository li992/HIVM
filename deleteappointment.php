<?php

   session_start(); 
   if(isset($_SESSION["email"]))
  {// redirect the user back to the login page

   }
   else
{
   header("Location: index.php");
   exit();
}
 ?>

<?php


if (isset($_POST["submittedS"]) && $_POST["submittedS"])
{ 

    $appoinmentid= trim($_POST["appoinmentid"]);
                   session_start(); 
               if(isset($_SESSION["email"]))
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
                 
               $q1="delete FROM appointmentDB WHERE appointment_id='$appoinmentid'";  
               $r1=$db->query($q1);   
     

                }
header("Location: index.php");
}
else{
$id=$_REQUEST["id"];
$type=$_REQUEST["type"];

if($type==0)
{
$TimeIndex="";
 $A_Date="";
 $pateint_id="";
 $time="";
$patientname="";
if(isset($_SESSION["email"]))
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
                session_start();    
               $email=$_SESSION["email"];
               $q1="SELECT * FROM appointmentDB WHERE appointment_id='$id'";  
               $r1=$db->query($q1);   
               $row = $r1->fetch_assoc(); 
               $TimeIndex=$row["time"];
               $A_Date=$row["appointmen_date"];
               $pateint_id=$row["patient_id"];

   switch ($TimeIndex) {
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


               $q2="SELECT * FROM UserInfo WHERE user_id='$pateint_id'";  
               $r2=$db->query($q2);   
               $row1 = $r2->fetch_assoc(); 
               $FirstName=$row1["FirstName"];
               $LastName=$row1["LastName"];


echo"<form method='post'  action='./deleteappointment.php'>";
echo"<input type='hidden' name='appoinmentid' value='$id'>";
echo"<input type='hidden' name='submittedS' value='1'/>";
echo"<table id='table_center'>";
echo"<tr><td>Patient name:</td><td><input type='text' name='Patientname' disabled value='$FirstName $LastName'> </td></tr>";
echo"<tr><td>Date:</td><td><input type='text' name='Date1' disabled value='$A_Date'> </td></tr>";
echo"<tr><td>Time:</td><td><input type='text' name='Time' disabled value='$time'</td></tr></table>";
echo"<input type='submit' id='check_submit' style='margin-left:45%;' value='Comfire  delete'></></form>";  



      
}

}
}

 ?>