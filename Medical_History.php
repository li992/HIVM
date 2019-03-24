<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="js/HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM</title>
</head>
<body>
<!-- # = top start -->
<div id ="topper">

<a href="./index.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./index.php"><h1 id="firstbutton_header"       >Home     </h1></a>
<a href="./About.php"><h1 id="secondbutton_header"    >About   </h1></a>
   <?php
               session_start(); 
               if(isset($_SESSION["email"]))
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}   
               $email=$_SESSION["email"];
               $q1="SELECT * FROM UserInfo WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               $FisrtName=$row['FirstName'];
               $LastName=$row["LastName"];
               echo"<a href='./Medical_History.php'><h1 id='Medical_Historybutton_header'> Medical History </h1> </a>";
               echo"<a href='./userdetail.php' class ='blacklink'><h2 id='name'> $FisrtName  $LastName</h2></a>";
               echo"<a href='./SignOut.php'><h1 id='Signoutbutton_header'>SignOut </h1> </a>";
                  $db->close();
               }
else
{
echo"<a href='./SignIn.php'><h1 id='signinbutton_header'>Sign In </h1> </a>";
echo"<a href='./Register.php'><h1 id='regiserbutton_header' style='vertical-align:middle'><span>Register </span></h1></a>";
}
    ?> 


<?php
               session_start(); 
               if(isset($_SESSION["email"]))
                {
$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}   
               $email=$_SESSION["email"];
               $q1="SELECT * FROM UserInfo WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               $user_id=$row["user_id"];
if($row["Specialty"]=="PATIENT")
{               $a_date=date("Y-m-d");
               $q2="SELECT DISTINCT doctor_id  FROM appointmentDB where patient_id='$user_id'  AND appointmen_date <='$a_date' "; 
               $r2=$db->query($q2);

//select area start
echo"<div id='select_area' value='0'>";

// left select area start (including specailty and doctor)
echo"<section id='indent-1'>";

//specailty area start
echo"<section id='Select_Specailty'>";
echo"<span class='check_span' style='text-align:center;'>Select Specailty</span>";
echo"<div class='Appointment_table'> <table>";


while($row2 = mysqli_fetch_array($r2))
{

$doctor_id=$row2["doctor_id"];
  $q3="SELECT * FROM UserInfo WHERE user_id='$doctor_id'"; 
  $r3=$db->query($q3);
 $row3 = $r3->fetch_assoc();
$Specialty=$row3["Specialty"];

echo"<tr><td><h3 style='text-align: center;'>$Specialty</h3></td><td><input type='checkbox' value='$Specialty' class='Specialty2'></td></tr>";
}
echo"</table></div>";
echo"</section>";
//specailty area end
    $db->close();



//doctor Appointment start
echo"<section id='Select_Doctor'>";
echo"<input type='hidden' id='user_id' value='$user_id'>";
echo"<span class='check_span'  style='text-align:center;'>History Column</span>";
echo"<input type='date'  id='appointmentdate'  oninput='AppoinmentUpdate(event)' ";
echo" max='";
$a_date = date("Y-m-d"); 
echo $a_date;
echo"'/>";

echo"<div class='Appointment_table' >";
echo"</div>";
echo"</section>";
//doctor area end
echo"</section>";

echo"<section id='calender'>";
echo"<section id='Detail Column'>";
echo"</section>";
echo"</section>";
}

}
else
{












}

?>


<!--end of avaibility area-->
<script type="text/javascript" src="js/HIVM_Javascript_CheckAvaibity.js"> </script> 
</body>