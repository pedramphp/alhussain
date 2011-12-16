<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:47:30
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/subscribers.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18850018824e48a4e25ec823-40226406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9ef656623c91e23517b0ba869eb047e6b23f07a' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/subscribers.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18850018824e48a4e25ec823-40226406',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars["subscribers"] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['subscribers'], null, null);?>
<?php $_smarty_tpl->tpl_vars["subscriberTitle"] = new Smarty_variable("Subscribers", null, null);?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("subscribers.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
