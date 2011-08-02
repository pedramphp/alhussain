<?php /* Smarty version Smarty-3.0.6, created on 2011-08-02 17:38:03
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al5/templates/actions/default/blogs.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:21074366904e386e3b261c41-80869920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ece8534b50046c61dabda918866ad77da17d0096' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al5/templates/actions/default/blogs.tpl.html',
      1 => 1312262638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21074366904e386e3b261c41-80869920',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section id='blog-content' class='post-list blog-list'>
<?php if (count($_smarty_tpl->getVariable('SiteData')->value['blogs'])==0){?>
	<div style="text-align:center; margin:70px 0;">
			<img src="http://alhussaintv.tv/style/default/red/images/general/underconstruction.png">
			<h1 style='font-size:28px'>Coming Soon</h1>
	</div>
<?php }else{ ?>
	<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['blogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['blog']->key;
?>
		<article>
			<header class='clearfix'>
				<figure>
					<a href='<?php echo $_smarty_tpl->tpl_vars['blog']->value['link'];?>
'>
						<img src='<?php echo $_smarty_tpl->tpl_vars['blog']->value['thumb'];?>
' width='255' height='170' alt='' />
					</a>
					<figcaption class='ir'></figcaption>
				</figure>
				<aside>
					<h2><a href='<?php echo $_smarty_tpl->tpl_vars['blog']->value['link'];?>
'><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</a></h2>
					<div id='details'>
						<span class='author'><?php echo $_smarty_tpl->tpl_vars['blog']->value['fullname'];?>
</span>
						<span class='date'><?php echo $_smarty_tpl->tpl_vars['blog']->value['friendlyDate'];?>
</span>
						<span class='time'><?php echo $_smarty_tpl->tpl_vars['blog']->value['time'];?>
</span>
					</div>
					<p><?php echo $_smarty_tpl->tpl_vars['blog']->value['shortDescription'];?>
</p>
					<button type="submit" data-href='<?php echo $_smarty_tpl->tpl_vars['blog']->value['link'];?>
'>Read more</button>
				</aside>
			</header>
		</article>
	<?php }} ?>
<?php }?>
</section>