<?php /* Smarty version Smarty-3.0.6, created on 2011-07-26 23:25:41
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/_settings/StyleIncludes.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20830998964e2f4cf5d9e651-49481170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7011dce5ebae51c9d33deaac7ace5c3582e84ad' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/admin/templates/_settings/StyleIncludes.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20830998964e2f4cf5d9e651-49481170',
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
<!-- Internet Explorer Fixes Stylesheet -->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('stylePath')->value;?>
ie.css" type="text/css" media="screen" />
<![endif]-->

