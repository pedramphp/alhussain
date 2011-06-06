<?php 
/*
 *  Source http://net.tutsplus.com/tutorials/php/creating-a-twitter-oauth-application/
	
		@Anywhere Settings
		@Anywhere is easy to deploy. You only need an API key and registered callback URL.
		API key K1r546eXg4AtuczIIpmOAg
		Registered Callback URL
		http://alhussaintv.tv
		The @Anywhere callback URL's domain & subdomain must match the location of @Anywhere integrations on your site. 
		You can authorize additional domains if you need to integrate with more than one site.
		OAuth 1.0a Settings
		OAuth 1.0a integrations require more work.
		Consumer key K1r546eXg4AtuczIIpmOAg
		Consumer secret prsRXe5twPAq6mPwiYPUXevhqIfXtGXX7oReMndl9c
		Request token URL
		https://api.twitter.com/oauth/request_token
		Access token URL
		https://api.twitter.com/oauth/access_token
		Authorize URL
		https://api.twitter.com/oauth/authorize
		We support hmac-sha1 signatures. We do not support the plaintext signature method.
		Registered OAuth Callback URL
		http://alhussaintv.tv
	
 */
	require_once(LiteFrame::GetFileSystemPath()."includes/modules/twitter/tmhOAuth.php");
	require_once(LiteFrame::GetFileSystemPath()."includes/modules/twitter/TwitterApp.php");
	require_once(LiteFrame::GetFileSystemPath()."includes/modules/twitter/TwitterAvatars.php");

	// set the consumer key and secret . follow nettuts tutorial to get these information
	define('CONSUMER_KEY',      'K1r546eXg4AtuczIIpmOAg');
	define('CONSUMER_SECRET',   'prsRXe5twPAq6mPwiYPUXevhqIfXtGXX7oReMndl9c');	
	
	/* I got all these four variables by doing $twitterApp->auth the first time.
	 * then you have to get all the following variables by printing session and cookie vars
	 * turn off the auth for getting you keys
	 * */
	
	
	define('AUTH_TOKEN','UCbVOfJ3F0wKk65Ao8TnSG3VtCTSGwigmc15ws198');
	define('AUTH_SECRET','5LNdVtibggcfqJ6kkncvCwmy6zE3aoGWDlwyOvf9O4U');
	define('ACCESS_TOKEN','288960663-UGJPZuwfg9TYcvAezQNTbTVRaoxCZBqLF9hyNPVH');
	define('ACCESS_TOKEN_SECRET','4CQiWmnu2mcMUh12y8Ckfs5D6kWH8TtlN5roXgI');
	
	class Tweets extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$tweet = array('no tweet found');
		    $config = array(  
		         'consumer_key'      => CONSUMER_KEY,  
		        'consumer_secret'   => CONSUMER_SECRET  
		    );  
			if(!session_id()) {	session_start();	}
			
			// Sessions should be off for the first time running 
			
			$_SESSION['authtoken'] = AUTH_TOKEN;
			$_SESSION['authsecret'] = AUTH_SECRET;
			$_SESSION['authstate'] = 2;
			$_SESSION['access_token'] = ACCESS_TOKEN;
			$_SESSION['access_token_secret'] = ACCESS_TOKEN_SECRET;
			
			//print_r($_SESSION);
			//print_r($_COOKIE);
			
			$twitterApp = new TwitterApp(new tmhOAuth($config));
			
			
			// you need to call $twitterApp->auth to authorize it first with your browser
			
			if($twitterApp->isAuthed()){
				$tweet = array();
				foreach( $twitterApp->retrieveTweets() as $row){
					$tweet[] = $row->text;
				}
			}else{
				$twitterApp->auth();
			}
			$this->results = array_slice($tweet, 0, 20);	
			
		}
	}


?>