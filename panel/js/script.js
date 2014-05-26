// JavaScript Document
//HTML5 Compatible
document.createElement('header');
document.createElement('footer');
document.createElement('aside');

$(document).ready(function(e) {
   	$(".datepicker" ).datepicker({dateFormat:"yy/mm/dd"});
    $(".clickable").click(function(){
       var testmp = $(this).attr("link").indexOf(".mp4");
       var link = $(this).attr("link");
       if(testmp >= 0){
          $("source").attr("src", "link")
          $("#popup").dialog("open");
       }
       else{

           $("#docviewer").attr("src", link);
       }

    });
	$("#print").click(function(){
		 $('img#qr').printPage();
	});
	
	$("#hide").hide();
	$("#buttons").hide();

    $("#popup").dialog({title:'Video'},{autoOpen:false,width:"624",height:"420"});
});