<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:46:19
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/imagegallery/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18476361214e48a49b4fc585-83338631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccd0a02978879de6c249f0c508e8ab4c482b5a81' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/imagegallery/addedit.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18476361214e48a49b4fc585-83338631',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>
			<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryLink'];?>
'>
				<span style='font-style:italic; color:#666;'><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageCategoryTitle'];?>
 </span>
			</a> > 
			<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add A New Image<?php }else{ ?>Edit Image #<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryId'];?>
<?php }?></h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageGallery']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['formUrl'];?>
" method='post' enctype="multipart/form-data">
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryId'];?>
' name='imageGalleryId' />
				<?php }?>
				<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageCategoryId'];?>
' name='imageCategoryId' />
				
				<fieldset>
					<p>
						<label>*Title</label>
						<input type="text" name="imageGalleryTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Description</label>
						<input type='text' name='imageGalleryDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryDescription'];?>
<?php }?>" >
					</p>
					<p>
						<label>Image Url</label>
						<input type='file' name='imageGalleryUrl' class="text-input small-input" ><br />
						<input type="hidden" name="maxSize" value="2" />
						<small>*Please upload an image less than 2MB</small>
					</p>
					<p>
						<label>*Status</label>
						<select class="small-input" name="imageGalleryStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
							<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
							<option value='delete' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageGallery']['record']['imageGalleryStatus']=="delete"){?>selected="selected"<?php }?><?php }?>>Delete</option>
							<?php }?>
						</select>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create A New<?php }else{ ?>Edit This<?php }?> Image Gallery" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->