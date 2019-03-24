<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="js/HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM Register</title>
</head>
<body>
<!-- check if sign in or not --!>
 <?php
   session_start(); 
   if(isset($_SESSION["email"]))
  {// redirect the user back to the login page
   header("Location: index.php");
   exit();
   }
 ?>




<!-- # = top start -->
<div id ="topper">

<a href="./index.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./About.php"><h1 id="firstbutton_header"       >Home    </h1></a> 
<a href="./SignIn.php"><h1 id="signinbutton_header">Sign In </h1> </a>
</div> 
<!-- end top -->
<p id="Page_Sign">Register</p>
<form id="Register" method="post" action="Register.php" enctype="multipart/form-data">    
<input type="hidden" name="submittedS" value="1"/>
<table id="table_center">
<tr>
<td>First Name:</td>
<td><input type="text" name="FirstName" id="FirstName" size="30" /></td>
<td><label id="FirstName_msg" class="err_msg"></label></td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" name="LastName" id="LastName" size="30" /></td>
<td><label id="LastName_msg" class="err_msg"></label></td>
</tr>
<tr>
<td>Date of Birth:</td>
<td><input type="date" name="DOB" id="DOB" size="30"
<?php
echo " max='"; 
$a_date = date("Y-m-d");
echo $a_date;
echo "'";
?>
 value="mm/dd/yyyy"/></td>
<td><label id="DOB_msg" class="err_msg"></label></td>
</tr>
<tr>
<td>Heath Card Number:</td>
<td><input type="text" name="HeathCardNumber" id="HeathCardNumber" size="30"/></td>
<td><label id="HeathCardNumber_msg" class="err_msg"></label></td>
</tr>
<td>Phone Number:</td>
<td><input type="text" name="PhoneNumber" id="PhoneNumber" size="30"/></td>
<td><label id="PhoneNumber_msg" class="err_msg"></label></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" size="30" /></td>
<td><label id="email_msg" class="err_msg"></label></td>
</tr>

<tr>
<td>Password:</td>
<td> <input type="password" name="password" id="password" size="30" /></td>
<td><label id="pswd_msg" class="err_msg"></label></td>
<td></td>
</tr>
<tr>
<td>Renter Password:</td>
<td> <input type="password" name="passwordr" id="passwordr" size="30" /></td>
<td><label id="pswdr_msg" class="err_msg"></label></td>
<td></td>
</tr>
</table>
<input type="submit" value="Register" class="sign1" />
<input type="reset" value="Reset" class="sign2"/>
</form>


<!-- respond to submit form -->
<?php
$validateS = true;
$error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^\S*$/";
$reg_Bday = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/";
$reg_Uname = "/^[a-zA-Z0-9_-]+$/";
$email_msg = "";
$birth_msg = "";
$pswd_msg="";
$pswds_msg="";
$Lastname_msg="";
$Firstname_msg="";

if (isset($_POST["submittedS"]) && $_POST["submittedS"])
{      
    $Firstname_msg=trim($_POST["FirstName"]);
    $Lastname_msg=trim($_POST["LastName"]);
    $HeadthCardNumber_msg=trim($_POST["HeathCardNumber"]);
    $PhoneNumber_msg=trim($_POST["PhoneNumber"]);      
    $email_msg = trim($_POST["email"]);
    $email_msg =strtoupper($email_msg);
    $birth_msg = trim($_POST["DOB"]);
    $pswd_msg = trim($_POST["password"]);
    $pswdr_msg = trim($_POST["passwordr"]);

    $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");

    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error );
    }
    
    $q1 = "SELECT * FROM UserInfo WHERE email = '$email_msg'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validateS = false;
         echo "<h class='err_msg'>email address is not available. Signup failed.</h> <br/>";
    }
    else
    {
        $emailMatch = preg_match($reg_Email, $email_msg);
        if($email_msg == null || $email_msg == "" || $emailMatch == false)
        {
            $validateS = false;
            echo "<h class='err_msg'>email empty or incorrect formula</h><br/>";
                    }
        $LastnameMatch=preg_match($reg_Uname,$Lastname_msg);
       if($Lastname_msg == null || $Lastname_msg == "" || $LastnameMatch == false)
        {
            $validateS = false;
            echo "<h class='err_msg'>Lastname empty or incorrect formula</h><br/>";
                    }
               $FirstnameMatch=preg_match($reg_Uname,$Firstname_msg);
       if($Firstname_msg == null || $Firstname_msg == "" || $FirstnameMatch == false)
        {
            $validateS = false;
            echo "<h class='err_msg'>Firstname empty or incorrect formula</h><br/>";
                    }        
              


        $bdayMatch = preg_match($reg_Bday, $birth_msg);
        if($birth_msg == null || $birth_msg == "" || $bdayMatch == false)
        {
            $validateS = false;
            echo "<h class='err_msg'>date of birth empty or incorrect formula</h><br/>";

        }


        
        
        
    }

    if($validateS == true)
    {
        $dateFormatS = date("Y-m-d", strtotime($birth_msg));
        //add code here to insert a record into the table User;
        // table User attributes are: email, password, DOB
        // variables in the form are: emailS, passwordS, dateFormatS, 
  

           $q2 = "INSERT INTO UserInfo (email, FirstName, LastName , pwd, DOB, Phone, HealthCardNumber, Specialty) VALUES ('$email_msg', '$Firstname_msg', '$Lastname_msg', '$pswd_msg', '$dateFormatS', '$PhoneNumber_msg', '$HeadthCardNumber_msg', 'PATIENT')";
       
  

        $r2 = $db->query($q2);
        
        if ($r2 === true)
        {      
            header("Location: SignIn.php");
            $db->close();
            exit();
        }
    }
  

       
        $db->close();


}
?>


</body>
</html>