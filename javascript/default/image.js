$(document).ready(function(){
	$("a.largeImage").colorbox();
	
	$('.image-gallery figure').fadeTo('slow', 0.7);
	
	$('.image-gallery figure').hover(function(){
		$(this).stop().fadeTo(200,1);
	},function(){
		$(this).stop().fadeTo('slow',0.7);
	})
	
});