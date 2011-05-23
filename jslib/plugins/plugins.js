window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  arguments.callee = arguments.callee.caller;  
  if(this.console) console.log( Array.prototype.slice.call(arguments) );
};
// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});

(function($){
	$.fn.valign = function(){
		this.each(function(){
			var $element = $(this),
				$container = $element.parent();
			
			$container.css('position','relative');
			$element.css({
				position:'absolute',
				top: ($container.height() - $element.height()) / 2
			}).hide().delay(200).fadeIn(500); // waiting for the DOM to get the appropriate changes
		});
	}
})(jQuery);

$(document).ready(function(){
//we need to make sure that the image is loaded	
	$('#logo').css('top','-125px').removeClass('invisible').animate({top:12},1000,function(){
		$(this).animate({top:-12},300,function(){
			$(this).animate({top:0},300);
		});
	});
	
	$('[data-borderradius]').css('borderRadius',function(){
		return $(this).data("borderradius");
	});
	
	$('#links-footer a').css('borderRadius',3);
	
	$('.al-rotate').hover(function(){
		$(this).css('rotate','-3deg');
	},function(){
		$(this).css('rotate',0);
	});
	
	
	$('.prev figure,.next figure').valign();
	
	$('.text,textarea').val("")
	
});