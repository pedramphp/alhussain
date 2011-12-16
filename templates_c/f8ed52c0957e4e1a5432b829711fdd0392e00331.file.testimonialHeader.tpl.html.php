<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:43:16
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/testimonialHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19979718424e476e84f17a54-32427528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8ed52c0957e4e1a5432b829711fdd0392e00331' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/testimonialHeader.tpl.html',
      1 => 1312920898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19979718424e476e84f17a54-32427528',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='testimonial-banner' class='inner-banner'>
			<figure class='ir' id='testimonial-banner-figure'></figure>
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