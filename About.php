<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM</title>
</head>
<body>
<!-- # = top start -->
<div id ="topper">

<a href="./index.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./index.php"><h1 id="firstbutton_header"       >Home     </h1></a>
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
               }
else
{
echo"<a href='./SignIn.php'><h1 id='signinbutton_header'>Sign In </h1> </a>";
echo"<a href='./Register.php'><h1 id='regiserbutton_header' style='vertical-align:middle'><span>Register </span></h1></a>";
}
    ?> 
</div> 
<!-- end top -->
<p id="Page_Sign">About</p>
<table id="table_center">
<tr>
<td>
<p>It is a web-based project</p>
</td>
</tr>
<tr>
<td>
<p>For the class cs372 in University of Regina</p>
</td>
</tr>
<tr>
<td>
<p>Developer:</p>
</td>
</tr>
</table>
<h3 class="h3_center">Jared Thompson, Qiaoyi Li, Junwang Feng, Brett Aulie, Marcello La Posta
</h3>
</body>
</html>