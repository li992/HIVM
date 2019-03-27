<?php
$A_DATE=$_REQUEST["date"];
$doctro_id=$_REQUEST["id"];
$type=$_REQUEST["type"];
if($type==1)    
 { 

$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
             $q1="SELECT * FROM UserInfo WHERE user_id ='$doctro_id'";
             $r1=$db->query($q1);   
echo "<input type='hidden' id='time_doctor_id' value='";
echo $doctro_id;
echo"' /input>";
echo"<h3> Doctor: ";
 while($row1 = mysqli_fetch_array($r1))
{
echo $row1["FirstName"];
echo " ";
echo $row1["LastName"];
echo " in $A_DATE 's Avaiblity as below: </h3> ";
echo "<input type='hidden' id='time_doctor_name' value='";
echo $row1["FirstName"];
echo " ";
echo $row1["LastName"];
echo "' /input>";
echo "<input type='hidden' id='time_date' value='";
echo $A_DATE;
echo "' /input>";
}
   echo"<table>";          
  for($j=1;$j<=14;$j=$j+1) 
       {  
     
           $q2="SELECT * FROM appointmentDB WHERE doctor_id  ='$doctro_id' AND appointmen_date='$A_DATE' AND time='$j' ORDER BY appointmen_date,time";
            $r2=$db->query($q2);

if($j%2==1)
{
echo"<tr >";

}
     echo"<td >";
   
    if($r2->num_rows ==0 )
        {echo "<input type='button' value='";}
   switch ($j) {
        case 1:echo"9:00~9:30";
                break;
         case 2:echo"9:30~10:00";
                break;
        case 3:echo"10:00~10:30";
                break;
        case 4:echo"10:30~11:00";
                break;
        case 5:echo"11:00~11:30";
                break;
        case 6:echo"13:00~13:30";
                break;
        case 7:echo"13:30~14:00";
                break;
        case 8:echo"14:00~14:30";
                break;
        case 9:echo"14:30~15:00";
                break;
        case 10:echo"15:00~15:30";
                break;
        case 11:echo"15:30~16:00";
                break;
        case 12:echo"16:00~16:30";
                break;
        case 13:echo"16:30~15:00";
                break;
        case 14:echo"17:00~17:30";
                break;
   }
 if($r2->num_rows ==0 )
{
echo "' style='width:100px'  class='timebutton' onclick='timebutton_update(event)' checked=false />";
echo"<input type='hidden' class='datebuttonId'";
echo" value='";
echo $j;
echo"'/>";
}
echo"</td>";
if($j%2==0)
{
echo"</tr>";

}

}       
echo"</table>";
echo"<a href='./occur_appointment.php' style='display:inline-block;' ><h2>Back</h2></a>"; }

else if($type==2)
{
$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}

             

//appoinment table
            
               echo"<table>";
               $TODAY=date("Y-m-d");
               if($TODAY==$A_DATE)
               {echo"<tr><td><h2>Today Appointment:<h2></td></tr>";}
               else
               {echo"<tr><td><h2>Appointment in $A_DATE:<h2></td></tr>";}

               
               $q2="SELECT * FROM  appointmentDB WHERE doctor_id='$doctro_id' AND appointmen_date='$A_DATE' ORDER BY appointmen_date,time";  	
               $r2=$db->query($q2);
               if($r2->num_rows == 0)
               {
                echo"<tr><td>Your Dont have any appointment</td></tr>";
                }
              
               while($row2 = $r2->fetch_assoc())
               {
               $date=$row2["appointmen_date"];
               $patient_id=$row2["patient_id"];
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
               echo"<tr><td><input type='button' value='$date $time with    Patient: $Patient_FN $Patient_LN' onclick='pop_comment(event)'/><input type='hidden' value='$appointment_id'/ ></td><td><input type='image' src='./img/bg-img/delete_icon.bmp' alt='delete_icon' class='delete_icon' onclick='deleteappointment(event)' value='$appointment_id' /></td></tr>";

               }

               echo"</table></section>";








}


else if($type==3)
{



$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}

             

//appoinment table
            
               echo"<table class='h3_center'><tr><td><h2>Medicla Histroy:<h2></td></tr>";
               
               $q2="SELECT * FROM  appointmentDB WHERE appointment_id='$doctro_id' ORDER BY appointmen_date,time";  	
               $r2=$db->query($q2);              
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

$q3="SELECT * FROM UserInfo WHERE user_id='$doctor_id' ";  	
$r3=$db->query($q3);
$row3= $r3->fetch_assoc();
$doctor_FN=$row3["FirstName"];
$doctor_LN=$row3["LastName"];
$commmond=$row2["comment"];
echo"<tr><td> $date $time with doctor: $doctor_FN $doctor_LN </td></tr>";
	    echo"</table>";	

              }
echo"<h3 class='h3_center' >Comment</h3>";
echo"<textarea disabled  class='h3_center'  rows='5' cols='50'>$commmond</textarea>";

}

else
  {

$db = mysqli_connect("localhost", "feng209j", "qazwsx88", "feng209j");
               if ($db->connect_error)
               {die ("Connection failed: " . $db->connect_error );}
              
             $q1="SELECT * FROM UserInfo WHERE user_id ='$doctro_id'";
             $r1=$db->query($q1);   
echo "<input type='hidden' id='time_doctor_id' value='";
echo $doctro_id;
echo"' /input>";
echo"<h3> Doctor: ";
 while($row1 = mysqli_fetch_array($r1))
{
echo $row1["FirstName"];
echo " ";
echo $row1["LastName"];
echo " in $A_DATE 's Avaiblity as below: </h3> ";
echo "<input type='hidden' id='time_doctor_name' value='";
echo $row1["FirstName"];
echo " ";
echo $row1["LastName"];
echo "' /input>";
echo "<input type='hidden' id='time_date' value='";
echo $A_DATE;
echo "' /input>";
}
   echo"<table>";          
  for($j=1;$j<=14;$j=$j+1) 
       {  
     
           $q2="SELECT * FROM appointmentDB WHERE doctor_id  ='$doctro_id' AND appointmen_date='$A_DATE' AND time='$j' ORDER BY appointmen_date,time";
            $r2=$db->query($q2);

if($j%2==1)
{
echo"<tr >";

}
     echo"<td >";
   
    if($r2->num_rows ==0 )
        {echo "<input type='button' value='";}
   switch ($j) {
        case 1:echo"9:00~9:30";
                break;
         case 2:echo"9:30~10:00";
                break;
        case 3:echo"10:00~10:30";
                break;
        case 4:echo"10:30~11:00";
                break;
        case 5:echo"11:00~11:30";
                break;
        case 6:echo"13:00~13:30";
                break;
        case 7:echo"13:30~14:00";
                break;
        case 8:echo"14:00~14:30";
                break;
        case 9:echo"14:30~15:00";
                break;
        case 10:echo"15:00~15:30";
                break;
        case 11:echo"15:30~16:00";
                break;
        case 12:echo"16:00~16:30";
                break;
        case 13:echo"16:30~15:00";
                break;
        case 14:echo"17:00~17:30";
                break;
   }
 if($r2->num_rows ==0 )
{
echo "' style='width:100px'  class='timebutton' onclick='timebutton_update(event)' checked=false />";
echo"<input type='hidden' class='datebuttonId'";
echo" value='";
echo $j;
echo"'/>";
}
echo"</td>";
if($j%2==0)
{
echo"</tr>";

}

}                
 echo"</table>";
 echo"<a href='./make_appointment.php' style='display:inline-block;' ><h2>Back</h2></a>"; }
    





            $db->close();         
?> 