$(document).ready(function(){
	
	$('#faq-list li').bind('click',function(){
		
		$(this).toggleClass('active').find('div').slideToggle(500);
		
	}).each(function(index){
		
		if( index == 0){
			$(this).addClass('active').find('div').show();
		}else{
			$(this).find('div').hide();
		}
		
	});
	
	
});