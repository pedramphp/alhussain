$(window).load(function(){
	$('html').removeClass('hide');
	if ( $.browser.msie && $_LITE_.action != 'homepage') {
		$('html').css('background','url("'+$_LITE_.imagePath+'layout/bg2.png") repeat-x transparent');
	}
	
	$('.tweetAutoFader').delay(2000).fader({
		innerTag: 'p'
	});
});


$(document).ready(function(){
	
	$('[data-borderradius]').css('borderRadius',function(){
		return $(this).data("borderradius");
	});
	
	

	$('#nav-about').hover(function(){
		$(this).find("ul").stop().slideDown();
	},function(e){
		if(!$(this).find("ul").is($(e.relatedTarget).closest("ul"))){
				 $(this).find("ul").stop().slideUp()
		}
	});
	
	footerContact.init();
	newsletter.init();
	core.tweets()
		.books()
		.donation()
		.gotop()
		.fixOutline()
		.resetForm()
		.alignCarouselArrows()
		.sponsers()
		.rotateLogo()
		.visitors()
		.href();
	
});

var newsletter = {
		enable: true,
		loadingMsg: $("<div class='msgBox'><span class='loadingMsg'>Sending message please wait</span></div>"),
		successMsg: $("<div class='msgBox'><span class='successMsg'>You have been successfully subscribed to our newsletter.</span></div>"),
		errorMsg: $("<div class='msgBox'><span class='errorMsg'>Please try Again</span></div>"),
		$button: null,
		$selectedButton: null,
		init: function(){
			this.$button = $(".form-newsletter button");
			this.events();
		},
		
		events: function(){
			this.$button.live('click', $.proxy(this,"submit") );
		},
		
		submit: function(event){
			this.$selectedButton = $(event.currentTarget);
			event.preventDefault();
			if( !this.enable ){ return }
			var $form = $(event.currentTarget).parents("form");
			
			$_LITE_.jsonRPC({
				scope: this, 
				api: 'Contact',
				method: 'subscribe',
				data: { params: $.deparam.querystring($form.serialize()) },
				success: function( data, textStatus, jqXH ){
					if( data.SiteData.Contact_subscribe.success ){
						this.hideLoading();
						this.loadSucecssMsg();
						$form.find(':text').val('');
					}else{
						this.error(data.SiteData.Contact_subscribe.errorMsg);
					}
				},
				error: this.error,
				beforeSend: function(){
					this.disableForm();
					this.showLoading();
				}
			});
		},
		
		error: function(errorMsg){
			
			this.hideLoading();
			this.loadErrorMsg(errorMsg)		
			
		},
		
		disableForm: function(){
			this.$selectedButton.attr("disabled",true);
			this.enable = false;
		},
		
		enableForm: function(){
			this.$selectedButton.removeAttr("disabled");
			this.enable = true;		
		},
		
		showLoading: function(){
			this.$selectedButton.after( this.loadingMsg.clone() );
		},
		
		hideLoading: function(){
			this.$selectedButton.next('div').remove();
		},
		
		loadSucecssMsg: function(){
			var $successMsg = this.successMsg.clone();
			this.$selectedButton.after( $successMsg );
			$successMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
				$successMsg.remove();
				this.enableForm();
			},this));
		},
		
		loadErrorMsg: function(errorMsg){
			var $errorMsg = this.errorMsg.clone();
			$errorMsg.find("span").text(errorMsg);
			this.$selectedButton.after( $errorMsg );
			$errorMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
				$errorMsg.remove();
				this.enableForm();
			},this));		
		}		
};

