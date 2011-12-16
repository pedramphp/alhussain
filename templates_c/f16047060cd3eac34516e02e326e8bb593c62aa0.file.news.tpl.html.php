<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:33:17
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/news.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4186026654e46df8daa8689-74943865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f16047060cd3eac34516e02e326e8bb593c62aa0' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/news.tpl.html',
      1 => 1312606082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4186026654e46df8daa8689-74943865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section id='news-page'>

<?php if ($_smarty_tpl->getVariable('SiteData')->value['news']['record']==''){?>
	<div style="text-align:center; margin:70px 0;">
			<img src="http://alhussaintv.tv/style/default/red/images/general/underconstruction.png">
			<h1 style='font-size:28px'>Coming Soon</h1>
	</div>
<?php }else{ ?>
	<section id='news-content'>
		<article>
			<header class='clearfix'>
				<figure>
					<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['link'];?>
'>
						<img src='<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['thumb'];?>
' width='255' height='170' />
					</a>
					<figcaption class='ir'></figcaption>
				</figure>
				<aside>
					<h2><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['title'];?>
</h2>
					<div id='details'>
						<span class='author'><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['fullname'];?>
</span>
						<span class='date'><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['friendlyDate'];?>
</span>
						<span class='time'><?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['time'];?>
</span>
					</div>
				</aside>
			</header>
			<?php echo $_smarty_tpl->getVariable('SiteData')->value['news']['record']['article'];?>

		</article>
	</section>		
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php echo $_smarty_tpl->getVariable('pagePath')->value;?>
" num_posts="20" width="800"></fb:comments>
	
<?php }?>		
</section>		
