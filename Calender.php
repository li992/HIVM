<?php
echo"<button type='button' id='Last_Month' onclick=''>Last Month</button>";
echo"<button type='button' id='Next_Month' onclick=''>Next Month</button>";
$year=date("Y");
$month=date("m");
$day=date("d");
$the_number_of_days="";
$the_number_of_days=cal_days_in_month(CAL_GREGORIAN,$month,$year);
$jd=gregoriantojd($month,1,$year);
$the_Of_week_firstdate=jddayofweek($jd,0);
echo"<table>";
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
 echo "' />";
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
 echo "' />";
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
?>