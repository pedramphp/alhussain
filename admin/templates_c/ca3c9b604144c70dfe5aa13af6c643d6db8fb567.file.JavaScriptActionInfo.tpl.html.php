<?php /* Smarty version Smarty-3.0.6, created on 2011-07-29 21:19:53
         compiled from "/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/_settings/JavaScriptActionInfo.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6049405894e3323f99db764-77502456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca3c9b604144c70dfe5aa13af6c643d6db8fb567' => 
    array (
      0 => '/var/www/vhosts/jquerytoolkit.com/subdomains/dev/project/al/admin/templates/_settings/JavaScriptActionInfo.tpl.html',
      1 => 1311716224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6049405894e3323f99db764-77502456',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--[if lt IE 7 ]>
<script src="jslib/dd_belatedpng.js"></script>
<script type="text/javascript">DD_belatedPNG.fix("img, .pngFix"); </script>
<![endif]-->
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="jslib/jquery/jquery-1.6.2.min.js">\x3C/script>')</script>
<?php if (count($_smarty_tpl->getVariable('javascriptLibraryIncludes')->value)>0){?>
<?php  $_smarty_tpl->tpl_vars['javascriptLibraryInclude'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptLibraryIncludes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['javascriptLibraryInclude']->key => $_smarty_tpl->tpl_vars['javascriptLibraryInclude']->value){
?>
<script type = "text/javascript" language = "javascript"  src ="<?php echo $_smarty_tpl->getVariable('javascriptLibraryPath')->value;?>
<?php echo $_smarty_tpl->tpl_vars['javascriptLibraryInclude']->value;?>
"></script>
<?php }} ?>
<?php }?>
<?php if (count($_smarty_tpl->getVariable('javascriptExternal')->value)>0){?>
<?php  $_smarty_tpl->tpl_vars['javascriptExternalItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptExternal')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['javascriptExternalItem']->key => $_smarty_tpl->tpl_vars['javascriptExternalItem']->value){
?>
<script type = "text/javascript" language = "javascript"  src ="<?php echo $_smarty_tpl->tpl_vars['javascriptExternalItem']->value;?>
"></script>
<?php }} ?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('javaScriptActionInfo')->value){?>
<script  type = "text/javascript" language = "javascript"> var $_LITE_ = <?php echo $_smarty_tpl->getVariable('javaScriptActionInfo')->value;?>
;</script>
<script type = "text/javascript" language = "javascript" src = "LiteFrame/javascript/liteframe.js" ></script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('javascriptInline')->value){?>
<script type = "text/javascript" language = "javascript" ><?php echo $_smarty_tpl->getVariable('javascriptInline')->value;?>
</script>
<?php }?>
<?php if (count($_smarty_tpl->getVariable('javascriptIncludes')->value)>0){?>
<?php  $_smarty_tpl->tpl_vars['javascriptInclude'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptIncludes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['javascriptInclude']->key => $_smarty_tpl->tpl_vars['javascriptInclude']->value){
?>
<script type = "text/javascript" language = "javascript"  src ="<?php echo $_smarty_tpl->getVariable('javascriptPath')->value;?>
<?php echo $_smarty_tpl->tpl_vars['javascriptInclude']->value;?>
"></script>
<?php }} ?>
<?php }?>