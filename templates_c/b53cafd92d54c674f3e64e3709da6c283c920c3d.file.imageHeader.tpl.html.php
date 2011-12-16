<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:00:37
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/imageHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2722103034e46d7e5cbb874-89552915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b53cafd92d54c674f3e64e3709da6c283c920c3d' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/imageHeader.tpl.html',
      1 => 1312920905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2722103034e46d7e5cbb874-89552915',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='image-banner' class='inner-banner'>
			<figure class='ir' id='image-banner-figure'></figure>
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
			<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
/imageGallery'><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</a><i></i>
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageList']['catName'];?>
</span>
		</nav>	