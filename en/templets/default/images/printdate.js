// JavaScript Document
document.write('<span id="Clock"></span>');
function tick() {
tmpDate = new Date();
date = tmpDate.getDate();
month = tmpDate.getMonth();
year = tmpDate.getFullYear();
hour = tmpDate.getHours();
minute=tmpDate.getMinutes();
second=tmpDate.getSeconds();
var m=new Array("Jan","Feb","Mar","Apr","May","Jun","July","Aug","Spt","Oct","Nov","Dec"); 
timeString = date + " " + m[month] + " " +year + "    "+ hour + " : "+ minute + " : "+second;
$("#Clock").text(timeString);
window.setTimeout("tick();", 100);
}
$(document).ready(function(){tick();});
