var i=0;
var a=document.getElementsByClassName("Specialty");
while(i<a.length)
{
a[i].addEventListener("change", Doctor_dropdownchange); 
i++;
}

var i=0;
var a=document.getElementsByClassName("Specialty2");
while(i<a.length)
{
a[i].addEventListener("change", AppoinmentUpdate); 
i++;
}
//var x = document.getElementById("appointmentdate");
//x.addEventListener("input", caldener_update); 
