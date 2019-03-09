<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="HIVM_Javascript_main.js"> </script>
       <link rel="stylesheet" href="HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM Sign In</title>
</head>
<body>
<!-- check if sign in or not --!>
 <?php
   session_start(); 
   if(isset($_SESSION["email"]))
  {// redirect the user back to the login page
   header("Location: home.php");
   exit();
   }
 ?>

<!-- respond to submit form --!>


<!-- # = top start -->
<div id ="topper">

<a href="./home.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./home.php"><h1 id="firstbutton_header"       >Home    </h1></a> 
<a href="./home.php"><h1 id="regiserbutton_header" style="vertical-align:middle"><span>Register </span></h1></a>
</div> 
<!-- end top -->
<p id="Page_Sign">Sign In</p>
<form id="SignIn" method="post" action="SignIn.php" enctype="multipart/form-data">    
<input type="hidden" name="submittedS" value="1"/>
<table id="table_center">
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
</table>
<input type="submit" value="Sign In" class="sign1" />
<input type="reset" value="Reset" class="sign2"/>
</form>
<?php
$email="";
$password="";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^\S*$/";
$validateS = true;
if (isset($_POST["submittedS"]) && $_POST["submittedS"])
{ 

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
   $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error );
    }
    
    $q1 = "SELECT * FROM Patient WHERE email = '$email'";
    $q2 = "SELECT * FROM Patient WHERE email = '$email' && password='$password'";
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validateS = false;
            echo "<h class='err_msg'>email empty or incorrect formula</h><br/>";
        }
                $pswdLenS = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLenS < 8 || $pswdMatch ==false )
        {
            $validateS = false;
             echo "<h class='err_msg'>password empty or incorrect formula</h><br/>";

        }

          if($validateS==true)
         {$r1 = $db->query($q1);   
            if($r1->num_rows == 0)
             {echo "<h class='err_msg'>email not exsit</h><br/>";}
            else
             { $r1= $db->query($q2);
                 if($r1->num_rows == 0)
                 {echo "<h class='err_msg'>password not match your email</h><br/>";}
                else
                 {echo "successfully login";
                 session_start();
                 $_SESSION["email"] = $email;
                 header("Location: home.php");
                 $db->close();
                 exit();
                  
                 }
             } 
        }
 
}

$db->close();
?>

</body>
