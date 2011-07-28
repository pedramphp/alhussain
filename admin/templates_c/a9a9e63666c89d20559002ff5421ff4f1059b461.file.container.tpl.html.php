<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 23:25:41
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/container.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6566187034e2f4cf5f1be97-35211077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9a9e63666c89d20559002ff5421ff4f1059b461' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/includes/container.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6566187034e2f4cf5f1be97-35211077',
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