$(document).ready(function(){
	$("#top").hide();
	$(function toTop() {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		    	$('#top').fadeIn().show();
		    } else {
		    	$('#top').fadeOut();
		    }
	    });

	  	$('#top').click(function () {
	    	$('body,html').animate({
	     		scrollTop: 0
	   		}, 500);
	   		return false;
	  	});
	});   

});