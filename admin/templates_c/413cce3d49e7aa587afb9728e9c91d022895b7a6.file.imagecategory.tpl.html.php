<?php /* Smarty version Smarty-3.0.6, created on 2011-08-15 00:46:01
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/imagecategory.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19431707174e48a48947ac91-07726837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '413cce3d49e7aa587afb9728e9c91d022895b7a6' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/admin/templates/actions/imagecategory.tpl.html',
      1 => 1312516980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19431707174e48a48947ac91-07726837',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('_LITE_',null,true,false)->value['GET']['type'])){?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("imagecategory/addedit.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }else{ ?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("imagecategory/manage.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>