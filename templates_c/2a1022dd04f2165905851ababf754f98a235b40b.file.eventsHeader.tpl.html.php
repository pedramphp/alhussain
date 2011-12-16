<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 05:15:08
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/eventsHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:12269890554e47921c3f8098-41111458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1022dd04f2165905851ababf754f98a235b40b' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/eventsHeader.tpl.html',
      1 => 1312920913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12269890554e47921c3f8098-41111458',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='events-banner' class='inner-banner'>
			<figure class='ir' id='events-banner-figure'></figure>
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