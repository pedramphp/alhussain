$(document).ready(function() {
	
	$('html').removeClass('hide');
	
	QueryLoader.selectorPreload = "body";
	QueryLoader.init(function(){
		//we need to make sure that the image is loaded	
		$('#logo figure:eq(0)').css('top','-125px').removeClass('invisible').animate({top:12},1000,function(){
			$(this).animate({top:-12},300,function(){
				$(this).animate({top:0},300,function(){
					setTimeout(function(){
						
						$('#logo figure:eq(1)').animate({top:12},10,function(){
							$(this).animate({top:-12},300,function(){
								$(this).animate({top:0},300);
							});
						});
					
					},1000);
				});
			});
		});
		
		$('#logo figure:eq(1)').css('top','-125px').removeClass('invisible');
		
		
	});
	
	$('#slider-shadow').css('cursor','pointer').click(function(){
		window.location.href = $('.homepage-slideshow a:visible').attr("href");
	});
	
	
    $('.homepage-slideshow').fadeIn().cycle({
		fx: 'fade',// choose your transition type, ex: fade, scrollUp, shuffle, etc...
	    next:   '.carousel-slideshow .next', 
	    prev:   '.carousel-slideshow .prev'
	});
    
	$('#homepage-videos ul').carousel({
		prev: '#homepage-videos .prev',
		next: '#homepage-videos .next',
		time: 800
	});		

	$('#homepage-images ul').carousel({
		prev: '#homepage-images .prev',
		next: '#homepage-images .next',
		time: 800
	});			
	

	
	$("a.largeImage").colorbox();
	
	$("#homepage-videos li a").colorbox({width:"100%", height:"100%", iframe:true});
	
	
	$("a.largeImage img").niceZoom({
		align : 'center',  // center , left  , right  [default :center  ]
		valign: 'middle',   // middle , top , bottom  [default : middle ]
		duration : 500 ,  // time in milliseconds     [default : 300    ]
		zoom : 5 
	});
	
});