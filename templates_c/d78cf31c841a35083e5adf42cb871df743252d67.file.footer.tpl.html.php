<?php /* Smarty version Smarty-3.0.6, created on 2011-08-02 17:37:57
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al5/templates/includes/default/footer.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20331364454e386e3520bc60-94437544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd78cf31c841a35083e5adf42cb871df743252d67' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al5/templates/includes/default/footer.tpl.html',
      1 => 1312262638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20331364454e386e3520bc60-94437544',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<footer role='contentinfo' id='main-footer'>
		<div class='center-container relative'>
			<a href='javascript:void(0)' id='gotop' class='ir gotop'>go top</a>
				
			<section id='links-footer'  class='main-footer-section clearfix'>
				<section id='pages-footer'>
					<header>
						<figure> Pages	</figure>
					</header>
					<nav>
						<ul>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
homepage'><i></i>Home</a></li>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
volunteer'><i></i>Volunteers</a></li>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
newsHeader'><i></i>News</a></li>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
events'><i></i>Events</a></li>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
about'><i></i>About us</a></li>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
blogs'><i></i>Blog</a></li>
						</ul>
					</nav>					
				</section><!-- </pages-footer> -->
				<section id='latest-posts-footer'>
					<header>
						<figure> Latest posts</figure>
					</header>
					<nav>
						<ul>
							<li><a href='javascript:void(0)'><i></i>Coming soon</a></li>
						</ul>
					</nav>					
				</section><!-- </latest-posts-footer> -->
				<section id='events-footer'>
					<header>
						<figure> Upcoming events	</figure>
					</header>
					<nav>
						<ul>
							<li><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
events'><i></i>UMAA Convention</a></li>
						</ul>
					</nav>					
				</section><!-- </events-footer> -->
				<section id='favorite-footer'>
					<header>
						<figure> Favorite links	</figure>
					</header>
					<nav>
						<ul>
							<li><a href='http://imamhussein.tv/'><i></i>Imam Hussain TV</a></li>
							<li><a href='http://www.alanwar.tv/'><i></i>Al Anwar TV</a></li>
							<li><a href='http://www.zahratv.com/'><i></i>Zahra TV</a></li>
							<li><a href='http://ahlulbayt.tv/'><i></i>Ahlul Bayt TV</a></li>
						</ul>
					</nav>					
				</section><!-- </favorite-footer> -->
			</section><!-- </links-footer> -->
			
			<section id='books-footer' class='main-footer-section'>
				<header>
					<figure> Books we recommend	</figure>
				</header>
				<div class='carousel-big carousel clearfix'>
					<a href='javascript:void(0)' class='prev links' ><figure class='ir'>previous books</figure></a>
					<nav>
						<ul class='horizontal 	clearfix'>
							<?php  $_smarty_tpl->tpl_vars['book'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['book']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['book']->iteration=0;
if ($_smarty_tpl->tpl_vars['book']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['book']->key => $_smarty_tpl->tpl_vars['book']->value){
 $_smarty_tpl->tpl_vars['book']->iteration++;
 $_smarty_tpl->tpl_vars['book']->last = $_smarty_tpl->tpl_vars['book']->iteration === $_smarty_tpl->tpl_vars['book']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['last'] = $_smarty_tpl->tpl_vars['book']->last;
?>
							<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['last']){?>class='last'<?php }?>>
								<a href='<?php echo $_smarty_tpl->tpl_vars['book']->value['url'];?>
' target='_blank' class='books-shadow'>
								 	
									<figure>
										<img src='<?php echo $_smarty_tpl->tpl_vars['book']->value['image'];?>
' alt='<?php echo $_smarty_tpl->tpl_vars['book']->value['title'];?>
' />
									</figure>
								</a>
								<dl>

									<dt class='title'><a href='<?php echo $_smarty_tpl->tpl_vars['book']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value['title'];?>
</a></dt>
									<dd class='author'>by <?php echo $_smarty_tpl->tpl_vars['book']->value['author'];?>
</dd>
									<dd class='rating'></dd>
								</dl>
							</li>
							<?php }} ?>
						</ul>
					</nav>
					<a href='javascript:void(0)' class='next links' ><figure class='ir'>next books</figure></a>
				</div>
			</section> <!-- </books-footer> -->
			
			<section class='main-footer-section clearfix'>
				<section id='social-footer'>
					<header>
						<figure>Social Networks</figure>
					</header>			
					<ul id='footer-fb-rss'>
						<li id='footer-fb-icon' class='clearfix'>
							<figure></figure>
							<span>Join us in facebook</span>
							<span>Share us with your friends</span>						
						</li>
						<li id='footer-rss-icon' class='clearfix'>
							<figure></figure>
							<span>RSS Feed</span>
							<span>Subscribe now to recieve newsletters</span>
						</li>
						<li id='footer-newsletter' class='clearfix'>
							<form class='form-newsletter'>
								<input type='text' class='txt floatLeft blockBox' autocomplete='on' name='subscribeEmail' />
								<button class='floatRight blockBox'>Submit</button>
							</form>
						</li>
					</ul>
					<section id='footer-twitter' data-borderRadius='5'>
						<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['title'];?>
' id='footer-twitter-link' >Latest tweets</a>
						<a href='javascript:void(0)' id='footer-twitter-icon' class='ir'>Anwar Al-Hussain Tweets</a>
						<a href='javascript:void(0)' id='footer-twitter-next' class='ir'>Next tweet</a>
						<a href='javascript:void(0)' id='footer-twitter-prev' class='ir'>Previous tweet</a>
					  <?php  $_smarty_tpl->tpl_vars['tweet'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['tweets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->key => $_smarty_tpl->tpl_vars['tweet']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tweet']->key;
?>
					  	<p <?php if ($_smarty_tpl->tpl_vars['key']->value!=0){?> style="display:none;"<?php }?> itemprop="tweet"><?php echo $_smarty_tpl->tpl_vars['tweet']->value;?>
</p>
					  <?php }} ?>
					</section> <!-- </footer-twitter> -->
					<p class='clearBoth'>You can donate to Anwar Al-Hussain in order to support the Muslim community. Al-Hussian TV's mission is to make better social environment for all Muslims by it's TV Channel and website.</p>
					<p>Donate to Anwar Al-Hussain now and support the Muslim community.</p>
					<figure id='footer-donate-paypal'></figure>
					<figure id='footer-donate-creditcard'></figure>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="WSEBNYA436Z4E">
						<button id='footer-donate-button' alt="PayPal - The safer, easier way to pay online!" class='donate-button'>Donate Now</button>
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</section> <!-- </social-footer> -->
				<aside id='contact-footer'>
					<header>
						<figure>Contact us</figure>
					</header>
					<form  class='clearfix'>
						<label for='footer-fullname' >Full name</label>
						<input type='text' class='txt' id='footer-fullname' name='footerFullname' autocomplete='on' />
						<label for='footer-fullname' >Email</label>
						<input type='text' class='txt' id='footer-email'  name='footerEmail' autocomplete='on'  />
						<textarea  name='footerMessage'></textarea>
						<button>Send</button>
					</form>
					<ul id='footer-contact-detail' class='clearfix'>
						<li class='clearfix'>
							<a href='maito:info@alhussaintv.tv' id='footer-info'>info@alhussaintv.tv </a>
						</li>
						<li id='footer-tel'>1-202-642-5157</li>
					</ul>
				</aside> <!-- </contact-footer> -->
			</section><!-- </social,contact,donation> -->
			<section id="sponsers-footer" class='main-footer-section'>
				<header>
					<figure>Our Sponsors	</figure>
				</header>
				<div class='carousel-big carousel clearfix'>
					<a href='javascript:void(0)' class='prev links' ><figure class='ir'>previous sponser</figure></a>
					<nav>
						<ul class='clearfix horizontal'>
							<li><h2><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'>Imam Shirazi World Foundation</a></h2></li>
							<li><h2><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'>Imam Ali (A.S) Center Springfield VA</a></h2></li>
							<li><h2><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'>Prestige Productionz Washington DC</a></h2></li>
							<li><h2><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'>Kabob Factory Lorton VA</a></h2></li>
						</ul>
					</nav>	
					<a href='javascript:void(0)' class='next links' ><figure class='ir'>next sponser</figure></a>
				</div>
			</section> <!-- </sponsers> -->
		</div> <!-- </main-footer div> -->
	</footer>
	<section id='copyright'>
		<ul id='copyright-inner' class='center-container horizontal clearfix'>
			<li id='copyright-inner-left'>
				<figure class='ir'>Alhussain Logo</figure>
				<p itemscope>Copyright &copy; 2011 Anwar Al-Hussain TV All rights reserved. 
					<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
terms'>Terms of use</a>|
					<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
privacy'>Privacy policy</a>
					<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
about'>About Al-Hussain TV</a>|
					<a itemprop='url' href='javascript:void(0)'>RSS Feed</a>|
					<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
faq'>FAQ</a>|
					<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
contact'>Contact us</a> 
				</p>
			</li> 
			<li id='copyright-inner-right'>
				<address itemscope itemtype='http://data-vocabulary.org/Organization'>
					<span id='developed'>Developed by</span> 
					<a href='http://mexo.co' class='blockBox' itemprop='url' >
						<figure class='al-rotate'>
							<figcaption class='ir'>Mexo is a Web programming and development company</figcaption>
						</figure>
					</a>
					<span class='blockBox'>Web programming and development</span>
				</address>
			</li>
		</ul>
	</section> <!-- </copyright> -->
	<script type="text/javascript">
	var clicky_site_ids = clicky_site_ids || [];
	clicky_site_ids.push(66435237);
	(function() {
	  var s = document.createElement('script');
	  s.type = 'text/javascript';
	  s.async = true;
	  s.src = '//static.getclicky.com/js';
	  ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
	})();
	</script>
	<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/66435237ns.gif" /></p></noscript>