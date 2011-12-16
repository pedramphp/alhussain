<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:24:25
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/blog.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2440200574e46dd792fca61-24983332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b36565cae88975c6909eed04f8281a84d663a92' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/blog.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2440200574e46dd792fca61-24983332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section id='blog-page'>

<?php if ($_smarty_tpl->getVariable('SiteData')->value['blog']['record']==''){?>
	<div style="text-align:center; margin:70px 0;">
			<img src="http://alhussaintv.tv/style/default/red/images/general/underconstruction.png">
			<h1 style='font-size:28px'>Coming Soon</h1>
	</div>
<?php }else{ ?>
	<section id='blog-content'>
		<article>
			<header class='clearfix'>
				<figure>
					<a href='<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['link'];?>
'>
						<img src='<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['thumb'];?>
' width='255' height='170' />
					</a>
					<figcaption class='ir'></figcaption>
				</figure>
				<aside>
					<h2><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['title'];?>
</h2>
					<div id='details'>
						<span class='author'><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['fullname'];?>
</span>
						<span class='date'><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['friendlyDate'];?>
</span>
						<span class='time'><?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['time'];?>
</span>
					</div>
				</aside>
			</header>
			<?php echo $_smarty_tpl->getVariable('SiteData')->value['blog']['record']['article'];?>

		</article>
	</section>		
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php echo $_smarty_tpl->getVariable('pagePath')->value;?>
" num_posts="7" width="800"></fb:comments>
	
<?php }?>		
</section>		
