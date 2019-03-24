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
$TimeIndex="";
$DoctorId="";
$A_Date="";
$email="";
$user_id="";
if (isset($_POST["submittedS"]) && $_POST["submittedS"])
{ 

    $TimeIndex= trim($_POST["TimeIndex"]);
    $DoctorId = trim($_POST["DoctorId"]);
    $A_Date = trim($_POST["Date"]);
                   session_start(); 
               if(isset($_SESSION["email"]))
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}   
               $email=$_SESSION["email"];
               $q1="SELECT * FROM UserInfo WHERE email='$email'";  
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();      
               $user_id=$row["user_id"];
                 $q2 = "INSERT INTO appointmentDB (doctor_id,patient_id,appointmen_date,time,comment) VALUES ('$DoctorId','$user_id','$A_Date','$TimeIndex','testing')";
                 $r1=$db->query($q2);
                  
                }
}
header("Location: index.php");
 ?>