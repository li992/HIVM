<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <script type="text/javascript" src="js/HIVM_Javascript_main.js"> </script>
    <script type="text/javascript">
	function Validation_HealthCard() {
		var txt="";
		var valid=false;
		var HealthCard = prompt("Please enter your HealthCardNumber:", "ie. 123456789");
		var reg_hc= /^[0-9]*$/i;
		
		if(HealthCard.length==9 && reg_hc.test(HealthCard)==true){
			txt = HealthCard;
			valid=true;
		}

		 document.getElementById("healthcard").value = txt;
		 if(valid==true){
			 document.getElementById("js_valid").value='1';
		 }
		 else{
			 document.getElementById("err_msg").innerHTML="Healthcard Number is Required!";}
	}
    </script>
       <link rel="stylesheet" href="css/HIVM_Stylesheet_main.css">
    <link rel="icon" href="./img/core-img/BRAND.png">  
    <title>HIVM Sign In</title>
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

<!-- respond to submit form --!>


<!-- # = top start -->
<div id ="topper">

<a href="./index.php"><img src="./img/core-img/BRAND_header.jpg" alt="Brand_header"/></a>
<a href="./About.php"><h1 id="firstbutton_header"       >Home    </h1></a> 
<a href="./Register.php"><h1 id="regiserbutton_header" style="vertical-align:middle"><span>Register </span></h1></a>
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
<input type="hidden" value="" id="healthcard" name="healthcard"/>
<input type="hidden" value="0" id="js_valid" name="js_valid"/>
<input type="submit" value="Sign In" class="sign1" id="Submit" onclick="Validation_HealthCard()" />
<input type="reset" value="Reset" class="sign2"/>
<span id="err_msg"></span>
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
    $healthcard= trim($_POST["healthcard"]);
    $js_valid=trim($_POST["js_valid"]);
    if($js_valid==1){
       $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error );
        }
        
        $q1 = "SELECT * FROM UserInfo WHERE email = '$email'";
        $q2 = "SELECT * FROM UserInfo WHERE email = '$email' && pwd='$password'";
        $q3 = "SELECT * FROM UserInfo WHERE email = '$email' && pwd='$password' && HealthCardNumber='$healthcard'";
            
        $emailMatch = preg_match($reg_Email, $email);
            
        if($email == null || $email == "" || $emailMatch == false){               
            $validateS = false;               
            echo "<h class='err_msg'>email empty or incorrect formula</h><br/>";           
        }
        $pswdLenS = strlen($password);           
        $pswdMatch = preg_match($reg_Pswd, $password);          
        $hcLenS = strlen($healthcard);            
            
        if($password == null || $password == "" || $pswdLenS < 8 || $pswdMatch ==false )            
        {
                
            $validateS = false;           
            //echo "<h class='err_msg'>password empty or incorrect formula</h><br/>";              
            echo "<script type='text/javascript'> document.getElementById('err_msg').innerHTML='password empty or incorrect formula'</script>";           
        }
                            
        if($validateS==true)            
        {                
            $r1 = $db->query($q1);                   
            if($r1->num_rows == 0){
                //echo "<h class='err_msg'>email not exsit</h><br/>";                    
                echo "<script type='text/javascript'> document.getElementById('err_msg').innerHTML='email not exsit'</script>";                
            }               
            else{ 
                $r1= $db->query($q2);  
                if($r1->num_rows == 0)             
                {
                    //echo "<h class='err_msg'>password not match your email</h><br/>";    
                    echo "<script type='text/javascript'> document.getElementById('err_msg').innerHTML='password not match your email'</script>";                    
                }
                else{                         
                    if($r1=$db->query($q3)){   
                        echo "successfully login";                             
                        session_start();                             
                        $_SESSION["email"] = $email;                             
                        header("Location: index.php");                             
                        $db->close();                             
                        exit();                         
                    }    
                    else{                             
                        //echo "<h class='err_msg'>Healthcard number not match your email</h><br/>";
                        echo "<script type='text/javascript'> document.getElementById('err_msg').innerHTML='Healthcard number not match your email'</script>";   
                    }  
                } 
            } 
        }  
        $db->close();
    }
    else{
        echo"<script type='text/javascript>alert('Invalid healthcard number')</script>'";
    }
}
?>

</body>
