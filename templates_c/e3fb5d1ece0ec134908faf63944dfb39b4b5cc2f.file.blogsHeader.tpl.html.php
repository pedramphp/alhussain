<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:22:53
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/blogsHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:5939005004e46dd1db30bd9-39627242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3fb5d1ece0ec134908faf63944dfb39b4b5cc2f' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/blogsHeader.tpl.html',
      1 => 1312920918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5939005004e46dd1db30bd9-39627242',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='blog-banner' class='inner-banner'>
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
			<span><?php echo $_smarty_tpl->getVariable('SiteData')->value['bannerTitles']['title'];?>
</span>
		</nav>