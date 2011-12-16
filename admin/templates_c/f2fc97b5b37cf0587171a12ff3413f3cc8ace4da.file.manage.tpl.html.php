<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:44:33
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/blog/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:13240386854e48a43119f4e1-41234337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2fc97b5b37cf0587171a12ff3413f3cc8ace4da' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/blog/manage.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13240386854e48a43119f4e1-41234337',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>Manage Blog Posts</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['blog']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['blog']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['blog']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no blog posts to manage to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=blog&type=add'> <b>Write your first blog post</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Post Image</th>
					   <th>Post</th>
					   <th>Author</th>
					   <th>Status</th>
					   <th>Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['blog']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['blog']->key;
?>
					<tr>
						<td width="10%">
							<a href='<?php echo $_smarty_tpl->tpl_vars['blog']->value['edit'];?>
'><img src='<?php if ($_smarty_tpl->tpl_vars['blog']->value['imageThumbUrl']==''){?><?php echo ($_smarty_tpl->getVariable('imagePath')->value).("no_photo_icon.gif");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['blog']->value['imageThumbUrl'];?>
<?php }?>' class='imageThumb'/></a>
						</td>
						<td><a href='<?php echo $_smarty_tpl->tpl_vars['blog']->value['edit'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['blog']->value['title'],50,"...");?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['blog']->value['author'];?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['blog']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['blog']->value['date'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['blog']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['preview'];?>
" target='_blank' title="Live Preview"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/preview_icon.gif" alt="Preview" /></a> 
						  <?php }?>
						</td>
					</tr>
			<?php }} ?>
			<?php }?>
				</tbody>
			</table>
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->