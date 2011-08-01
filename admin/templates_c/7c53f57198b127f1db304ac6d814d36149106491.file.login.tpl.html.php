<?php /* Smarty version Smarty-3.0.6, created on 2011-07-29 21:19:53
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/login.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:16316710964e3323f9dcbc68-39855312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c53f57198b127f1db304ac6d814d36149106491' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/login.tpl.html',
      1 => 1311716224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16316710964e3323f9dcbc68-39855312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div id='login-container' role='main'>
		<figure><img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
login/	logo_alhussain.png' alt='Al-hussain logo' /></figure>

		<section id='login-form'>
			<hgroup>
				<h6>Sign in to</h6>
				<h3>Al-Hussain TV Control Panel</h3>
			</hgroup>
			<section class='roundedCorner'>
				<form method="post" >
					<p>
						<label>Username</label>
						<input type='text' id='login-username' name='username'/>
					</p>
					<p>
						<label>Password</label>
						<input type='password' id='login-password' name='password'/>

					</p>
					<p>
						<input type='checkbox' id='login-check' /> Remember me on this computer
					</p>
					<p>
						<input type='submit' id='login-button' value='Login' />
					</p>
				</form>
			</section>

			<!-- <a id='forgot-link' href='javascript:void(0)'>I can't sign in or I forgot my username/password</a> -->
			<?php if (isset($_smarty_tpl->getVariable('SiteData',null,true,false)->value['login']['errorMsg'])){?>
			<div class="notification error png_bg" style='margin-top:20px;'>
				<a class="close" href="#"><img alt="close" title="Close this notification" src="<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
icons/cross_grey_small.png"></a>
				<div>
					<?php echo $_smarty_tpl->getVariable('SiteData')->value['login']['errorMsg'];?>

				</div>
			</div>				
			<?php }?>
		</section>
		
		<div class='clearBoth'></div>		
	</div> <!-- </login-container > -->