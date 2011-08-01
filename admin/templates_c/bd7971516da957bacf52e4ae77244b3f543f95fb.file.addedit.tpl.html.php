<?php /* Smarty version Smarty-3.0.6, created on 2011-07-30 20:51:32
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/imagecategory/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14681687874e34a714a44741-84853414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd7971516da957bacf52e4ae77244b3f543f95fb' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/imagecategory/addedit.tpl.html',
      1 => 1312073451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14681687874e34a714a44741-84853414',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add<?php }else{ ?>Edit<?php }?> A New Image Category</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['imageCategory']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=imagecategory&type=<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>add<?php }else{ ?>edit&imageCategoryId=<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryId'];?>
<?php }?>" method='post'>
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryId'];?>
' name='imageCategoryId' />
				<?php }?>
				<fieldset>
					<p>
						<label>*Title</label>
						<input type="text" name="imageCategoryTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Description</label>
						<input type='text' name='imageCategoryDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryDescription'];?>
<?php }?>" >
					</p>

					<p>
						<label>*Status</label>
						<select class="small-input" name="imageCategoryStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
							<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
							<option value='delete' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['imageCategory']['record']['imageCategoryStatus']=="delete"){?>selected="selected"<?php }?><?php }?>>Delete</option>
							<?php }?>
						</select>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create A New<?php }else{ ?>Edit This<?php }?> Image Category" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->