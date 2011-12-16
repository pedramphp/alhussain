<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:33
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/container.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18051289084e46dd81ef3d09-72278642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '683b1c55febb6d221474d806abf89bd7657204df' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/includes/container.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18051289084e46dd81ef3d09-72278642',
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