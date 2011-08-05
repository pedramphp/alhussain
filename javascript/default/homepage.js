$(document).ready(function() {
	
	$('html').removeClass('hide');
	
	QueryLoader.selectorPreload = "body";
	QueryLoader.init(function(){
		//we need to make sure that the image is loaded	
		$('#logo figure:eq(0)').css('top','-125px').removeClass('invisible').animate({top:12},1000,function(){
			$(this).animate({top:-12},300,function(){
				$(this).animate({top:0},300,function(){
						$('#logo figure:eq(1)').animate({top:12},10,function(){
							$(this).animate({top:-12},300,function(){
								$(this).animate({top:0},300);
							});
						});
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
    
	$('#homepage-videos,#homepage-images').carousel({
		prev: '.prev',
		next: '.next',
		nav : 'nav',
		time: 800,
		loop: true,
		limit: 3
	});		

	

	
	$("a.largeImage").colorbox();
	
	$("#homepage-videos li a").colorbox({width:"100%", height:"100%", iframe:true});
	/*
	$("a.largeImage img").niceZoom({
		align : 'center',  // center , left  , right  [default :center  ]
		valign: 'middle',   // middle , top , bottom  [default : middle ]
		duration : 500 ,  // time in milliseconds     [default : 300    ]
		zoom : 5 
	});*/
	
	
	
	$('#homepage-videos li a:has(:not(span))').live('mouseenter',function(e){
		var $span = $("<span style='left:169px;'/>");
		$span.insertAfter( $(this).find('figure') );
		$span.stop().delay(100).animate({left:0, opacity: 1},{queue:false,duration:600,specialEasing: {right: 'easeOutQuint'},complete:function(){
			$(this).closest('li').css('border-color','#660000');
		}});
	});
	
	$('#homepage-videos li a:has(span)').live('mouseleave',function(e){
		$(this).find('span').stop().delay(100).animate({left:-169, opacity: 0}, {queue:false,duration:600,specialEasing:{right: 'easeOutQuint'},complete:function(){
			$(this).closest('li').css('border-color','#363636').end().remove();
		}});
	});
	
	$('#homepage-images li a:has(:not(span))').live('mouseenter',function(e){
		var $span = $("<span style='left:176px;'/>");
		$span.insertAfter( $(this).find('figure') );
		$span.stop().delay(100).animate(
			{left:0, opacity: 1},
			{
				queue:false,
				duration:600,
				specialEasing: {right: 'easeOutQuint'},
				complete: function(){
					$(this).closest('li').css('border-color','#660000');
				}
			}
		);
	});
	
	$('#homepage-images li a:has(span)').live('mouseleave',function(e){

		 $(this).find('span').stop().delay(100).animate(
			{left:-176, opacity: 0},{
				queue:false,
				duration:600,
				specialEasing:{right: 'easeOutQuint'},
				complete: function(){
					$(this).closest('li').css('border-color','#363636').end().remove();
				}
			}
		);
	});
	
	
});