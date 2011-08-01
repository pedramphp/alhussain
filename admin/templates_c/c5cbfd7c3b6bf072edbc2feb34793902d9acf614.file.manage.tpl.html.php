<?php /* Smarty version Smarty-3.0.6, created on 2011-07-30 21:38:04
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videocategory/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20088101164e34b1fc6cfed4-81718738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5cbfd7c3b6bf072edbc2feb34793902d9acf614' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videocategory/manage.tpl.html',
      1 => 1312076282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20088101164e34b1fc6cfed4-81718738',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box">
	<div class="content-box-header">
		<h3>Manage Video Categories</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoCategory']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoCategory']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['videoCategory']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no Video Category to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=videoCategory&type=add'> <b>Create your first video category</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Title</th>
					   <th>Description</th>
					   <th>Size</th>
					   <th>Status</th>
					   <th>Entry Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['videoCategory'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['videoCategory']->key => $_smarty_tpl->tpl_vars['videoCategory']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['videoCategory']->key;
?>
					<tr>
						<td>
							<div style='display:none' id='videoCategory<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['videoCategoryId'];?>
'>
								<p><h3>Description:</h3></p>
								<p><?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['description'];?>
</p>
							</div>
							<a href='<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['edit'];?>
' title="<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['title'];?>
">
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['videoCategory']->value['title'],50,"...");?>

							</a>
						</td>
						<td>
							<a rel='modal' href='#videoCategory<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['videoCategoryId'];?>
' title='Click here to see the full version'>
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['videoCategory']->value['description'],70,"...");?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['videoCategory']->value['size']==0){?>No Videoss<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['size'];?>
 Videos<?php }?></td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['videoCategory']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['entryDate'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['videoCategory']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoCategory']->value['preview'];?>
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