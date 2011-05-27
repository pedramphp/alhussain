$(document).ready(function(){

	if ( $.browser.msie && $_LITE_.action != 'homepage') {
		$('html').css('background','url("'+$_LITE_.imagePath+'layout/bg2.png") repeat-x transparent');
	}
	
	// fixing the outline issue
	$('a').live('mousedown', function() { 
		$(this).blur(); 
		return false; 
	}).live('click', function() { 
		$(this).blur(); 
	}).live('focus', function() { 
		if ( $.browser.msie ) { 
			$(this).blur(); 
		} 
	});
	
	//go top
	$('.gotop').click(function(){
		$.gotop();		
	});
	
	//donation
	$('.donate-button').click(function(event){
		event.preventDefault();
		$(this).parents('form').submit();
	});
	
	$('#books-footer ul').carousel({
		prev: '#books-footer .prev',
		next: '#books-footer .next',
		time: 800
	});			
	
	
	
	//sponser header
	var sponsers = "Imam Shirazi World Foundation, Imam Ali (A.S) Center Springfield VA,Prestige. Productionz Washington DC,Kabob Factory Lorton VA".split(",");
	var activeIndex = 1;
	setInterval(function(){
		$('#header-sponser span').fadeOut(500,function(){
			$(this).text(sponsers[activeIndex]).fadeIn(500);
			if(activeIndex != sponsers.length-1){ activeIndex++; }
			else{ activeIndex = 0; }
		});
	},5000);
	
	footerContact.init();
	
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
	
	$('.text,textarea').val("");
	
	/*
	$("#main-container img").lazyload({ 
	    placeholder : $_LITE_.GetVariable('imagePath') + "general/grey.gif",
	    effect : "fadeIn"
	});
	*/
	
});


var footerContact = {
		
		enable: true,
		loadingMsg: $("<span class='loadingMsg'>Sending message please wait</span>"),
		successMsg: $("<span class='successMsg'>Your message has been sent</span>"),
		errorMsg: $("<span class='errorMsg'>Please try Again</span>"),
		$button: $("#contact-footer button"),
		init: function(){
			this.events();
		},
		
		events: function(){
			this.$button.click( $.proxy(this,"submit") );
		},
		
		submit: function(event){
			event.preventDefault();
			if( !this.enable ){ return }
			var buttonTd = $(event.currentTarget).parent(),
				$form = $(event.currentTarget).parents("form");
			
			$_LITE_.jsonRPC({
				scope: this, 
				api: 'Contact',
				method: 'footerContact',
				data: { params: $.deparam.querystring($form.serialize()) },
				success: function( data, textStatus, jqXH ){
					this.hideLoading();
					this.loadSucecssMsg()
				},
				error: function(){
					this.hideLoading();
					this.loadErrorMsg()
				},
				beforeSend: function(){
					this.disableForm();
					this.showLoading()
				}
			});
		},
		
		disableForm: function(){
			this.$button.attr("disabled",true);
			this.enable = false;
		},
		
		enableForm: function(){
			this.$button.removeAttr("disabled");
			this.enable = true;		
		},
		
		showLoading: function(){
			this.$button.before( this.loadingMsg.clone() );
		},
		
		hideLoading: function(){
			this.$button.prev('span').remove();
		},
		
		loadSucecssMsg: function(){
			var $successMsg = this.successMsg.clone();
			this.$button.before( $successMsg );
			$successMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
				$successMsg.remove();
				this.enableForm();
			},this));
		},
		
		loadErrorMsg: function(){
			var $errorMsg = this.errorMsg.clone();
			this.$button.before( $errorMsg );
			$errorMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
				$errorMsg.remove();
				this.enableForm();
			},this));		
		}
		
}; /* </footerContact > */