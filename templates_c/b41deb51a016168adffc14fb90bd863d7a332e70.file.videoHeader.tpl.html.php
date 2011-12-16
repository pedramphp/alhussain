<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:01:18
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/videoHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:16882014094e46d80e6986d4-12582719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b41deb51a016168adffc14fb90bd863d7a332e70' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/videoHeader.tpl.html',
      1 => 1312920896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16882014094e46d80e6986d4-12582719',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='video-banner' class='inner-banner'>
			<figure class='ir' id='video-banner-figure'></figure>
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
			<?php if ($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['singleVideo']==1){?>
			<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
video'><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</a><i></i>
			<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['video']['catUrl'];?>
'><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['video']['catTitle'];?>
</a><i></i>
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['video']['vTitle'];?>
</span>
			<?php }else{ ?>
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</span>
			<?php }?>
		</nav>