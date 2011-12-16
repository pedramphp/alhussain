<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:01:18
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/video.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:17276868014e46d80e7dfcf7-11979727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50bac91a92ad99aa20c4394ae74936b21b4c15c1' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/video.tpl.html',
      1 => 1312605685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17276868014e46d80e7dfcf7-11979727',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('SiteData')->value['videoGallery']['singleVideo']==1){?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("video.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }else{ ?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('includeTemplate')->value).("videoCat.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
