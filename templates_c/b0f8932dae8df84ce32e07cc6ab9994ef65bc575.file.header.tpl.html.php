<?php /* Smarty version Smarty-3.0.6, created on 2011-08-02 17:37:57
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al5/templates/includes/default/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19651418754e386e350759a5-29985690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0f8932dae8df84ce32e07cc6ab9994ef65bc575' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al5/templates/includes/default/header.tpl.html',
      1 => 1312262638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19651418754e386e350759a5-29985690',
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
			<li id='header-rss'><a href='javascript:void(0)'>RSS<small>subscribe</small></a></li>
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
			<h1 class='floatLeft'><small>Our</small>Sponsors</h1>
			<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
sponsors'><span class='floatLeft blockBox'>Imam Shirazi World Foundation</span></a>
		</div>
		<div class='clearBoth'></div>
		<nav id='main-nav' class='horizontal'>
            <ul class='clearfix'>
                <li id='nav-home' class='first'><div><a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
'><span>Home</span><i class="corner"></i></a></div></li>
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