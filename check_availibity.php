<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="js/HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM Check Avaiblity</title>
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

</div> 
<!-- end top -->
<p id="Page_Sign">Check Avaiblity</p>

<!--filter area-->
<table id="check_table">

<td class="checktd">
<div class="dropdown">
<span class="check_span">Select Specailty</span>
<div class="dropdown-content">
<?php


   $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error );
    }
    
    $q1 = "SELECT distinct Specialty FROM Doctor";
    $r1 = $db->query($q1);

while($row1 = mysqli_fetch_array($r1))
{
$Specialty=$row1['Specialty'];
echo"<label class='container' >$Specialty";
echo"<input type='checkbox' value='$Specialty' class='Specialty'>";
echo"<span class='checkmark'></span>";
echo"</label>";
}
    $db->close();
?>
</div>
</div>
</td>


<td class="checktd">
<div class="dropdown">
<span class="check_span">Select Doctor</span>
<div class="dropdown-content">
</div>
</div>
</td>

<td class="checktd">
<div class="dropdown">
<span class="check_span">Select Date</span>

<?php
echo"<input type='date' name='appointmentdate'";
echo" min='20";
$a_date = date("y-m-d",strtotime(' +2 day')); 
echo $a_date;
echo"'/>";
?>
</div>
</td>


<td class="checktd">
<button type="button" id="check_submit" onclick="update_appointment()">Sumbit Request</button>
</td>

</table>

<!--end of filter area-->


<!--avaibility area-->

<label id="avaibility_label" value="0">

</label>
<!--end of avaibility area-->
<script type="text/javascript" src="js/HIVM_Javascript_CheckAvaibity.js"> </script> 
</body>