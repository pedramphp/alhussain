<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 05:03:27
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15287240704e2e4a9f9538a8-77229190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ccb9d648980d3d913d859fdcad3c70820230e0a' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/header.tpl.html',
      1 => 1311645532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15287240704e2e4a9f9538a8-77229190',
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