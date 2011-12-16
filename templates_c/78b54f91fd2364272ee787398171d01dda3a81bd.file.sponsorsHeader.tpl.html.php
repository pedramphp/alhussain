<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 15:44:49
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/sponsorsHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14462052064e46d431cb5960-69991536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b54f91fd2364272ee787398171d01dda3a81bd' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/sponsorsHeader.tpl.html',
      1 => 1312920901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14462052064e46d431cb5960-69991536',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='sponsors-banner' class='inner-banner'>
			<figure class='ir' id='sponsors-banner-figure'></figure>
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