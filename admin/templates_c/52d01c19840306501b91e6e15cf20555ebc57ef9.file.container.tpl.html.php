<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 05:03:27
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/container.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:3164352384e2e4a9f4e57c6-91271873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52d01c19840306501b91e6e15cf20555ebc57ef9' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al2/admin/templates/includes/container.tpl.html',
      1 => 1311463533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3164352384e2e4a9f4e57c6-91271873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('action')->value=="login"){?>
	<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('activeAction')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }else{ ?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("admin.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>