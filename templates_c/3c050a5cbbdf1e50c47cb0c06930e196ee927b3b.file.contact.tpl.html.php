<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:43:22
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/contact.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15164385364e476e8ac17711-36829930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c050a5cbbdf1e50c47cb0c06930e196ee927b3b' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/contact.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15164385364e476e8ac17711-36829930',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='contact-intro'>
			You can contact us directly via Twitter or Facebook. Alternatively you can use the form below and we will get in touch with you within 24hours.
			<ul class='clearfix'>
				<li class='emailAddr'><a href='mailto:info@alhussaintv.tv'>info@alhussaintv.tv</a></li>
				<li class='telNumber'>1-202-642-5157</li>
			</ul>
		</section>
		<section id='contact-content'>
			<section>
				<header class='innerPageTitle'>
					<figure id='contact-icon'>Contact us</figure>
				</header>
				<form id='contact-form' class='form'>
					<table>
						<tr id='fullName'>
							<td><label>Full name</label></td>
							<td><input type='text' class='txt' name='contactFullname' /></td>
						</tr>
						<tr id='email'>
							<td><label>Email</label></td>
							<td><input type='text' class='txt' name='contactEmail'/></td>
						</tr>
						<tr id='phoneNumber'>
							<td><label>Phone number</label></td>
							<td><input type='text' class='txt'  name='contactTel' /></td>
						</tr>
						<tr id='website'>
							<td><label>Website <span>(optional)</span></label></td>
							<td><input type='text' class='txt' name='contactWeb' /></td>
						</tr>
						<tr id='question'>
							<td><label>How do you rate our site?</label></td>
							<td><input type='text' class='txt' name='contactQuestion'  /></td>
						</tr>
						<tr>
							<td><label>Nature of your email</label></td>
							<td>
								<select name='contactReason' >
									<option> Compliment </option>
									<option> Donation </option>
									<option> Writing </option>
									<option> Specific Question </option>
									<option> Advice </option>
									<option> Other </option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Message</label></td>
							<td>
								<textarea name='contactMessage'>What's in your mind?</textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan='2'><button>Submit</button></td>
						</tr>
					</table>
				</form>
			</section>
			<section>
				<header class='innerPageTitle'>
					<figure id='facebook-icon'>Find us in facebook</figure>
				</header>
				<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAnwar-Al-Hussain-Guidance-for-Revival%2F160722923969793&amp;width=550&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=292" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:292px;" allowTransparency="true"></iframe>
			
			</section>
		</section>
		<aside id='contact-sidebar'>
			<section id='contact-twitter'>
				<div class='tweetAutoFader'>
					<figure id='contact-twitter-icon' class='ir'>Alhussain Tweets</figure>
					<figure id='contact-twitter-bird' class='ir'>Alhussain Tweets</figure>
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
					  <a id='contact-twitter-link' href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['title'];?>
'>Follow us on Twitter</a>
				</div>
			</section>
			<hr/>
			<section id='contact-map'>
				<a id='contact-map-link' href='http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=7900+Backlick+Rd+Springfield+VA,USA&sll=38.742904,-77.188439&sspn=0.009372,0.022488&ie=UTF8&hq=&hnear=7900+Backlick+Rd,+Springfield,+Virginia+22150&ll=38.743741,-77.190692&spn=0.009372,0.022488&t=h&z=16'>(Find us on google map)</a>
				<figure>
					<div id="map_canvas" style="width:380px; height:280px"></div>
					<figcaption>7900 Backlick Rd Springfield VA,USA</figcaption>
				</figure>
				<map name='alhussain-map'>
					<area shape='circle' title='Click to find our place on google map' coords='160,94,20,30' href='javascript:void(0)' alt='Alhussain place' />
				</map>
			</section>
			<hr/>
			<section id='contact-vcard'>
				<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
files/vcard/vCard.zip' target='_blank'><img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
contact/vcard.png' alt='Alhussain vCard' /></a>
			</section>
			<hr/>
			<section id='contact-donation' class='clearfix'>
				<figure class='ir' id='donation-paypal-icon'>Paypal</figure>
				<figure class='ir' id='donation-banks-icon'>Credit Card Companies</figure>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="WSEBNYA436Z4E">
						<button id='contact-donate-button' alt="PayPal - The safer, easier way to pay online!" class='donate-button'>Donate to Alhussain TV Now</button>
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</section>
			<hr/>
			<section id='contact-rss'>
				<figure class='ir' id='contact-rss-icon'>RSS</figure>
				<form class='form-newsletter'>
					<input type='text' class='txt' autocomplete='on' name='subscribeEmail'  />
					<button>Submit</button>
				</form>
			</section>
		</aside>