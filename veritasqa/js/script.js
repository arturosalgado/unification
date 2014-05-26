// JavaScript Document
//HTML5 Compatible
document.createElement('header');
document.createElement('footer');
document.createElement('aside');

$(document).ready(function(e) {
	//UI Elements
   	$(".datepicker" ).datepicker({dateFormat:"yy/mm/dd"});
	
	
	//End of UI Elements
	
	$("#print").click(function(){
		 $('img#qr').printPage();
	});
	
	$(".comma").keypress(function(e){
		$(this).val();
	});
});