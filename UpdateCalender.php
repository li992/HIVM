<?php
$A_DATE=$_REQUEST["date"];
$type=$_REQUEST["type"];
if($type==1)
{


$A_DATE=strtotime($_REQUEST["date"]);
$input_year=date("Y", $A_DATE);

$input_month=date("m", $A_DATE);

echo "<h4 style='display:inline-block;'>using ---> to select the month     </h4>";
echo"<input type='date'  id='appointmentdate' oninput='caldener_update1(event)' ";
echo" min='20";
$a_date = date("y-m-d"); 
echo $a_date;
echo"'/>";

$year=date("Y");
$month=date("m");
$day=date("d");
$the_number_of_days="";
$the_number_of_days=cal_days_in_month(CAL_GREGORIAN,$input_month,$input_year);
$jd=gregoriantojd($input_month,1,$input_year);
$the_Of_week_firstdate=jddayofweek($jd,0);


echo "<h4>     It is ";
echo jdmonthname($jd,1);
echo " in ";
echo $input_year;
echo "</h4>";
echo"<table  style='text-align: center' >";

echo"<table  style='text-align: center';>";
echo"<tr><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>";
// first row of the calender
echo"<tr>";

for($i=0;$i<$the_Of_week_firstdate;$i++)
{
echo"<td>   </td>";
}

for($i=1;$i<=(7-$the_Of_week_firstdate);$i++)
{

if(($i>=$day&&$input_month==$month&&$input_year==$year)||($input_month>$month&&$input_year==$year)||$input_year>$year)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update2(event)' checked=false />";
 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $input_year;echo"-";echo $input_month;echo"-";echo"$i";echo"'/>";
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
if(($i>=$day&&$input_month==$month&&$input_year==$year)||($input_month>$month&&$input_year==$year)||$input_year>$year)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update2(event)' checked=false />";

 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $input_year;echo"-";echo $input_month;echo"-";echo"$i";echo"'/>";

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






}


else
{
$A_DATE=strtotime($_REQUEST["date"]);
$input_year=date("Y", $A_DATE);

$input_month=date("m", $A_DATE);

echo "<h4 style='display:inline-block;'>using ---> to select the month     </h4>";
echo"<input type='date'  id='appointmentdate' oninput='caldener_update(event)' ";
echo" min='20";
$a_date = date("y-m-d",strtotime(' +2 day')); 
echo $a_date;
echo"'/>";

$year=date("Y");
$month=date("m");
$day=date("d");
$the_number_of_days="";
$the_number_of_days=cal_days_in_month(CAL_GREGORIAN,$input_month,$input_year);
$jd=gregoriantojd($input_month,1,$input_year);
$the_Of_week_firstdate=jddayofweek($jd,0);


echo "<h4>     It is ";
echo jdmonthname($jd,1);
echo " in ";
echo $input_year;
echo "</h4>";
echo"<table  style='text-align: center' >";

echo"<table  style='text-align: center';>";
echo"<tr><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>";
// first row of the calender
echo"<tr>";

for($i=0;$i<$the_Of_week_firstdate;$i++)
{
echo"<td>   </td>";
}

for($i=1;$i<=(7-$the_Of_week_firstdate);$i++)
{

if(($i>$day+1&&$input_month==$month&&$input_year==$year)||($input_month>$month&&$input_year==$year)||$input_year>$year)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update(event)' checked=false />";
 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $input_year;echo"-";echo $input_month;echo"-";echo"$i";echo"'/>";
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
if(($i>$day+1&&$input_month==$month&&$input_year==$year)||($input_month>$month&&$input_year==$year)||$input_year>$year)
{echo"<td >";
 echo"<input type='button' value='";
 echo $i;
 echo "' style='width:80px'  class='datebutton' onclick='datebutton_update(event)' checked=false />";

 echo"<input type='hidden' class='datebuttonId'";
 echo" value='";
 echo $input_year;echo"-";echo $input_month;echo"-";echo"$i";echo"'/>";

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

}


?>