<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 00:13:16
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/video.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:7897004e474b5cc1c1b7-82611773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b309f500a33cec850911b986ff342ace5a92f99' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/video.tpl.html',
      1 => 1312605685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7897004e474b5cc1c1b7-82611773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><?php $_smarty_tpl->tpl_vars['video'] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['video'], null, null);?>

<h2><?php echo $_smarty_tpl->getVariable('video')->value['vTitle'];?>
</h2>
<p>
<section id='video-player-frame'>
		<div>
			<iframe src="<?php echo $_smarty_tpl->getVariable('video')->value['videoUrl'];?>
" width="847" height="396" frameborder="0"></iframe>
		</div>
</section>

<section id='comment-section'>
	<div style='margin-bottom:50px;'>
		<p style='font-size:17px;'><?php echo $_smarty_tpl->getVariable('video')->value['vDesc'];?>
</p>
	</div>
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php echo $_smarty_tpl->getVariable('pagePath')->value;?>
" num_posts="20" width="550"></fb:comments>
</section>
<aside id='video-sidebar'>
	<div id='latest-video' data-borderradius="5" class='video-sidebox newest'>
		<header class='sidebarBoxHeader'>
			<a href='javascript:void(0)'>
				<figure>Latest videos</figure>
				<i></i>
			</a>
		</header>
		<?php  $_smarty_tpl->tpl_vars['latestVideo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['latestVideos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['latestVideo']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['latestVideo']->iteration=0;
 $_smarty_tpl->tpl_vars['latestVideo']->index=-1;
if ($_smarty_tpl->tpl_vars['latestVideo']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['latestVideo']->key => $_smarty_tpl->tpl_vars['latestVideo']->value){
 $_smarty_tpl->tpl_vars['latestVideo']->iteration++;
 $_smarty_tpl->tpl_vars['latestVideo']->index++;
 $_smarty_tpl->tpl_vars['latestVideo']->first = $_smarty_tpl->tpl_vars['latestVideo']->index === 0;
 $_smarty_tpl->tpl_vars['latestVideo']->last = $_smarty_tpl->tpl_vars['latestVideo']->iteration === $_smarty_tpl->tpl_vars['latestVideo']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['latestVideo']['first'] = $_smarty_tpl->tpl_vars['latestVideo']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['latestVideo']['last'] = $_smarty_tpl->tpl_vars['latestVideo']->last;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['latestVideo']['first']){?>
		<ul>
		<?php }?>
		<li>
			<a href='<?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['vUrl'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['vDesc'];?>
'>
				<figure><img src='<?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['vThumbUrl'];?>
' alt='<?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['vTitle'];?>
'></figure>
				<div class='video-info'>
					<h2><?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['vTitle'];?>
</h2>
					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['latestVideo']->value['vDesc'],60,"...");?>
</p>
					<span style='color:#888888'>(<?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['duration'];?>
) -  <?php echo $_smarty_tpl->tpl_vars['latestVideo']->value['plays'];?>
 views</span>
				</div>
			</a>
		</li>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['latestVideo']['last']){?>
		</ul>
		<?php }?>
		<?php }} ?>
	</div>
</aside>