<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 23:17:14
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/termsHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:8738804214e473e3acf07f1-73958610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1752d7205b2e5e2e4d8856122beb337ca29e0e9' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/termsHeader.tpl.html',
      1 => 1312920900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8738804214e473e3acf07f1-73958610',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='terms-banner' class='inner-banner'>
			<figure class='ir' id='terms-banner-figure'></figure>
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