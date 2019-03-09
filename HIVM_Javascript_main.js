function Doctor_dropdownchange(event)
{

  var elements = document.getElementsByClassName("Specialty");
  var inner="";
   
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

               var results = JSON.parse(this.responseText);
      for(var a=0;a<elements.length;a++)
 {
                    for (var i = 0; i < results.length; i++) 
                 {     var json_result = results[i];
                    if(elements[a].value==(json_result[2])&&elements[a].checked==true)
                      {
                      inner=inner+"<label class='container' >";
                      inner=inner+json_result[0].toString()+" "+json_result[1].toString();
                      inner=inner+"<input type='checkbox' value='";
                      inner=inner+json_result[3].toString();
                      inner=inner+"' class='Doctor'>";
                      inner=inner+"<span class='checkmark'></span></label>";
                      }
                  }
  }                
             var DropDowns =document.getElementsByClassName("dropdown-content");
              var DropDown=DropDowns[1];
              DropDown.innerHTML = inner;         
                  }
                    
            
         
       } 
         xmlhttp.open("GET", "UpdateDoctor.php", true);
         xmlhttp.send();

}



function update_appointment(event)
{

  var elements = document.getElementsByClassName("Doctor");
  var a=document.getElementsByName("appointmentdate");
  var label =document.getElementById("avaibility_label");

  var A_DATE=a[0].value;
  var c=0;
label.innerHTML="";
  var inner="";

 

    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

inner = "<table id='appointment_table'>"
                                       +"<tr class='tr_appointment_table'>"
                                       +"<td>"+"Index"+"</td>"
                                       +"<td>"+"Doctor_name"+"</td>"
                                       +"<td>"+"Specilty"+"</td>"
                                       +"<td>"+"Date"+"</td>"
                                       +"<td>"+"time"+"</td>"
                                       +"<td>"+"Status"+"</td>"
                                       +"</tr>";                 
                                       label.value=1; 

             var results = JSON.parse(this.responseText);
for(var j=0;j<elements.length;j++)
 { 
              if(elements[j].checked==true)//select the choose doctor
               { 
                  for (var i = 0; i < results.length; i++) 
                 {    
                  var json_result = results[i];
                        if(elements[j].value==json_result[3])
                          { c=c+1;
                            inner =inner
                            +"<tr class='tr_appointment_table'>"
                            +"<td>"+c+"</td>"
                            +"<td>"+json_result[2]+" "+json_result[3]+"</td>"
                            +"<td>"+json_result[4]+"</td>"
                            +"<td>"+json_result[6]+"</td>"
                            +"<td>"+json_result[0]+"</td>";
                          if(json_result[7]=="YES")
                           {inner =inner +"<td class='td_yes_table'>"+json_result[7]+"</td>"}
                           else
                           {inner =inner +"<td class='td_no_table'>"+json_result[7]+"</td>"}
                           inner =inner +"</tr>";    

                          }                   
                 }
                }

              }

label.innerHTML=label.innerHTML+inner+ "</table>";
                 }

}                        
         xmlhttp.open("POST", "UpdateAppointment.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("date="+A_DATE);

label.value=0;

 
}


