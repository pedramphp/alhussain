<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:42
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/dashboard/comments.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18919246184e46dd8a41d4a2-87474128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aabab0994923305bf551fce1bf3ea9fac8589ca7' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/dashboard/comments.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18919246184e46dd8a41d4a2-87474128',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?>
<div class="content-box"><!-- Start Content Box -->	
	<div class="content-box-header">
		<h3>Pending Comments</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
		
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['dashboard']['comments']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['dashboard']['comments']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['dashboard']['comments']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['dashboard']['comments']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['dashboard']['comments']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no pending comments to manage, to manage your exisitng comments click
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=comments'> <b>Manage Comments</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Fullname</th>
					   <th>Gender</th>
					   <th>Comment</th>
					   <th>Email</th>
					   <th>Status</th>
					   <th>Entry Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['dashboard']['comments']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['comment']->key;
?>
					<tr>
						<td>
							<div style='display:none' id='comment<?php echo $_smarty_tpl->tpl_vars['comment']->value['commentsId'];?>
'>
								<p><h3><?php echo ucfirst($_smarty_tpl->tpl_vars['comment']->value['fullname']);?>
 Says:</h3></p>
								<p><?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
</p>
							</div><?php echo ucfirst($_smarty_tpl->tpl_vars['comment']->value['fullname']);?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['comment']->value['gender']);?>
</td>
						<td><a rel='modal' href='#comment<?php echo $_smarty_tpl->tpl_vars['comment']->value['commentsId'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['comment'],100,"...");?>
</a></td>
						<td><?php if ($_smarty_tpl->tpl_vars['comment']->value['email']==''){?>( Empty )<?php }else{ ?><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['comment']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['email'];?>
</a><?php }?></td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['comment']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['comment']->value['entryDate'];?>
</td>
						<td>
						 	<a href="<?php echo $_smarty_tpl->tpl_vars['comment']->value['disapprove'];?>
" title="Disapprove"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Disapprove" /></a>
						 	<a href="<?php echo $_smarty_tpl->tpl_vars['comment']->value['approve'];?>
" title="Approve"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/tick_circle.png" alt="Approve" /></a>  
						</td>
					</tr>
			<?php }} ?>
				</tbody>
			</table>
			<?php }?>
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->