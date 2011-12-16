<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 05:15:31
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/newsListHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19855038764e4792334acd75-37885943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19ac7b803dede8b65a511a5cf8caef6a30cf505' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/newsListHeader.tpl.html',
      1 => 1312920903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19855038764e4792334acd75-37885943',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='news-banner' class='inner-banner'>
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
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</span>
		</nav>