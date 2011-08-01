<?php /* Smarty version Smarty-3.0.6, created on 2011-07-30 21:22:47
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/dashboard.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:5907019104e34762761f8d2-15631165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df73a0f81008e4e29520e3ad928bd966baee5c67' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/dashboard.tpl.html',
      1 => 1311963795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5907019104e34762761f8d2-15631165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars["subscriberTitle"] = new Smarty_variable("Latest Subscribers", null, null);?>
<?php $_smarty_tpl->tpl_vars["subscribers"] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['dashboard']['subscribers'], null, null);?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("subscribers.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div style='margin-bottom:50px;'></div>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("dashboard/comments.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>