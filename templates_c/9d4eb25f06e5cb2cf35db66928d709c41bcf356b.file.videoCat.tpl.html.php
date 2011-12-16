<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:01:18
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/videoCat.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:11743107154e46d80e854845-26726853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d4eb25f06e5cb2cf35db66928d709c41bcf356b' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/videoCat.tpl.html',
      1 => 1312605685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11743107154e46d80e854845-26726853',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><?php $_smarty_tpl->tpl_vars['vCats'] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['categories'], null, null);?>
<?php $_smarty_tpl->tpl_vars['activeCat'] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['activeCategory'], null, null);?>
<aside id='video-categories'>
	<header class="innerPageTitle no-icon">
		<figure>Video categories</figure>
	</header>
	<nav>
		<?php  $_smarty_tpl->tpl_vars['vCat'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('vCats')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vCat']->key => $_smarty_tpl->tpl_vars['vCat']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vCat']->key;
?>
			<a href='javascript:void(0)' title='<?php echo $_smarty_tpl->tpl_vars['vCat']->value['catTitle'];?>
' class='cat-title<?php if (isset($_smarty_tpl->tpl_vars['vCat']->value['active'])){?> clicked<?php }?>'><?php echo $_smarty_tpl->tpl_vars['vCat']->value['catTitle'];?>
</a>
			<?php  $_smarty_tpl->tpl_vars['catVideo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vCat']->value['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['catVideo']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['catVideo']->iteration=0;
 $_smarty_tpl->tpl_vars['catVideo']->index=-1;
if ($_smarty_tpl->tpl_vars['catVideo']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['catVideo']->key => $_smarty_tpl->tpl_vars['catVideo']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['catVideo']->key;
 $_smarty_tpl->tpl_vars['catVideo']->iteration++;
 $_smarty_tpl->tpl_vars['catVideo']->index++;
 $_smarty_tpl->tpl_vars['catVideo']->first = $_smarty_tpl->tpl_vars['catVideo']->index === 0;
 $_smarty_tpl->tpl_vars['catVideo']->last = $_smarty_tpl->tpl_vars['catVideo']->iteration === $_smarty_tpl->tpl_vars['catVideo']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['videoCategory']['first'] = $_smarty_tpl->tpl_vars['catVideo']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['videoCategory']['last'] = $_smarty_tpl->tpl_vars['catVideo']->last;
?>	
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['videoCategory']['first']){?>
			<ul>
			<?php }?>
			<li>
				<a href='<?php echo $_smarty_tpl->tpl_vars['catVideo']->value['vUrl'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['catVideo']->value['vTitle'];?>
'>
					<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['catVideo']->value['vTitle'],34,"...");?>

				</a>
			</li>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['videoCategory']['last']){?>
			<li><a style='color:#fa0000; text-decoration:underline; font-size:12px' href='<?php echo $_smarty_tpl->tpl_vars['vCat']->value['catUrl'];?>
'>More videos</a>
			</ul>
			<?php }?>
			<?php }} ?>
		<?php }} ?>
	</nav>
</aside>
<section id='video-list'>
	<section>
		<header class="innerPageTitle no-icon">
			<figure><?php echo $_smarty_tpl->getVariable('activeCat')->value['catTitle'];?>
 Video Gallery</figure>
		</header>
		<ul class='video-has-thumb'>
		<?php  $_smarty_tpl->tpl_vars['activeCatVideo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activeCat')->value['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['activeCatVideo']->key => $_smarty_tpl->tpl_vars['activeCatVideo']->value){
?>
		<li>
			<a href='<?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['vUrl'];?>
'>
				<figure>
					<img src='<?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['vThumbUrl'];?>
' alt='<?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['vTitle'];?>
'>
					<figcaption title='<?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['vTitle'];?>
'>
						<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['activeCatVideo']->value['vTitle'],34,"...");?>

					</figcaption>
				</figure>
			</a>
			<div id='details'>
				<span>(<?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['duration'];?>
)</span>
				<span class='video-plays'><?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['plays'];?>
 views</span>
			</div>
			<small class='video-date'><?php echo $_smarty_tpl->tpl_vars['activeCatVideo']->value['vDate'];?>
</small>
		</li>
		<?php }} ?>
		</ul>
	</section>
</section>