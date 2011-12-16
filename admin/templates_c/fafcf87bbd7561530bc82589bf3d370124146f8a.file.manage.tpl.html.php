<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:46:14
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/imagegallery/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4897922774e48a4960a3a33-78401995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fafcf87bbd7561530bc82589bf3d370124146f8a' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/imagegallery/manage.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4897922774e48a4960a3a33-78401995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/alhussaintv.tv/project/al8/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><ul class="shortcut-buttons-set">
	<li><a href="<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['addImage'];?>
" class="shortcut-button">
			<span>
			<img alt="icon" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/image_add_48.png"><br>
			Add A New Image
			</span>
		</a>
	</li>			
</ul>
<div style='clear:both'></div>
<div class="content-box">
	<div class="content-box-header">
		<h3>Manage Images > 
			<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['imageCategoryLink'];?>
' >
				<span style='font-style:italic; color:#666;'><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['imageCategoryTitle'];?>
</span>
			</a>
		</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageGallery']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageGallery']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['imageGallery']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no Images to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['addImage'];?>
'> <b>Add your first image</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Image</th>
					   <th>Title</th>
					   <th>Description</th>
					   <th>Status</th>
					   <th>Entry Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['imageGallery'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['imageGallery']->key => $_smarty_tpl->tpl_vars['imageGallery']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['imageGallery']->key;
?>
					<tr>
						<td width="10%">
							<div style='display:none' id='imageGalleryImage<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageGalleryId'];?>
'>
							
							<img src='<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageUrl'];?>
' />
							</div>
							<a rel='modal' href='#imageGalleryImage<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageGalleryId'];?>
' title='see large view' >
								<img src='<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageThumbUrl'];?>
' class='imageThumb'/>
							</a>
						</td>
						<td width='15%'>
							<div style='display:none' id='imageGallery<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageGalleryId'];?>
'>
								<p><h3>Description:</h3></p>
								<p><?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['description'];?>
</p>
							</div>
							<a href='<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['edit'];?>
' title="<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['title'];?>
">
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['imageGallery']->value['title'],50,"...");?>

							</a>
						</td>
						<td width='30%'>
							<?php if ($_smarty_tpl->tpl_vars['imageGallery']->value['description']==''){?>( Empty )
							<?php }else{ ?>
							<a rel='modal' href='#imageGallery<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['imageGalleryId'];?>
' title='Click here to see the full version'>
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['imageGallery']->value['description'],70,"...");?>

							</a>
							<?php }?>
						</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['imageGallery']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['entryDate'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['imageGallery']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['imageGallery']->value['preview'];?>
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