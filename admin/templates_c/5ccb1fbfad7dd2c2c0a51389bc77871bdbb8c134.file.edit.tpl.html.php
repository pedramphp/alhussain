<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:47:44
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/pageSettings/edit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6602787564e48a4f063ba66-98945190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ccb1fbfad7dd2c2c0a51389bc77871bdbb8c134' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/pageSettings/edit.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6602787564e48a4f063ba66-98945190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['pageHeader'] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['pageSettings']['pageHeader'], null, null);?>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>Edit <?php echo $_smarty_tpl->getVariable('pageHeader')->value['actionTitle'];?>
 Page</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Table</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['pageSettings']['errorMsg'])){?>
			<div class="notification error png_bg">
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['pageSettings']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
			<form action="<?php echo $_smarty_tpl->getVariable('pageHeader')->value['edit'];?>
" method='post'>
				<input type='hidden' value='<?php echo $_smarty_tpl->getVariable('pageHeader')->value['id'];?>
' name='pageHeaderId' />
				<fieldset>
					<p>
						<label>*Page Title</label>
						<input type="text" name="pageTitle" class="text-input small-input" value="<?php echo $_smarty_tpl->getVariable('pageHeader')->value['title'];?>
">
					</p>
					<p>
						<label>Page Sub Title</label>
						<input type='text' name='pageSubtitle' class="text-input large-input"  value="<?php echo $_smarty_tpl->getVariable('pageHeader')->value['subTitle'];?>
" >
					</p>
			
					<p>
						<input type="submit" value="Edit Page" class="button">
					</p>
					
				</fieldset>
				<div class='clear'></div>
			</form>		
		</div> <!-- End #tab1 -->		
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->