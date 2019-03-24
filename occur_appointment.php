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
               $q1="SELECT * FROM UserInfo WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               $FisrtName=$row['FirstName'];
               $LastName=$row["LastName"];
               echo"<a href='./Medical_History.php'><h1 id='Medical_Historybutton_header'> Medical History </h1> </a>";
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
<p id="Page_Sign">Occur Apponitment</p>


 <?php
               session_start(); 
               if(isset($_SESSION["email"]))
                {


$db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
if ($db->connect_error)
{
        die ("Connection failed: " . $db->connect_error );
}
$q1="SELECT * FROM UserInfo WHERE email='$email'";  	
               $r1=$db->query($q1);
               $row = $r1->fetch_assoc();
               $Doctor_id=$row["user_id"];

echo"<input type='hidden' value='";echo $Doctor_id; echo"' class='Doctor' checked=true>";



// select area start
echo"<div id='select_area' value='0'>";

// left select area start (including specailty and doctor)
echo"<section id='indent-1'>";

    $db->close();

//doctor area start
echo"<section id='Select_Doctor'>";

echo"<section id='calender'>";
echo "<h4 style='display:inline-block;'>using ---> to select the month     </h4>";
echo"<input type='date'  id='appointmentdate'  oninput='caldener_update(event)' ";
echo" min='";
$a_date = date("Y-m-d",strtotime(' +2 day')); 
echo $a_date;
echo"'/>";

$year=date("Y");
$month=date("m");
$day=date("d");
$the_number_of_days="";
$the_number_of_days=cal_days_in_month(CAL_GREGORIAN,$month,$year);
$jd=gregoriantojd($month,1,$year);
$the_Of_week_firstdate=jddayofweek($jd,0);
echo "<h4>     It is ";
echo jdmonthname($jd,1);
echo " in ";
echo $year;
echo "</h4>";
echo"<table  style='text-align: center' >";
echo"<tr><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>";
// first row of the calender
echo"<tr>";

for($i=0;$i<$the_Of_week_firstdate;$i++)
{
echo"<td>   </td>";
}

for($i=1;$i<=(7-$the_Of_week_firstdate);$i++)
{

if($i>$day+1)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update1(event)' checked=false />";
 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $year;echo"-";echo $month;echo"-";echo"$i";echo"'/>";
echo"</td>";}
else
{echo"<td style='color:grey;'>";
echo $i;
echo"</td>";}
}
echo"</tr>";

//rest of the calender
$the_number_of_days=$the_number_of_days-$i;
$j=0;
while($j<=$the_number_of_days)
{
if($j%7==0)
{echo"<tr>";}
if($i>$day+1)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update1(event)' checked=false />";
 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $year;echo"-";echo $month;echo"-";echo"$i";echo"'/>";
echo"</td>";}
else
{echo"<td style='color:grey;'>";
echo $i;
echo"</td>";}
if($j%7==6)
{echo"</tr>";}

$j=$j+1;
$i=$i+1;

}


echo"</table>";
echo"</section>";
//right select area end
echo"</div>";

// select area start end





                }
                 else
               {
                echo "<h3 class='h3_center' style='color:red;'>Please Sign In to make an appointemnt </h3>";

                }





?>

<!--avaibility area-->

<label id="avaibility_label" value="0">

</label>
<!--end of avaibility area-->
<script type="text/javascript" src="HIVM_Javascript_CheckAvaibity.js"> </script> 
</body>