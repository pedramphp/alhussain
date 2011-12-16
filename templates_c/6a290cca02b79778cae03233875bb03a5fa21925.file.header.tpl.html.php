<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 15:44:49
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:21118404304e46d431b882e6-02978038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a290cca02b79778cae03233875bb03a5fa21925' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/header.tpl.html',
      1 => 1312922588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21118404304e46d431b882e6-02978038',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<header role='banner' id='main-header' class='center-container clearfix'>
		<hgroup itemref='content-info' itemscope itemtype='http://microformats.org/profile/hcard'>
			<h1 itemprop='fn org'>
				<a itemprop='url' href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
' id='logo'  >
					<figure <?php if ($_smarty_tpl->getVariable('action')->value=='homepage'){?>class='invisible'<?php }?>>
						<img itemprop='logo' alt='Alhussain TV' src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
layout/al-hussain-logo.png' />
						<figcaption class='ir'>Anwar Al-Hussain TV - Official Logo</figcaption>
					</figure>
					<figure id='logoText' <?php if ($_smarty_tpl->getVariable('action')->value=='homepage'){?>class='invisible'<?php }?>>
						<figcaption class='ir'>Anwar Al-Hussain TV - Guidance for revival</figcaption>
					</figure>
				</a>
			</h1>
		</hgroup>
		<ul class='horizontal' id='header-social'>
			<li id='header-rss'><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
feed'>RSS<small>subscribe</small></a></li>
			<li id='header-twitter'><a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['title'];?>
'>Follow us<small>on Twitter</small></a></li>
			<li id='header-facebook'><a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['facebook']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['facebook']['title'];?>
'>Join us<small>on Facebook</small></a></li>
			<li id='header-youtube' class='last'><a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['youtube']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['youtube']['title'];?>
'>Watch us<small>on YouTube</small></a></li>
		</ul>
		<div id='header-sponser'>
			<h1 data-href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors' class='floatLeft'><small>Our</small>Sponsors</h1>
			<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'><span class='floatLeft blockBox'>Imam Shirazi World Foundation</span></a>
		</div>
		<div class='clearBoth'></div>
		<nav id='main-nav' class='horizontal'>
            <ul class='clearfix'>
                <li id='nav-home' class='first'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
homepage'><span>Home</span><i class="corner"></i></a></div></li>
                <li id='nav-news'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
newsList'><span>News</span><i class="corner"></i></a></div></li>
                <li id='nav-image'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
imageGallery'><span>Image Gallery</span><i class="corner"></i></a></div></li>
                <li id='nav-video'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
video'><span>Video Gallery</span><i class="corner"></i></a></div></li>
                <li id='nav-events'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
events'><span>Events</span><i class="corner"></i></a></div></li>
                <li id='nav-about' class='relative'>
                	<div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
about'><span>About us</span><i class="corner"></i></a></div>
              		<ul id='navAboutDetail'>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
faq">FAQ</a></li>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
testimonial">Comments</a></li>
					</ul>
                </li>
                <li id='nav-blog'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
blogs'><span>Blog</span><i class="corner"></i></a></div></li>
                <li id='nav-contact' class='last'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
contact'><span>Contact us</span><i class="corner"></i></a></div></li>
            </ul>
        </nav>
		<?php $_template = new Smarty_Internal_Template((($_smarty_tpl->getVariable('includeTemplate')->value).($_smarty_tpl->getVariable('action')->value)).("Header.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</header>