<?php /* Smarty version Smarty-3.0.6, created on 2011-07-29 21:19:53
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:8428954914e3323f9be8033-97803328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56d83895b2c105fcf475b4ee7edd17f5771f750d' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/includes/header.tpl.html',
      1 => 1311716224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8428954914e3323f9be8033-97803328',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			<!-- Page Head -->
			<h2>Welcome <?php echo $_smarty_tpl->getVariable('SiteData')->value['user']->getFullname();?>
</h2>

			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set"> <!-- Replace the icons URL's with your own -->
				<!-- 
				<li><a class="shortcut-button" href="#"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/path-to-icon.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/path-to-icon.png" alt="icon" /><br />

					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/path-to-icon.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/path-to-icon.png" alt="icon" /><br />
					Add an Event
				</span></a></li>

				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/path-to-icon.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				-->
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->