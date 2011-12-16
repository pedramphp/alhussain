<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:43:22
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/contactHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2356232644e476e8ab0d3b9-33072052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e4efe18c572d15b5601a1151cf5196c70f04cf' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/contactHeader.tpl.html',
      1 => 1312920915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2356232644e476e8ab0d3b9-33072052',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='contact-banner' class='inner-banner'>
			<figure class='ir' id='contact-banner-figure'></figure>
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