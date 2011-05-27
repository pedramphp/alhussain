$(document).ready(function() {
	
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
	
	$("#homepage-videos li img").niceZoom({
		align : 'center',  // center , left  , right  [default :center  ]
		valign: 'middle',   // middle , top , bottom  [default : middle ]
		duration : 500 ,  // time in milliseconds     [default : 300    ]
		zoom : 5 
	});
	
	$("a.largeImage img").niceZoom({
		align : 'center',  // center , left  , right  [default :center  ]
		valign: 'middle',   // middle , top , bottom  [default : middle ]
		duration : 500 ,  // time in milliseconds     [default : 300    ]
		zoom : 5 
	});
	
});