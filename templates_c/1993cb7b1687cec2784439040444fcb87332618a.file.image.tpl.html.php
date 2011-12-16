<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:00:37
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/image.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:9859265104e46d7e5dbba31-79832360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1993cb7b1687cec2784439040444fcb87332618a' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/image.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9859265104e46d7e5dbba31-79832360',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['images'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['imageList']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['images']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['images']->iteration=0;
 $_smarty_tpl->tpl_vars['images']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['iteration']=0;
if ($_smarty_tpl->tpl_vars['images']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['images']->key => $_smarty_tpl->tpl_vars['images']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['images']->key;
 $_smarty_tpl->tpl_vars['images']->iteration++;
 $_smarty_tpl->tpl_vars['images']->index++;
 $_smarty_tpl->tpl_vars['images']->first = $_smarty_tpl->tpl_vars['images']->index === 0;
 $_smarty_tpl->tpl_vars['images']->last = $_smarty_tpl->tpl_vars['images']->iteration === $_smarty_tpl->tpl_vars['images']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['first'] = $_smarty_tpl->tpl_vars['images']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['imagelist']['last'] = $_smarty_tpl->tpl_vars['images']->last;
?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['first']){?>
	<ul class='image-gallery horizontal clearfix'>
	<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['iteration']%4==1){?>
	<ul class='image-gallery horizontal clearfix'>
	<?php }?>
	<li>
		<a href='<?php echo $_smarty_tpl->tpl_vars['images']->value['original'];?>
' class='largeImage' rel="myImage">
			<figure>
				<img src='<?php echo $_smarty_tpl->tpl_vars['images']->value['thumb'];?>
' width='190' height='125'/>
				<figcaption class='ir'></figcaption>
			</figure>
		</a>
		<div class='details clearfix'>
			<span class='ir rating'></span>
			<span class='date'><?php echo $_smarty_tpl->tpl_vars['images']->value['date'];?>
</span>
		</div>
	</li>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['last']){?>
	</ul>
	<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['imagelist']['iteration']%4==0){?>
	</ul>
	<?php }?>	
<?php }} ?>
