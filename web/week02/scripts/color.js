function myButton() {
    alert("Clicked!");
}


function changeBackground() {
	var textbox_id = "bgColor";
	var textbox = document.getElementById(textbox_id);

	var div_id = "div1";
	var div = document.getElementById(div_id);

	// We should verify values here before we use them...
	var color = textbox.value;
	div.style.backgroundColor = color;
}

/*function changeTextColor() {
    var color = document.getElementById("color").value; 
    document.bgColor = color;
    document.getElementById("coltext").style.color = color;
}
document.getElementById("submitColor").addEventListener("click", changeBackground, false);*/


function changeTextColor() {
    var textbox_id = "textcolor";
    var textbox = document.getElementById(textbox_id);
    
    var div_id = "div1"
    var div = document.getElementById(div_id);
    
    var color = textbox.value;
    document.getElementById("coltext").style.color = color;
    /*div.style.style = color;*/
}

$(document).ready(function(){ // <-- use correct syntax
      $("#button1").change(function(){ // <-- use change event
             $("#div2").css("background-color", $(this).val());
       }); 
})

$(document).ready(function(){
  $("#button2").click(function(){
    $("#div3").fadeToggle(3000);
  });
});