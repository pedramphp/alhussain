<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 05:15:19
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/faqHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14161287924e479227001016-08916663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd0acfaa08e5f854f58811a7193ebde114cd17bb' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/faqHeader.tpl.html',
      1 => 1312920911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14161287924e479227001016-08916663',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='faq-banner' class='inner-banner'>
			<figure class='ir' id='faq-banner-figure'></figure>
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
</span
		</nav>