<?php /* Smarty version Smarty-3.0.6, created on 2011-07-28 16:10:47
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/templates/_settings/StyleIncludes.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:13334535814e318a07e015d4-56099518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd3f44855cf88161ab5f78c60fd63d0e29c6394' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/templates/_settings/StyleIncludes.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13334535814e318a07e015d4-56099518',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
reset.css?v=1" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
rules.css?v=1" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
default.css?v=1" />
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('settingsTemplate')->value).("google/googleAnalytics.tpl.html"), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!-- For the less-enabled mobile browsers like Opera Mini -->
<link rel="stylesheet" media="handheld" href="<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
handheld.css?v=1" />
<?php if (count($_smarty_tpl->getVariable('styleLibraryIncludes')->value)>0){?>
<?php  $_smarty_tpl->tpl_vars['styleLibraryInclude'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('styleLibraryIncludes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['styleLibraryInclude']->key => $_smarty_tpl->tpl_vars['styleLibraryInclude']->value){
?>
<link rel = "stylesheet" href ="<?php echo $_smarty_tpl->getVariable('styleLibraryPath')->value;?>
<?php echo $_smarty_tpl->tpl_vars['styleLibraryInclude']->value;?>
"/>
<?php }} ?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('styleInline')->value){?><style type = "text/css"  ><?php echo $_smarty_tpl->getVariable('styleInline')->value;?>
</style><?php }?>
<?php if (count($_smarty_tpl->getVariable('styleIncludes')->value)>0){?>
<?php  $_smarty_tpl->tpl_vars['styleInclude'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('styleIncludes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['styleInclude']->key => $_smarty_tpl->tpl_vars['styleInclude']->value){
?>
<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
<?php echo $_smarty_tpl->tpl_vars['styleInclude']->value;?>
"/>
<?php }} ?>
<?php }?>
<script type = "text/javascript" language = "javascript"  src ="<?php echo $_smarty_tpl->getVariable('javascriptLibraryPath')->value;?>
modernizr-1.7.min.js"></script>
