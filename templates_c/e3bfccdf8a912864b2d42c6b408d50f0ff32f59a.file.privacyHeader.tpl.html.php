<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 06:50:08
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/privacyHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19758983754e48f9e07c0b77-22434119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3bfccdf8a912864b2d42c6b408d50f0ff32f59a' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/privacyHeader.tpl.html',
      1 => 1312920902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19758983754e48f9e07c0b77-22434119',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='privacy-banner' class='inner-banner'>
			<figure class='ir' id='privacy-banner-figure'></figure>
			<hgroup>
				<h2><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</h2>
				<p><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['subTitle'];?>
&nbsp;</p>
			</hgroup>
		</section>
		<nav id='breadcrumb'>
			<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
homepage'>Home</a><i></i>
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</span>
		</nav>