var core = {
		books: function(){
			$('#books-footer').carousel({
				prev: '.prev',
				next: '.next',
				nav : 'nav',
				time: 800,
				loop: true,
				limit: 4
			});		
			
			$('a.books-shadow:has(:not(span))').live('mouseenter',function(e){
				var $span = $("<span style='left:100px;'/>");
				$span.insertAfter( $(this).find('figure') );
				$span.stop().delay(100).animate({left:0, opacity: 1},{queue:false,duration:600,specialEasing: {right: 'easeOutQuint'}});
			});
			
			$('a.books-shadow:has(span)').live('mouseleave',function(e){
				$(this).find('span').stop().delay(100).animate({left:-100, opacity: 0}, {queue:false,duration:600,specialEasing:{right: 'easeOutQuint'}},function(){
					$(this).remove();
				});
				
			});
			
			return this;
			
		},
		
		visitors: function(){
			var countries= {};
			$.getJSON("http://api.getclicky.com/api/stats/4?site_id=66435237&sitekey=561bc24f94399f2b&type=visitors-list&date=today&output=json&json_callback=?",function( response ){
					
					$.each(response[0].dates[0].items,function(index,value){
						if(!countries[value.country_code]){ countries[value.country_code] = 1 }
						else{ countries[value.country_code]++; }
					});

					var $copyright = $('#copyright');
					var $countries = $("<div id='countries' />");
					var $countryUL = $("<ul class='center-container horizontal clearfix' />");
					$countryUL.appendTo( $countries );
					$.each(countries,function(country,count){
						var plural = (count>1)?"s":"";
						$countryUL.append("<li><img src='"+$_LITE_.imagePath + "general/flags/"+country+".gif' /><span>" + count + " visitor"+plural+"</span></li>");
					});
					$copyright.after( $countries );
			});
			return this;
		},
		
		donation: function(){
			//donation
			$('.donate-button').click(function(event){
				event.preventDefault();
				$(this).parents('form').submit();
			});
			return this;
		},
		
		gotop: function(){
			//go top
			$('.gotop').click(function(){
				$.gotop();		
			});
			return this;
		},
		
		sponsers: function(){
			//sponser header
			var sponsers = "Imam Shirazi World Foundation, Imam Ali (A.S) Center Springfield VA,Prestige.Productionz Washington DC,Kabob Factory Lorton VA".split(",");
			var activeIndex = 1;
			setInterval(function(){
				$('#header-sponser span').fadeOut(500,function(){
					$(this).text(sponsers[activeIndex]).fadeIn(500);
					if(activeIndex != sponsers.length-1){ activeIndex++; }
					else{ activeIndex = 0; }
				});
			},5000);
			return this;
		},
		
		rotateLogo: function(){
			
			$('.al-rotate').hover(function(){
				$(this).css('rotate','-3deg');
			},function(){
				$(this).css('rotate',0);
			});
			return this;
		},
		
		href: function(){
			
			$('[data-href]').css('cursor','pointer').live('click',function(){
				window.location.href = $(this).data('href');
			});
			
		},
		
		alignCarouselArrows: function(){
			$('.prev figure,.next figure').valign();
			return this;
		},
		
		resetForm: function(){
			$('input[type=text],textarea').val("");
			return this;
		},
		
		fixOutline: function(){
	
			// fixing the outline issue
			$('a').live('mousedown', function() { 	$(this).blur(); 	return false; 	})
				  .live('click', function() {  $(this).blur(); 	})
				  .live('focus', function() { 
						if ( $.browser.msie ) { 
							$(this).blur(); 
						} 
			});
			return this;
			
		},
		
		tweets: function(){
			
			var articles = $('#footer-twitter p'),
				articleLength = articles.length,
				
				generateLinks = function(){
					var replace,
						match,
						twitterSearch = "http://twitter.com/#!/search?q=";
					
					articles.each(function(){
						$(this).html(function(index, text){
	
							var matches = text.match(/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/gi);
							
							if(matches !== null){
								for( var i=0; i < matches.length; i++ ){
									
									match = matches[i];
									replace =  "<a href='"+ match  + "'>" + match + "</a>";
									text = text.replace(match,replace );							
								}
							}
							
							matches = text.match(/#[\w]+/gi);
							if(matches !== null){
								for( var i=0; i < matches.length; i++ ){
									match = matches[i];
									replace =  "<a href='"+ twitterSearch+ encodeURIComponent("#") + match.split("#")[1]  + "'>" + match + "</a>";
									text = text.replace(match,replace );							
								}
							}
							return text;
						});
					});
				}();
			
			function next( e ){
				e.preventDefault();
				$('#footer-twitter').find('p:visible').fadeOut(500,function(){
					var that = $(this);
					var $elem = ( articleLength - 1 == articles.index(that) ) ? articles.first() : that.next();
					$elem.fadeIn( 500 );
				});
			}
			
			function prev( e ){
				e.preventDefault();
				$('#footer-twitter').find('p:visible').fadeOut(500,function(){
					var that = $(this);
					var $elem = ( 0 == articles.index(that) ) ? articles.last() : that.prev();
					$elem.fadeIn( 500 );
				});				
			}
			
			$('#footer-twitter #footer-twitter-next').click( next );
			$('#footer-twitter #footer-twitter-prev').click( prev );
			return this;
			
		}
};




var footerContact = {
	
	enable: true,
	loadingMsg: $("<span class='loadingMsg'>Sending message please wait</span>"),
	successMsg: $("<span class='successMsg'>Your message has been sent</span>"),
	errorMsg: $("<span class='errorMsg'>Please try Again</span>"),
	$button: null,
	init: function(){
		this.$button = $("#contact-footer button");
		this.events();
	},
	
	events: function(){
		this.$button = $("#contact-footer button");
		this.$button.live('click', $.proxy(this,"submit") );
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
				if( data.SiteData.Contact_footerContact.success ){
					this.hideLoading();
					this.loadSucecssMsg();
					$form.find(':text,textarea').val('');
				}else{
					this.error();
				}
			},
			error: this.error,
			beforeSend: function(){
				this.disableForm();
				this.showLoading()
			}
		});
	},
	
	error: function(){
		
		this.hideLoading();
		this.loadErrorMsg()		
		
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
	
};/* </footerContact > */
