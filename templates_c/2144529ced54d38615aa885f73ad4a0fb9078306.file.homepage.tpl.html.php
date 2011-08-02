<?php /* Smarty version Smarty-3.0.6, created on 2011-08-02 17:38:02
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al5/templates/actions/default/homepage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:12378070164e386e3a5756b7-92436001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2144529ced54d38615aa885f73ad4a0fb9078306' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al5/templates/actions/default/homepage.tpl.html',
      1 => 1312262638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12378070164e386e3a5756b7-92436001',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			<header id='welcome-note'>
			<h1>
				<p>
					<b>W</b>elcome to Anwar Al-Hussain Official TV Channel Website .The aim of Anwar Al-Hussain is to educate both Muslims and non-Muslims about the true Message of Islam and to eradicate all misconceptions about Islam and Muslims.
				</p>
				<p>
					We seek to accomplish this by presenting Islam from the two divinely protected sources, the Holy Quran and the Pure Ahlul Bayte of Prophet Mohammed (s).
				</p>
				<p>
					Our aim is to also bring guidance to young Muslims on how to live Islamically in the West and how to integrate into Western society without compromising our Islamic morals and values.
				</p>				
			</h1>
		</header>
		<section id='homepage-left'>
			<section id='homepage-videos' class='relative'>
				<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
video' class='more'><figure>See all Videos<figcaption></figcaption></figure><i></i></a>
				<header class='homepage-box-header'>
					<figure>Latest Videos</figure>
					<i></i>
				</header>
				<div class='carousel-small carousel clearfix'>
					<a href='javascript:void(0)' class='prev links' ><figure class='ir'>previous video</figure></a>
					<nav>
						<ul class='horizontal clearfix'>
							<?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['homepage']['videoThumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
							<li>
								<a href='<?php echo $_smarty_tpl->tpl_vars['video']->value['original'];?>
'>
									<figure>
										<img src='<?php echo $_smarty_tpl->tpl_vars['video']->value['thumb'];?>
' />
										<figcaption class='ir'></figcaption>
									</figure>
								</a>
							</li>							
							<?php }} ?>
						</ul>
					</nav>
					<a href='javascript:void(0)' class='next links' ><figure class='ir'>next video</figure></a>
				</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section> <!-- </homepage-videos> -->
			
			<section  id='homepage-posts' class='relative'>
				<header class='homepage-box-header'>
					<figure>Latest News</figure>
					<i></i>
				</header>		
				<?php if (count($_smarty_tpl->getVariable('SiteData')->value['homepage']['news'])==0){?>
					<div style='height:265px;'><h1 style="margin:20px 0; height: 269px; line-height: 269px;text-align:center; font-size: 28px;text-shadow: 3px 8px 14px #333333">Coming Soon</h1>
					</div>
				<?php }else{ ?>
				<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
newsList' class='more'><figure>More News<figcaption></figcaption></figure><i></i></a>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['homepage']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['news']->key;
?>
					<li>
						<article>
							<header>
								<h2><a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
'><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a></h2>
								<figure><img src='<?php echo $_smarty_tpl->tpl_vars['news']->value['image'];?>
' /></figure>
							</header>
							<p>	<?php echo $_smarty_tpl->tpl_vars['news']->value['shortDescription'];?>
	
							...<a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
'>more</a>
							</p>
						</article>
					</li>			
					<?php }} ?>			
				</ul>
				<?php }?>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section> 
			
			<section id='homepage-images' class='relative'>
				<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
imageGallery' class='more'>
					<figure>See all images<figcaption></figcaption></figure><i></i>
				</a>
				<header class='homepage-box-header'>
					<figure>Latest Images</figure>
					<i></i>
				</header>
				<div class='carousel-small carousel clearfix'>
					<a href='javascript:void(0)' class='prev links' ><figure class='ir'>previous image</figure></a>
					<nav>
						<ul class='horizontal clearfix'>
							<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['homepage']['imageThumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->first = $_smarty_tpl->tpl_vars['image']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['first'] = $_smarty_tpl->tpl_vars['image']->first;
?>
							<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['first']){?>class=='last'<?php }?>>
								<a href='<?php echo $_smarty_tpl->tpl_vars['image']->value['original'];?>
' class='largeImage' rel="myImage">
									<figure>
										<img src='<?php echo $_smarty_tpl->tpl_vars['image']->value['thumb'];?>
' width='176' height='110' />
										<figcaption class='ir'></figcaption>
									</figure>
								</a>
							</li>
							<?php }} ?>
						</ul>
					</nav>
					<a href='javascript:void(0)' class='next links' ><figure class='ir'>next image</figure></a>
				</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section> <!-- </homepage-images> -->
			
		</section> <!-- </homepage-boxes > -->
		<aside id='homepage-sidebar'>			
			<section id='donation-sidebar'>
				<header class='homepage-box-header'>
					<figure>Donate</figure>
					<i></i>
				</header>
				<div class='clearfix'>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="WSEBNYA436Z4E">
						<button id='sidebar-donate-button' alt="PayPal - The safer, easier way to pay online!" class='donate-button'>Donate to Alhussain TV</button>
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
					<figure id='sidebar-donate-paypal'></figure>
					<figure id='sidebar-donate-creditcard'></figure>
				</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section><!-- </donation-sidebar> -->
			<header id='volunteerHeader'>
				<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
volunteer' id='volunteer-sidebar'>
					<figure></figure>
				</a>		
			</header>
			<!-- 
			<section id='vote-sidebar'>
				<header class='homepage-box-header'>
					<figure>Voting</figure>
					<i></i>
				</header>
				<div>
				
				</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section>
			 -->
			 <section id='facebook-sidebar'>
				<header class='homepage-box-header'>
					<figure>Find us in facebook</figure>
					<i></i>
				</header>
				<div id='fb-container'>
					<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAnwar-Al-Hussain-Guidance-for-Revival%2F160722923969793&amp;width=250&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=262" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:262px;" allowTransparency="true"></iframe>
			 	</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section><!-- </facebook-sidebar> -->
			<section id='tweet-sidebar'>
				<header class='homepage-box-header'>
					<figure>Latest Tweets</figure>
					<i></i>
				</header>
				<div id='tweet-sidebar-box' class='tweetAutoFader'>
					<section>
						<i></i>
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
					</section>
					<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['title'];?>
' id='tweet-sidebar-icon'>Follow us on Twitter</a>
				</div>
				<footer class='homepage-box-footer'><figure></figure></footer>
			</section><!-- </tweet-sidebar> -->
			
		</aside> <!-- </ homepage-sidebar > -->
