function Doctor_dropdownchange(event)
{

  var elements = document.getElementsByClassName("Specialty");
  var inner="";
   
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
inner=inner+"<table>";
               var results = JSON.parse(this.responseText);
      for(var a=0;a<elements.length;a++)
 {
                    for (var i = 0; i < results.length; i++) 
                 {     var json_result = results[i];
                    if(elements[a].value==(json_result[2])&&elements[a].checked==true)
                      {
  
inner=inner+"<tr><td><h3 style='text-align:center; '>"
             +json_result[0].toString()+" "+json_result[1].toString()
             +"</h3></td><td><input type='checkbox' value='"
             +json_result[3].toString()+"' class='Doctor' onchange='selecteddoctor(event)'></td></tr>";




                      }
                  }
  }              
inner=inner+"</table>";  
   var outputs=document.getElementsByClassName("Appointment_table");
    outputs=outputs[1];
                outputs.innerHTML = inner;         
                  }
                    
            
         
       } 
         xmlhttp.open("GET", "UpdateDoctor.php", true);
         xmlhttp.send();

}







function caldener_update(event)
{
var x = document.getElementById("appointmentdate");
x=x.value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("calender");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateCalender.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+x+"&type="+0);



}





function caldener_update1(event)
{
var x = document.getElementById("appointmentdate");
x=x.value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("calender");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateCalender.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+x+"&type="+1);



}









function selecteddoctor(event)
{

 var elements = document.getElementsByClassName("Doctor");
var x = event.target;
 var number_of_selected_doctor=0;
for(var e=0;e<elements.length;e++)
 {  
     if(elements[e].checked==true)//select the choose doctor
               {number_of_selected_doctor=number_of_selected_doctor+1; }

}
if(number_of_selected_doctor>1)
{
alert("select only one doctor !");
x.checked=false;
}

}




function datebutton_update(event)
{

 




var x = event.target;
var a=x.nextSibling;
var a_date=a.value;
 var elements = document.getElementsByClassName("Doctor");
var x = event.target;
 var doctor_id=0;







 var number_of_selected_doctor=0;
for(var e=0;e<elements.length;e++)
 {  
     if(elements[e].checked==true)//select the choose doctor
               {number_of_selected_doctor=number_of_selected_doctor+1; }

}
if(number_of_selected_doctor==0)
{
alert("select a doctor !");
x.checked=false;
return;
}





for(var e=0;e<elements.length;e++)
 {  
     if(elements[e].checked==true)//select the choose doctor
               {doctor_id =elements[e].value;
                 break;}

}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("calender");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateAppointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+a_date+"&id="+doctor_id+"&type="+0);


}




function datebutton_update1(event)
{

 




var x = event.target;
var a=x.nextSibling;
var a_date=a.value;
 var elements = document.getElementsByClassName("Doctor");
var x = event.target;
 var doctor_id=0;







 var number_of_selected_doctor=0;
for(var e=0;e<elements.length;e++)
 {  
     if(elements[e].checked==true)//select the choose doctor
               {number_of_selected_doctor=number_of_selected_doctor+1; }

}
if(number_of_selected_doctor==0)
{
alert("select a doctor !");
x.checked=false;
return;
}





for(var e=0;e<elements.length;e++)
 {  
     if(elements[e].checked==true)//select the choose doctor
               {doctor_id=elements[e].value;
                 break;}

}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("calender");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateAppointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+a_date+"&id="+doctor_id+"&type="+1);


}



function datebutton_update2(event)
{
var x = event.target;
var a=x.nextSibling;
var a_date=a.value;
 var element = document.getElementById("onlyDoctor");
var x = event.target;
 var doctor_id=0;

doctor_id =element.value;
  
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("Select_Doctor");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateAppointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+a_date+"&id="+doctor_id+"&type="+2);


}










