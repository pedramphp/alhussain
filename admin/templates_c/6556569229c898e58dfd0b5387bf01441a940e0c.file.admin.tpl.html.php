<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 05:03:27
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/admin.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:12296334234e2e4a9f79ae65-45459291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6556569229c898e58dfd0b5387bf01441a940e0c' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/admin.tpl.html',
      1 => 1311463570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12296334234e2e4a9f79ae65-45459291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="body-wrapper">
	
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("sidebar.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
	<div id="main-content"> <!-- Main Content Section with everything -->
		<noscript> <!-- Show a notification if the user has disabled javascript -->
			<div class="notification error png_bg">
				<div>
					Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
				</div>
			</div>
		</noscript>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("header.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('activeAction')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("footer.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div> <!-- End #main-content -->
</div>