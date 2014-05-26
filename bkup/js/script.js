// JavaScript Document
document.createElement('header');
document.createElement('footer');
document.createElement('aside');

$(document).ready(function(e) {
   	$(".datepicker" ).datepicker({dateFormat:"yy/mm/dd"});
    $(".clickable").click(function(){
       var link = $(this).attr("link");
       $("#docviewer").attr("src", link);
    });
	$("#print").click(function(){
		window.print();
	});
});