<!DOCTYPE html>
<?php include '/ConnectionFile/Connection.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="./js/HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="./css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM</title>
</head>
<body>
<!-- # = top start -->
<div id ="topper">

<a href="./index.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./index.php"><h1 id="firstbutton_header"       >Home     </h1></a>
<a href="./index.php"><h1 id="secondbutton_header"    >About   </h1></a>
   <?php
               session_start(); 
               if(isset($_SESSION["email"]))
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}   
               $email=$_SESSION["email"];
               $q1="SELECT * FROM Patient WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               $FisrtName=$row['FirstName'];
               $LastName=$row["LastName"];
               echo"<a href='./index.php'><h1 id='Prescriptionbutton_header'> Prescription </h1> </a>";
               echo"<a href='./index.php' class ='blacklink'><h2 id='name'> $FisrtName  $LastName</h2></a>";
               echo"<a href='./SignOut.php'><h1 id='Signoutbutton_header'>SignOut </h1> </a>";
               }
else
{
echo"<a href='./SignIn.php'><h1 id='signinbutton_header'>Sign In </h1> </a>";
echo"<a href='./Register.php'><h1 id='regiserbutton_header' style='vertical-align:middle'><span>Register </span></h1></a>";
}
    ?> 
<table>
<tr>
<td class="appointment_td">
</td>
<td  class="appointment_td">
<a href="./index.php" class ='blacklink'><h2 id="make_appointment_button">make appointment     </h2></a> 
</td>
<td class="appointment_td">
</td>
<td  class="appointment_td">
<a href="./check_availibity.php" class ='blacklink'><h2 id="check_availibity_button">check availibity    </h2> </a>
</td>
<td>
</td>
</tr>
</table>

</div> 
<!-- end top -->


</body>
