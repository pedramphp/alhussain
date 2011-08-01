<?php /* Smarty version Smarty-3.0.6, created on 2011-07-31 13:51:49
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/news.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6975787104e359635823431-74502177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2206cd07808e023ac85b7ce96d46dc9dfff37635' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/news.tpl.html',
      1 => 1311716224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6975787104e359635823431-74502177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('_LITE_',null,true,false)->value['GET']['type'])){?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("news/addedit.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }else{ ?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("news/manage.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>