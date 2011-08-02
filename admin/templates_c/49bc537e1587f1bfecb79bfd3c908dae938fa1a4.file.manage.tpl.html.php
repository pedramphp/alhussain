<?php /* Smarty version Smarty-3.0.6, created on 2011-08-01 23:21:03
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videogallery/manage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:17962208314e376d1fef1ec4-74814713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49bc537e1587f1bfecb79bfd3c908dae938fa1a4' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videogallery/manage.tpl.html',
      1 => 1312255262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17962208314e376d1fef1ec4-74814713',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/includes/modules/smarty/libs/plugins/modifier.truncate.php';
?><ul class="shortcut-buttons-set">
	<li><a href="<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['addVideo'];?>
" class="shortcut-button">
			<span>
			<img alt="icon" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/image_add_48.png"><br>
			Add A New Video
			</span>
		</a>
	</li>			
</ul>
<div style='clear:both'></div>
<div class="content-box">
	<div class="content-box-header">
		<h3>Manage Videos > 
			<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['videoCategoryLink'];?>
' >
				<span style='font-style:italic; color:#666;'><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['videoCategoryTitle'];?>
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
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoGallery']['successMsg'])){?>
			<div class="notification success png_bg">
				<a class="close" href="javascript:void(0)"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['successMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoGallery']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<?php if (count($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['records'])==0){?>
			<div class="notification attention png_bg">
				<div>
					There are no Videos to manage, to get started 
					<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=videoGallery&type=add'> <b>Add your first video</b></a>
				</div>
			</div>
			<?php }else{ ?>
			<table>
				<thead>
					<tr>
					   <th>Video</th>
					   <th>Title</th>
					   <th>Description</th>
					   <th>Video Id</th>
					   <th>Status</th>
					   <th>Entry Date</th>
					   <th>Actions</th>
					</tr>
				</thead>
			 
			<?php  $_smarty_tpl->tpl_vars['videoGallery'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['videoGallery']->key => $_smarty_tpl->tpl_vars['videoGallery']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['videoGallery']->key;
?>
					<tr>
						<td width="10%">
							<div style='display:none' id='videoGalleryVideo<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoGalleryId'];?>
'>
								<iframe src="<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoUrl'];?>
" width="847" height="396" frameborder="0"></iframe>
							</div>
							<a rel='modal' href='#videoGalleryVideo<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoGalleryId'];?>
' title='see large view' >
								Watch video 
							</a>
						</td>
						<td width='15%'>
							<div style='display:none' id='videoGallery<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoGalleryId'];?>
'>
								<p><h3>Description:</h3></p>
								<p><?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['description'];?>
</p>
							</div>
							<a href='<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['edit'];?>
' title="<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['title'];?>
">
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['videoGallery']->value['title'],50,"...");?>

							</a>
						</td>
						<td width='30%'>
							<?php if ($_smarty_tpl->tpl_vars['videoGallery']->value['description']==''){?>( Empty )
							<?php }else{ ?>
							<a rel='modal' href='#videoGallery<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoGalleryId'];?>
' title='Click here to see the full version'>
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['videoGallery']->value['description'],70,"...");?>

							</a>
							<?php }?>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['videoId'];?>
</td>
						<td><?php echo ucfirst($_smarty_tpl->tpl_vars['videoGallery']->value['status']);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['entryDate'];?>
</td>
						<td>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['edit'];?>
" title="Edit"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/pencil.png" alt="Edit" /></a>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['delete'];?>
" title="Delete"><img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross.png" alt="Delete" /></a> 
						 <?php if ($_smarty_tpl->tpl_vars['videoGallery']->value['status']=='active'){?>
						 <a href="<?php echo $_smarty_tpl->tpl_vars['videoGallery']->value['preview'];?>
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