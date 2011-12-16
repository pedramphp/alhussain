<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:33:17
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/newsHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:11650790774e46df8d985691-20263495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '222439a047d0b912fd27a97b6b63d8266b7e8214' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/newsHeader.tpl.html',
      1 => 1312920904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11650790774e46df8d985691-20263495',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?>		<section id='news-banner' class='inner-banner'>
			<figure class='ir' id='news-banner-figure'></figure>
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
newsList'><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</a><i></i>
			<span><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('SiteData')->value['news']['record']['title'],50,"...");?>
</span>
		</nav>