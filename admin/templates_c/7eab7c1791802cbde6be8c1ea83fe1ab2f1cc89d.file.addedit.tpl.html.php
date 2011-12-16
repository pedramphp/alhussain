<?php /* Smarty version Smarty-3.0.6, created on 2011-09-27 04:26:35
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/news/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4271356364e8188bb9649c0-46754807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eab7c1791802cbde6be8c1ea83fe1ab2f1cc89d' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/news/addedit.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4271356364e8188bb9649c0-46754807',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add<?php }else{ ?>Edit<?php }?> A News</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['news']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form enctype="multipart/form-data" action="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=news&type=<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>add<?php }else{ ?>edit&newsId=<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['newsId'];?>
<?php }?>" method='post'>
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['newsId'];?>
' name='newsId' />
				<?php }?>
				<fieldset>
					<p>
						<label>*Title</label>
						<input type="text" name="newsTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Short Description</label>
						<input type='text' name='newsShortDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsShortDescription'];?>
<?php }?>" >
					</p>
					<p>
						<label>Image Url</label>
						<input type='file' name='newsImageUrl' class="text-input small-input" ><br />
						<input type="hidden" name="maxSize" value="2" />
						<small>*Please upload an image less than 2MB</small>
					</p>
					<p>
						<label>*Author</label>
						<select class="small-input" name="newsAuthor">
						<?php  $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['news']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['author']->key => $_smarty_tpl->tpl_vars['author']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['author']->key;
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['author']->value['authorId'];?>
' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsAuthor']==$_smarty_tpl->tpl_vars['author']->value['authorId']){?>selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['author']->value['fullname'];?>
</option>
						<?php }} ?>
						</select>
					</p>
					<p>
						<label>*Status</label>
						<select class="small-input" name="newsStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
						</select>
					</p>					
					<p>
						<label>Article</label>
						<textarea class="text-input textarea wysiwyg"  name="newsArticle" cols="79" rows="15">
						<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['newsArticle'];?>
<?php }?>
						</textarea>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create<?php }else{ ?>Edit<?php }?> A News" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->