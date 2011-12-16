<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:44:17
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/comments.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:3746111604e48a421cf6956-80641077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2405a197d4dcdbfd58aad35dc8229e4c06df2d05' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/comments.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3746111604e48a421cf6956-80641077',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box"><!-- Start Content Box -->	
	<div class="content-box-header">
		<h3>Manage Comments</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
		
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['comments']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['comments']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['comments']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['comments']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['comments']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no comments to manage, please come later
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
 $_from = $_smarty_tpl->getVariable('SiteData')->value['comments']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
' title='Click here to see the full version'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['comment'],70,"...");?>
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
						 	<?php if ($_smarty_tpl->tpl_vars['comment']->value['status']=="pending"){?>
						 	<a href="<?php echo $_smarty_tpl->tpl_vars['comment']->value['approve'];?>
" title="Approve"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/tick_circle.png" alt="Approve" /></a>  
							<?php }?>
						</td>
					</tr>
			<?php }} ?>
				</tbody>
			</table>
			<?php }?>
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->