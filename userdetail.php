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
                if($row["Specialty"]!="PATIENT")
               {echo"<a href='./Medical_History.php'><h1 id='Medical_Historybutton_header'> Patient Search </h1> </a>";}
               else
               {echo"<a href='./Medical_History.php'><h1 id='Medical_Historybutton_header'> Medical History </h1> </a>";}
               echo"<a href='./userdetail.php' class ='blacklink'><h2 id='name'> $FisrtName  $LastName</h2></a>";
               echo"<a href='./SignOut.php'><h1 id='Signoutbutton_header'>SignOut </h1> </a>";
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
               {$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}   
               $email=$_SESSION["email"];
               $q1="SELECT * FROM UserInfo WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               echo"<p id='Page_Sign'>User Detail</p>";
               echo"<table id='table_center'>";
               echo"<tr><td>First Name:</td>";
               echo"<td>";
               echo$row["FirstName"];                    
               echo"</td></tr>";
               echo"<tr><td>Last Name:</td>";
               echo"<td>";
               echo$row["LastName"];                    
               echo"</td></tr>";
               echo"<tr><td>Date of Birth:</td>";
               echo"<td>";
               echo$row["DOB"];                    
               echo"</td></tr>";
               echo"<tr><td>Phone:</td>";
               echo"<td>";
               echo$row["Phone"];                    
               echo"</td></tr>";
               echo"<tr><td>email:</td>";
               echo"<td>";
               echo$row["email"];                    
               echo"</td></tr>";
               echo"<tr><td>Health Card Number:</td>";
               echo"<td>";
               echo$row["HealthCardNumber"];                    
               echo"</td></tr>";
               echo"</table>";

               
               }

  



?>



</div> 
