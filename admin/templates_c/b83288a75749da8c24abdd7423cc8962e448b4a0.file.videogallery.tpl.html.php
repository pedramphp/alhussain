<?php /* Smarty version Smarty-3.0.6, created on 2011-08-01 22:21:30
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/videogallery.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2198652684e375f2a46f6a9-33339624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b83288a75749da8c24abdd7423cc8962e448b4a0' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/actions/videogallery.tpl.html',
      1 => 1312251433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2198652684e375f2a46f6a9-33339624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('_LITE_',null,true,false)->value['GET']['type'])){?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("videogallery/addedit.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }else{ ?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("videogallery/manage.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>