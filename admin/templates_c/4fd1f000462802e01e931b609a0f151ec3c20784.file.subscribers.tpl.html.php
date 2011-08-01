<?php /* Smarty version Smarty-3.0.6, created on 2011-07-30 21:22:57
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/subscribers.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6713883454e3476319f2d10-85620918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fd1f000462802e01e931b609a0f151ec3c20784' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/subscribers.tpl.html',
      1 => 1311963871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6713883454e3476319f2d10-85620918',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars["subscribers"] = new Smarty_variable($_smarty_tpl->getVariable('SiteData')->value['subscribers'], null, null);?>
<?php $_smarty_tpl->tpl_vars["subscriberTitle"] = new Smarty_variable("Subscribers", null, null);?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("subscribers.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
