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
if($user_id=$row["Specialty"]=="PATIENT")
  {        
    
    echo "<table>
    <tr>
    <td class='appointment_td'>
    </td>
    <td  class='appointment_td'>
    <a href='./make_appointment.php' class ='blacklink'><h2 id='make_appointment_button'>make appointment     </h2></a> 
    </td>
    <td class='appointment_td'>
    </td>
    <td>
    </td>
    </tr>
    </table>";
    
              //appoinment table
                $user_id=$row["user_id"];
               echo"<table id='table_center'>";
               echo"<tr><td><h2>Your Appointment:</h2></td></tr>";
               $q2="SELECT * FROM  appointmentDB WHERE patient_id='$user_id'";  	
               $r2=$db->query($q2);
               if($r2->num_rows == 0)
               {
                echo"<tr><td>Your Dont have any appointment</td></tr>";
                }
              
               while($row2 = $r2->fetch_assoc())
               {
               $date=$row2["appointmen_date"];
               $doctor_id=$row2["doctor_id"];
//translate time index to time period

 switch ($row2["time"]) {
        case 1: $time= "9:00~9:30";
                break;
         case 2: $time= "9:30~10:00";
                break;
        case 3: $time= "10:00~10:30";
                break;
        case 4: $time= "10:30~11:00";
                break;
        case 5: $time= "11:00~11:30";
                break;
        case 6: $time= "13:00~13:30";
                break;
        case 7: $time= "13:30~14:00";
                break;
        case 8: $time= "14:00~14:30";
                break;
        case 9: $time= "14:30~15:00";
                break;
        case 10: $time= "15:00~15:30";
                break;
        case 11: $time= "15:30~16:00";
                break;
        case 12: $time= "16:00~16:30";
                break;
        case 13: $time= "16:30~15:00";
                break;
        case 14: $time= "17:00~17:30";
                break;
        }          


//get dotcto infromation 
$q3="SELECT * FROM UserInfo WHERE user_id='$doctor_id'";  	
$r3=$db->query($q3);
$row3= $r3->fetch_assoc();
$Doctor_FN=$row3["FirstName"];
$Doctor_LN=$row3["LastName"];


               echo"<tr><td> $date $time with     Doctor: $Doctor_FN $Doctor_LN </td></tr>";

               }

               echo"</table>";
              }


              else
              {


    echo "<table>
    <tr>
    <td class='appointment_td'>
    </td>
    <td  class='appointment_td'>
    <a href='./occur_appointment.php' class ='blacklink'><h2 id='make_appointment_button'>Empty an  appointment  period</h2></a> 
    </td>
    <td class='appointment_td'>
    </td>
    <td>
    </td>
    </tr>
    </table>";



 $user_id=$row["user_id"];
echo"<input type='hidden' value='";echo $user_id; echo"' id='onlyDoctor'/>";
echo"<section id='indent-1'>";
              //appoinment table
               
               echo"<table id='table_center'>";
               echo"<tr><td><h2>Today Appointment:</h2></td></tr>";
                $TODAY=date(Y,m,d);
               $q2="SELECT * FROM  appointmentDB WHERE doctor_id='$user_id' AND appointmen_date='$TODAY'";  	
               $r2=$db->query($q2);
               if($r2->num_rows == 0)
               {
                echo"<tr><td>Your Dont have any appointment</td></tr>";
                }
              
               while($row2 = $r2->fetch_assoc())
               {
               $date=$row2["appointmen_date"];
               $patient_id=$row2["$patient_id"];
 $appointment_id=$row2['appointment_id'];
//translate time index to time period

 switch ($row2["time"]) {
        case 1: $time= "9:00~9:30";
                break;
         case 2: $time= "9:30~10:00";
                break;
        case 3: $time= "10:00~10:30";
                break;
        case 4: $time= "10:30~11:00";
                break;
        case 5: $time= "11:00~11:30";
                break;
        case 6: $time= "13:00~13:30";
                break;
        case 7: $time= "13:30~14:00";
                break;
        case 8: $time= "14:00~14:30";
                break;
        case 9: $time= "14:30~15:00";
                break;
        case 10: $time= "15:00~15:30";
                break;
        case 11: $time= "15:30~16:00";
                break;
        case 12: $time= "16:00~16:30";
                break;
        case 13: $time= "16:30~15:00";
                break;
        case 14: $time= "17:00~17:30";
                break;
        }          


//get dotcto infromation 
$q3="SELECT * FROM UserInfo WHERE user_id='$patient_id'";  	
$r3=$db->query($q3);
$row3= $r3->fetch_assoc();
$Patient_FN=$row3["FirstName"];
$Patient_LN=$row3["LastName"];
               echo"<tr><td> $date $time with    Patient: $Patient_FN $Patient_LN </td><td><input type='image' src='./img/bg-img/delete_icon.bmp' alt='delete_icon' class='delete_icon' onclick='deleteappointment(event)' value=' $appointment_id'/ ></td></a></tr>";

               }

               echo"</table></section>";


//right select area start
echo"<section id='calender'>";
echo "<h4 style='display:inline-block;'>using ---> to select the month     </h4>";
echo"<input type='date'  id='appointmentdate'  oninput='caldener_update1(event)' ";
echo" min='20";
$a_date = date("y-m-d"); 
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

if($i>=$day)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update2(event)' checked=false />";
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
if($i>=$day)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update2(event)' checked=false />";
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










              }


}
else {
  echo "<table>
  <tr>
  <td class='appointment_td'>
  </td>
  <td  class='appointment_td'>
  <a href='./make_appointment.php' class ='blacklink'><h2 id='make_appointment_button'>make appointment     </h2></a> 
  </td>
  <td class='appointment_td'>
  </td>
  <td>
  </td>
  </tr>
  </table>";
}
?>






</div> 
<!-- end top -->


</body>
