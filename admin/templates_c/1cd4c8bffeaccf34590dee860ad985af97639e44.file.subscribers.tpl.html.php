<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:42
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/subscribers.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:8597299574e46dd8a353dc1-95498784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cd4c8bffeaccf34590dee860ad985af97639e44' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/subscribers.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8597299574e46dd8a353dc1-95498784',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->	
	<div class="content-box-header">
		<h3><?php echo $_smarty_tpl->getVariable('subscriberTitle')->value;?>
</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (count($_smarty_tpl->getVariable('subscribers')->value)==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no subscribers for Anwar Al-hussain TV
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Email Address</th>
					   <th>IP Address</th>
					   <th>Entry Date</th>
					   <th>Entry Time</th>
					</tr>
				</thead>
			<?php  $_smarty_tpl->tpl_vars['subscriber'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subscribers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subscriber']->key => $_smarty_tpl->tpl_vars['subscriber']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['subscriber']->key;
?>
					<tr>
						<td><a href='mailto:<?php echo $_smarty_tpl->tpl_vars['subscriber']->value['emailAddress'];?>
' ><?php echo $_smarty_tpl->tpl_vars['subscriber']->value['emailAddress'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['subscriber']->value['ipAddress'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['subscriber']->value['entryDate'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['subscriber']->value['entryTime'];?>
</td>
					</tr>
			<?php }} ?>
				</tbody>
			</table>
			<?php }?>
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->