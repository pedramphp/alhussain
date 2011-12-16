<?php /* Smarty version Smarty-3.0.6, created on 2011-09-07 20:57:08
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/news/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:16701137514e6812e4cef0e9-54078061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00e72bf78745e4425dde43a448c3e2022a0100ff' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/news/manage.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16701137514e6812e4cef0e9-54078061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>Manage News</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['news']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['news']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['news']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no news to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=news&type=add'> <b>Write your first news</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Post Image</th>
					   <th>News</th>
					   <th>Author</th>
					   <th>Status</th>
					   <th>Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['news']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['news']->key;
?>
					<tr>
						<td width="10%">
							<a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['edit'];?>
'><img src='<?php if ($_smarty_tpl->tpl_vars['news']->value['imageThumbUrl']==''){?><?php echo ($_smarty_tpl->getVariable('imagePath')->value).("no_photo_icon.gif");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['news']->value['imageThumbUrl'];?>
<?php }?>' class='imageThumb'/></a>
						</td>
						<td><a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['edit'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['title'],50,"...");?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['news']->value['author'];?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['news']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['news']->value['date'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['news']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['preview'];?>
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