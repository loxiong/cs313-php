var now = new Date();
var month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
var day = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
var fdate = day[now.getDay()]+", " + month[now.getMonth()] +" "+ now.getDate() + ", " + now.getFullYear();
document.getElementById("currentdate").innerHTML=fdate;