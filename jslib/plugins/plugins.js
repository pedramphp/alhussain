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
