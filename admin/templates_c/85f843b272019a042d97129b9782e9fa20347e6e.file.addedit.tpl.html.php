<?php /* Smarty version Smarty-3.0.6, created on 2011-09-27 04:26:03
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/videocategory/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6137576064e81889b845584-47804934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85f843b272019a042d97129b9782e9fa20347e6e' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/videocategory/addedit.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6137576064e81889b845584-47804934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add<?php }else{ ?>Edit<?php }?> A New Video Category</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['videoCategory']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=videocategory&type=<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>add<?php }else{ ?>edit&videoCategoryId=<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryId'];?>
<?php }?>" method='post'>
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryId'];?>
' name='videoCategoryId' />
				<?php }?>
				<fieldset>
					<p>
						<label>*Title</label>
						<input type="text" name="videoCategoryTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Description</label>
						<input type='text' name='videoCategoryDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryDescription'];?>
<?php }?>" >
					</p>

					<p>
						<label>*Status</label>
						<select class="small-input" name="videoCategoryStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
							<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
							<option value='delete' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['videoCategory']['record']['videoCategoryStatus']=="delete"){?>selected="selected"<?php }?><?php }?>>Delete</option>
							<?php }?>
						</select>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create A New<?php }else{ ?>Edit This<?php }?> Video Category" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->