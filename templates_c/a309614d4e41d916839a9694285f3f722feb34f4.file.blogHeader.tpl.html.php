<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:25
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/blogHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15054497944e46dd791da509-65706961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a309614d4e41d916839a9694285f3f722feb34f4' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/blogHeader.tpl.html',
      1 => 1312920920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15054497944e46dd791da509-65706961',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?>		<section id='blog-banner' class='inner-banner'>
			<figure class='ir' id='blog-banner-figure'></figure>
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
blogs'><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</a><i></i>
			<span><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('SiteData')->value['blog']['record']['title'],50,"...");?>
</span>
		</nav>