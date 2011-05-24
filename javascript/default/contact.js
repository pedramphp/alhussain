$(document).ready(function(){
	
	contact.init();
	
});

var contact = {
	
	enable: true,
	loadingMsg: $("<span class='loadingMsg'>Sending message please wait</span>"),
	successMsg: $("<span class='successMsg'>Your message has been successfully sent</span>"),
	errorMsg: $("<span class='errorMsg'>Message was not sent, Please try Again</span>"),
	$button: $("#contact-form button"),
	init: function(){
		this.events();
	},
	
	events: function(){
		$("#contact-form button").click( $.proxy(this,"submit") );
	},
	
	submit: function(event){
		event.preventDefault();
		if( !this.enable ){ return }
		var buttonTd = $(event.currentTarget).parent(),
			$form = $(event.currentTarget).parents("form");
		
		$_LITE_.jsonRPC({
			scope: this, 
			api: 'Contact',
			method: 'contactUs',
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
		this.$button.parent().append( this.loadingMsg.clone() );
	},
	
	hideLoading: function(){
		this.$button.next().remove();
	},
	
	loadSucecssMsg: function(){
		var $successMsg = this.successMsg.clone();
		this.$button.parent().append( $successMsg );
		$successMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
			$successMsg.remove();
			this.enableForm();
		},this));
	},
	
	loadErrorMsg: function(){
		var $errorMsg = this.errorMsg.clone();
		this.$button.parent().append( $errorMsg );
		$errorMsg.fadeIn(500).delay('3000').fadeOut(500,$.proxy(function(){
			$errorMsg.remove();
			this.enableForm();
		},this));		
	}
};