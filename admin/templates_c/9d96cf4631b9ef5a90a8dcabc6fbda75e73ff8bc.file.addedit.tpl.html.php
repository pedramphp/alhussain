<?php /* Smarty version Smarty-3.0.6, created on 2011-08-01 22:55:48
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videogallery/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20751726204e3767347c9a77-70334531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d96cf4631b9ef5a90a8dcabc6fbda75e73ff8bc' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/videogallery/addedit.tpl.html',
      1 => 1312253556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20751726204e3767347c9a77-70334531',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>
			<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryLink'];?>
'>
				<span style='font-style:italic; color:#666;'><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoCategoryTitle'];?>
 </span>
			</a> > 
			<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add A New Video<?php }else{ ?>Edit Video #<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryId'];?>
<?php }?></h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoGallery']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['formUrl'];?>
" method='post' enctype="multipart/form-data">
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryId'];?>
' name='videoGalleryId' />
				<?php }?>
				<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoCategoryId'];?>
' name='videoCategoryId' />
				
				<fieldset>
					<p>
						<label>*Title</label>
						<input type="text" name="videoGalleryTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Description</label>
						<input type='text' name='videoGalleryDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryDescription'];?>
<?php }?>" >
					</p>
					<p>
						<label>*Video Id</label>
						<input type='text' name='videoGalleryVideoId' class="text-input small-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryVideoId'];?>
<?php }?>" >
					</p>
					<p>
						<label>*Status</label>
						<select class="small-input" name="videoGalleryStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
							<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
							<option value='delete' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['record']['videoGalleryStatus']=="delete"){?>selected="selected"<?php }?><?php }?>>Delete</option>
							<?php }?>
						</select>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create A New<?php }else{ ?>Edit This<?php }?> Video" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->