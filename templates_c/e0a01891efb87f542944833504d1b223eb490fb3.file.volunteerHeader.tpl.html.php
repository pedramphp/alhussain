<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:44:20
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/volunteerHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:17103093824e476ec4c2ad49-22201226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0a01891efb87f542944833504d1b223eb490fb3' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/volunteerHeader.tpl.html',
      1 => 1312920894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17103093824e476ec4c2ad49-22201226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='volunteer-banner' class='inner-banner'>
			<figure class='ir' id='volunteer-banner-figure'></figure>
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