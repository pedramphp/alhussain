<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:47:37
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/pageSettings/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6632931784e48a4e9095ff2-82609665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023c149fcaf3e7b3b19460aafff809d342358592' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/pageSettings/manage.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6632931784e48a4e9095ff2-82609665',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['pageHeader'] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['pageSettings']['pageHeader'], null, null);?>
<div class="content-box">	
	<div class="content-box-header">
		<h3>Manage Pages</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['pageSettings']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['pageSettings']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['pageSettings']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['pageSettings']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			
			<table>
				<thead>
					<tr>
					   <th>Page</th>
					   <th>Title</th>
					   <th>Sub Title</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pageHeader')->value['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['header']->key => $_smarty_tpl->tpl_vars['header']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['header']->key;
?>
					<tr>
						<td><a href='<?php echo $_smarty_tpl->tpl_vars['header']->value['edit'];?>
' title='click to edit'><?php echo ucfirst($_smarty_tpl->tpl_vars['header']->value['actionTitle']);?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['header']->value['title']);?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['header']->value['subTitle']);?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['header']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['header']->value['preview'];?>
" target='_blank' title="Live Preview"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/preview_icon.gif" alt="Preview" /></a> 
						</td>
					</tr>
			<?php }} ?>
				</tbody>
			</table>
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->