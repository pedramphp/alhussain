<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 05:15:08
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/events.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15494409154e47921c52d352-49943875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d7cda86d7a54858470945d1157d5906c37d165d' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/events.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15494409154e47921c52d352-49943875',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='event-box'>
			<figure class='ir'></figure>
			<div class='roundedCorner' id='event-container'>
				<h2 class='eventH2'><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['title'];?>
 - <?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['eventFriendlyDate'];?>
</h2>
				<time><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['eventFriendlyDate'];?>
</time>
				<p>"<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['subTitle'];?>
"</p>
				<section>
					<figure>
						<img src='<?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['image'];?>
'  />
						<figcaption>
							<h3  class='eventH3'><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['imageTitle'];?>
</h3>
						</figcaption>
					</figure>
					<address>
						 <?php if ($_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['address']!=''){?><div><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['address'];?>
</div><?php }?>
						 <?php if ($_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['moreInfo']!=''){?><div><?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['moreInfo'];?>
</div><?php }?>
						 <nav style='margin-top:10px;'>
							<a class='event-facebook ir' href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['facebook']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['facebook']['title'];?>
'>AlhussainTV Facebook Link</a>
							<a class='event-twitter ir' href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['twitter']['title'];?>
'>AlhussainTV Twitter Link</a>
							<a class='event-youtube ir' href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['youtube']['url'];?>
' title='<?php echo $_smarty_tpl->getVariable('SiteData')->value['socialLinks']['youtube']['title'];?>
'>AlhussainTV Youtube Link</a>
						 </nav>
						 <?php if ($_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['telephone']!=''){?>
						 	<span class='eventSpan'>Tel: <?php echo $_smarty_tpl->getVariable('SiteData')->value['event']['activeRecord']['telephone'];?>
</span>
						 <?php }?>	
					</address>
					
				</section>
			</div>
		</section>
		<aside id='event-list'>
			<header class='innerPageTitle'>
				<figure>Latest Events</figure>
			</header>
			<ul>
				<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['event']['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['event']->key;
?>
					<li><a class='<?php echo $_smarty_tpl->tpl_vars['event']->value['type'];?>
<?php if ($_smarty_tpl->tpl_vars['event']->value['active']){?> active<?php }?>' href='<?php echo $_smarty_tpl->tpl_vars['event']->value['link'];?>
'><p><?php echo $_smarty_tpl->tpl_vars['event']->value['title'];?>
</p><time><?php echo $_smarty_tpl->tpl_vars['event']->value['eventFriendlyDate'];?>
</time></a></li>
				<?php }} ?>
				<!-- <li><a class='shihadat' href='javascript:void(0)'><p>Imam Ali (A.S.) Shihadat</p><time>13 Jul, 2011</time></a></li>
				<li><a class='eid' href='javascript:void(0)'><p>Fetr Eid</p><time>24 Jul, 2011</time></a></li>
				<li><a class='active viladat' href='javascript:void(0)'><p>Imam Hussain (A.S.) Viladat</p><time>23 Aug, 2011</time></a></li>
				 -->
			</ul>
		</aside>