function timebutton_update(event)
{
var x = event.target;
var a=x.nextSibling;
var a_time=a.value;
var doctor_id= document.getElementById("time_doctor_id").value;
var doctor_name= document.getElementById("time_doctor_name").value;
var a_date= document.getElementById("time_date").value;
var inner="";

inner=inner+"<form method='post'  action='./confirmappointment.php'>"+
           "<input type='hidden' name='submittedS' value='1'/>"+
        "<table id='table_center'>"+
      "<tr><td>Doctor name:</td>"+"<td><input type='text' name='Doctorname' disabled value='"+doctor_name+"'> </td></tr>"+
      "<tr><td>Date:</td>"+"<td><input type='text' name='Date1' disabled value='"+a_date+"'> </td></tr>";
inner=inner+ "<tr><td>Time:</td>"+"<td><input type='text' name='Time' disabled value='";
switch (a_time) {
        case '1':
               inner=inner+"9:00~9:30";
                break;
         case '2':
               inner=inner+"9:30~10:00";
                break;
        case '3':
                inner=inner+"10:00~10:30";
                break;
        case '4':
                inner=inner+"10:30~11:00";
                break;
        case '5':
                inner=inner+"11:00~11:30";
                break;
        case '6':
                inner=inner+"13:00~13:30";
                break;
        case '7':
               inner=inner+"13:30~14:00";
                break;
        case '8':
                inner=inner+"14:00~14:30";
                break;
        case '9':
                inner=inner+"14:30~15:00";
                break;
        case '10':
                inner=inner+"15:00~15:30";
                break;
        case '11': 
                inner=inner+"15:30~16:00";
                break;
        case '12': 
                inner=inner+"16:00~16:30";
                break;
        case '13':
                inner=inner+"16:30~15:00";
                break;
        case 14:
                inner=inner+"17:00~17:30";
                break;
        default:
         inner=inner+ "No time found";
   }
inner=inner+"'> </td></tr></table>";
         inner=inner+"<input type='hidden' name='TimeIndex' value='"+a_time+"'>"+
         "<input type='hidden' name='Date'  value='"+a_date+"'>"+
        "<input type='hidden' name='DoctorId' value='"+doctor_id+"'> <br>"+
        "<input type='submit' id='check_submit' style='margin-left:45%;' value='Confirm  Request'></></form> ";  
document.getElementById("select_area").innerHTML=inner;



}



function deleteappointment(event)
{


var x = event.target.value;
var element=document.getElementById("indent-1");

element.innerHTML=this.responseText;






var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("indent-1");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./deleteappointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("id="+x+"&type="+0);


}




function AppoinmentUpdate(event)
{


    var elements = document.getElementsByClassName("Specialty2");
   var x=element=document.getElementById("user_id").value;
var a_date=document.getElementById("appointmentdate").value;
   var inner="";
             
         
      
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
inner=inner+"<table>";
               var results = JSON.parse(this.responseText);
      for(var a=0;a<elements.length;a++)
 {
                    for (var i = 0; i < results.length; i++) 
                 {     var json_result = results[i];
                    if(elements[a].value==(json_result[2])&&elements[a].checked==true)
                      {
  
inner=inner+"<tr><td><h3 style='text-align:center; '>"
             +json_result[0].toString()+" "+json_result[1].toString()+" "+json_result[2].toString()+" "+json_result[4].toString()+" "+json_result[5].toString()+" "
             +"</h3></td><td><input type='button' onclick='History_update(event)' style='background-color: #4CAF50;' value='click'><input type='hidden' value='"
             +json_result[3].toString()+"' class='appointment'/></td></tr>";




                      }
                  }
  }              
inner=inner+"</table>";  
   var outputs=document.getElementsByClassName("Appointment_table");
    outputs=outputs[1];
                outputs.innerHTML = inner;         
                  }
                    
            
         
       } 
         


            xmlhttp.open("POST", "./UpdateDoctor.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("id="+x+"&type="+1+"&date="+a_date);


}


function History_update(event)
{






var x = event.target.nextSibling.value;






var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("calender");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./UpdateAppointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("id="+x+"&type="+3);




}







function Serachpatient(event)
{


var type = event.target.previousSibling.value;
var inputtext=event.target.value.trim();


if(type=="Serach_by_name")
{

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("showreturnarea");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+0);


}

else if (type=="Serach_by_hc")
{


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("showreturnarea");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+1);


}



}



function detailinformation(event)
{





var inputtext = event.target.nextSibling.value;






var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("Select_Doctor");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+2);





var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("Detail Column");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+3);



}












function appointment_list(event)
{

var inputtext = event.target.nextSibling.value;


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("Detail Column");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+4);


}



function backto_list()
{

var inputtext =document.getElementById("patient_id").value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


var element=document.getElementById("Detail Column");
element.innerHTML=this.responseText;


    }
};
         xmlhttp.open("POST", "./Serachpatient.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("inputtext="+inputtext+"&type="+3);



}


function pop_comment(event)
{
var inputtext = event.target.nextSibling.value;

document.getElementById("popupappointment").value=inputtext;

document.getElementById("myForm").style.display = "block";

}



function closeForm() {
  document.getElementById("myForm").style.display = "none";
}