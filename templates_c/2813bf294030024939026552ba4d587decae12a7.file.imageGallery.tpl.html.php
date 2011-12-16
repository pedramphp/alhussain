<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:00:21
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/imageGallery.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1672062734e46d7d5c353d5-02053274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2813bf294030024939026552ba4d587decae12a7' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/imageGallery.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1672062734e46d7d5c353d5-02053274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['gallery'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['imageGallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->key => $_smarty_tpl->tpl_vars['gallery']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gallery']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>
	<ul  class='image-category horizontal clearfix'>
	<?php }?>
	<li>
		<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=image&catId=<?php echo $_smarty_tpl->tpl_vars['gallery']->value['catId'];?>
'>					
			<hgroup>
				<h4><?php echo $_smarty_tpl->tpl_vars['gallery']->value['categoryName'];?>
</h4>
				<h6><?php echo $_smarty_tpl->tpl_vars['gallery']->value['size'];?>
 Images</h6>
				<time><?php echo $_smarty_tpl->tpl_vars['gallery']->value['date'];?>
</time>
			</hgroup>
			<ul>
				<?php  $_smarty_tpl->tpl_vars['imageSrc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gallery']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['imageSrc']->key => $_smarty_tpl->tpl_vars['imageSrc']->value){
?>
					<li><span></span><img src='<?php echo $_smarty_tpl->tpl_vars['imageSrc']->value;?>
' width='112' height='80' /></li>
				<?php }} ?>
			</ul>
			<footer></footer>
		</a>
	</li>	
	<?php if ($_smarty_tpl->tpl_vars['k']->value%2!=0){?>
	</ul>
	<?php }?>
<?php }} ?>