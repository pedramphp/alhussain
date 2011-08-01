<?php /* Smarty version Smarty-3.0.6, created on 2011-07-31 17:57:06
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/imagecategory/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:13391661554e35cfb26d5183-46274663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfac89b2b2f2035e34209398504532541b42db9d' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/imagecategory/manage.tpl.html',
      1 => 1312149380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13391661554e35cfb26d5183-46274663',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><div class="content-box">
	<div class="content-box-header">
		<h3>Manage Image Categories</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageCategory']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageCategory']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['imageCategory']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no Image Category to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=imageCategory&type=add'> <b>Create your first image category</b></a>
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
			 
			<?php  $_smarty_tpl->tpl_vars['imageCategory'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['imageCategory']->key => $_smarty_tpl->tpl_vars['imageCategory']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['imageCategory']->key;
?>
					<tr>
						<td>
							<div style='display:none' id='imageCategory<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['imageCategoryId'];?>
'>
								<p><h3>Description:</h3></p>
								<p><?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['description'];?>
</p>
							</div>
							<a href='<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['images'];?>
' title="<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['title'];?>
">
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['imageCategory']->value['title'],50,"...");?>

							</a>
						</td>
						<td>
							<a rel='modal' href='#imageCategory<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['imageCategoryId'];?>
' title='Click here to see the full version'>
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['imageCategory']->value['description'],70,"...");?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['imageCategory']->value['size']==0){?>No Imagess<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['size'];?>
 Images<?php }?></td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['imageCategory']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['entryDate'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['imageCategory']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageCategory']->value['preview'];?>
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