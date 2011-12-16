<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:43:11
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/aboutHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14702775494e476e7fe4fbc4-66350283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '970a94e87e8fc761664c339cf5a9696e0e7a293d' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/aboutHeader.tpl.html',
      1 => 1312920921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14702775494e476e7fe4fbc4-66350283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='about-banner' class='inner-banner'>
			<figure class='ir' id='about-banner-figure'></figure>
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