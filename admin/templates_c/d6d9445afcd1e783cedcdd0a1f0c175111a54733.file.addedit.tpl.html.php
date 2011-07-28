<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 23:38:51
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/event/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18837695674e2f500b3235c6-85254039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6d9445afcd1e783cedcdd0a1f0c175111a54733' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/event/addedit.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18837695674e2f500b3235c6-85254039',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add<?php }else{ ?>Edit<?php }?> An Event</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['event']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=event&type=<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>add<?php }else{ ?>edit&eventId=<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['eventId'];?>
<?php }?>" method='post'>
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['eventId'];?>
' name='eventId' />
				<?php }?>
				<fieldset>
					<p>
						<label>Title</label>
						<input type="text" name="eventTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Sub Title</label>
						<input type='text' name='eventSubTitle' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventSubTitle'];?>
<?php }?>" >
					</p>
					<p>
						<label>Upload an Image</label>
						<input type='text' name='eventImage' class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventImage'];?>
<?php }?>"><br />
						<small>*Please first upload the image to the server</small>
					</p>
					<p>
						<label>Image Title</label>
						<input type='text' name='eventImageTitle' class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventImageTitle'];?>
<?php }?>"><br />
						<small>*Please first upload the image to the server</small>
					</p>
					<p>
						<label>Status</label>
						<select class="small-input" name="eventStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
						</select>
					</p>					
					<p>
						<label>More Information</label>
						<textarea class="text-input textarea wysiwyg"  name="eventMoreInfo" cols="79" rows="15">
						<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['record']['eventMoreInfo'];?>
<?php }?>
						</textarea>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create<?php }else{ ?>Edit<?php }?> An Event" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->