<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 05:15:31
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/newsList.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20305917654e4792335af6e0-10996210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e11f6c2160b2c8fe830ba987ef38585babe21d65' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/newsList.tpl.html',
      1 => 1312606082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20305917654e4792335af6e0-10996210',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section id='news-content' class='post-list news-list'>
<?php if (count($_smarty_tpl->getVariable('SiteData')->value['newsList'])==0){?>
	<div style="text-align:center; margin:70px 0;">
			<img src="http://alhussaintv.tv/style/default/red/images/general/underconstruction.png">
			<h1 style='font-size:28px'>Coming Soon</h1>
	</div>
<?php }else{ ?>
	<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['newsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['news']->key;
?>
		<article>
			<header class='clearfix'>
				<figure>
					<a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
'>
						<img src='<?php echo $_smarty_tpl->tpl_vars['news']->value['thumb'];?>
' width='255' height='170' alt='' />
					</a>
					<figcaption class='ir'></figcaption>
				</figure>
				<aside>
					<h2><a href='<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
'><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a></h2>
					<div id='details'>
						<span class='author'><?php echo $_smarty_tpl->tpl_vars['news']->value['fullname'];?>
</span>
						<span class='date'><?php echo $_smarty_tpl->tpl_vars['news']->value['friendlyDate'];?>
</span>
						<span class='time'><?php echo $_smarty_tpl->tpl_vars['news']->value['time'];?>
</span>
					</div>
					<p><?php echo $_smarty_tpl->tpl_vars['news']->value['shortDescription'];?>
</p>
					<button type="submit" data-href='<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
'>Read more</button>
				</aside>
			</header>
		</article>
	<?php }} ?>
<?php }?>
</section>