$(document).ready(function(){
	
	$('#video-categories nav > a').bind('click',function(){
		
		$(this).toggleClass('clicked').next('ul').slideToggle(500);
		
	}).each(function(index){
		if(!$(this).hasClass('clicked')){
			$(this).next('ul').slideUp(500);
		}	
	});
	
	$('.video-has-thumb li a:has(:not(span))').live('mouseenter',function(e){
		var $span = $("<span />").hide();
		$span.insertAfter( $(this).find('figure') ).stop().fadeIn();
		
	});
	
	$('.video-has-thumb li a:has(span)').live('mouseleave',function(e){
		$(this).find('span').stop().fadeOut(function(){
			$(this).remove();
		})
	});
	
	
	$('.video-sidebox').click(function(){
		
		$(this).toggleClass('box-close').find('ul').slideToggle(500);
		
	})
	
})