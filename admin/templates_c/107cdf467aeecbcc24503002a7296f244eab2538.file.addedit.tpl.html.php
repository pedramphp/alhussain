<?php /* Smarty version Smarty-3.0.6, created on 2011-07-27 00:25:33
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/blog/addedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14670896804e2f5afd1cc935-05480076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107cdf467aeecbcc24503002a7296f244eab2538' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/blog/addedit.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14670896804e2f5afd1cc935-05480076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Add<?php }else{ ?>Edit<?php }?> A Blog Post</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['blog']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=blog&type=<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>add<?php }else{ ?>edit&blogId=<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['blogId'];?>
<?php }?>" method='post'>
				<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?>
					<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['blogId'];?>
' name='blogId' />
				<?php }?>
				<fieldset>
					<p>
						<label>Title</label>
						<input type="text" name="blogTitle" class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogTitle'];?>
<?php }?>">
					</p>
					<p>
						<label>Short Description</label>
						<input type='text' name='blogShortDescription' class="text-input large-input"  value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogShortDescription'];?>
<?php }?>" >
					</p>
					<p>
						<label>Image Url</label>
						<input type='text' name='blogImageUrl' class="text-input small-input" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogImageUrl'];?>
<?php }?>"><br />
						<small>*Please first upload the image to the server</small>
					</p>
					<p>
						<label>Author</label>
						<select class="small-input" name="blogAuthor">
						<?php  $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['blog']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['author']->key => $_smarty_tpl->tpl_vars['author']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['author']->key;
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['author']->value['authorId'];?>
' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogAuthor']==$_smarty_tpl->tpl_vars['author']->value['authorId']){?>selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['author']->value['fullname'];?>
</option>
						<?php }} ?>
						</select>
					</p>
					<p>
						<label>Status</label>
						<select class="small-input" name="blogStatus">
							<option value='pending' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogStatus']=="pending"){?>selected="selected"<?php }?><?php }?>>Pending</option>
							<option value='active' <?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php if ($_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogStatus']=="active"){?>selected="selected"<?php }?><?php }?>>Active</option>
						</select>
					</p>					
					<p>
						<label>Article</label>
						<textarea class="text-input textarea wysiwyg"  name="blogArticle" cols="79" rows="15">
						<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='edit'){?><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['blogArticle'];?>
<?php }?>
						</textarea>
					</p>
					<p>
						<input type="submit" value="<?php if ($_smarty_tpl->getVariable('_LITE_')->value['GET']['type']=='add'){?>Create<?php }else{ ?>Edit<?php }?> Blog Post" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->