<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:42
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/sidebar.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6097572884e46dd8a0fdaf4-00350085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '970375c4a292445a2f36d8f22d292915499f7252' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/sidebar.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6097572884e46dd8a0fdaf4-00350085',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">AlhussainTV</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
logo.png" alt="Alhussaintv.tv logo" /></a>

		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">Admin</a><br />
				<br />
				<a href="<?php echo $_smarty_tpl->getVariable('SiteData')->value['urls']['siteUrl'];?>
" title="View the Site">View the Site</a> | <a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=logout" title="Sign Out">Sign Out</a>

			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=dashboard" class="nav-top-item no-submenu current"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="javascript:void(0)" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					Blog posts
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=blog&type=add">Write a new post</a></li>
						<li><a  href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=blog">Manage blog posts</a></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
						News
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=news&type=add">Write a new news</a></li>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=news">Manage news</a></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
						Events
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=event&type=add">Add a new event</a></li>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=event">Manage events</a></li>
					</ul>
				</li>
								
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
						Image Gallery
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=imagecategory&type=add">Add a new image category</a></li>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=imagecategory">Manage image gallery</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
						Video Gallery
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=videocategory&type=add">Add a new video category</a></li>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=videocategory">Manage video categories</a></li>
					</ul>
				</li>
				
				<li>
					<a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=comments" class="nav-top-item no-submenu">
						Comments
					</a>
				</li>
				<li>
					<a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=subscribers" class="nav-top-item no-submenu">
						Subscribers
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-top-item">
						Settings 	
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
?action=pageSettings">Page Settings</a></li>
					</ul>
				</li>
				

			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />

					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>

				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="" method="post">

					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>

							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>

				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->