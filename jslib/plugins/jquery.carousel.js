(function($){

			$.fn.carousel = function( options ){
				options = $.extend({}, $.fn.carousel.settings, options );
				this.each(function(){

					var activeIndex = 1,
					container = this,
					$container = $(container),
					elementWidth = $container.find(':first-child').outerWidth(true),
					size = $container.children().length; 
					$container.css('width', elementWidth * size );
				    
					$container.css('left',0); 
	
					var slider = {

						init: function(){
							if(size <= options.limit){ $( options.next+","+options.prev ).remove(); return; }
							$( options.next ).click($.proxy(this,"next"));
							$( options.prev ).click( $.proxy(this,"prev"));
							
						},
						next: function(e){

							e.preventDefault();
							e.stopPropagation();
							if( $container.is(':animated') ){ return; }
							if( activeIndex >= size - options.limit ){ return; }
							activeIndex += options.limit;	
							$container.animate({ left: parseInt($container.css('left')) + parseInt( options.limit * elementWidth * -1 ) }, options.time);

						},
						prev: function(e){
							
							e.preventDefault();
							e.stopPropagation();
							if( activeIndex === 1 || $container.is(':animated')  ){ return; }
							activeIndex -= options.limit;	
							$container.animate({ left: parseInt($container.css('left'))  + parseInt(options.limit * elementWidth) }, options.time);

						}

					};

					slider.init();
					
				});
				
			}; 

			$.fn.carousel.settings = {
				prev: '.prev',
				next:  '.next',
				limit: 3,
				time: 500
			};
			

		})(jQuery);
