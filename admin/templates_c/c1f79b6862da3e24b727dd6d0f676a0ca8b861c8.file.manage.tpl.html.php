<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:45:32
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/event/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2759123854e48a46cf30865-69260215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f79b6862da3e24b727dd6d0f676a0ca8b861c8' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/event/manage.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2759123854e48a46cf30865-69260215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>Manage Events</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['event']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['event']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['event']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no events to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=event&type=add'> <b>Write your first event</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Event Image</th>
					   <th>Event</th>
					   <th>Sub Title</th>
					   <th>Status</th>
					   <th>Event Date</th>
					   <th>Entry Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['event']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['event']->key;
?>
					<tr>
						<td width="10%">
							<a title='<?php echo $_smarty_tpl->tpl_vars['event']->value['imageTitle'];?>
' href='<?php echo $_smarty_tpl->tpl_vars['event']->value['edit'];?>
'><img src='<?php if ($_smarty_tpl->tpl_vars['event']->value['eventImage']==''){?><?php echo ($_smarty_tpl->getVariable('imagePath')->value).("no_photo_icon.gif");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['event']->value['eventImage'];?>
<?php }?>' class='imageThumb'/></a>
						</td>
						<td><a href='<?php echo $_smarty_tpl->tpl_vars['event']->value['edit'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['event']->value['title'];?>
'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['event']->value['title'],50,"...");?>
</a></td>
						<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['event']->value['subTitle'],50,"...");?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['event']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['event']->value['eventFriendlyDate'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['event']->value['entryDate'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['event']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['event']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['event']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['event']->value['preview'];?>
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