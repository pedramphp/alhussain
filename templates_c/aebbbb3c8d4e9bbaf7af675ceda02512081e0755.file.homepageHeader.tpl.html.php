<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 16:00:06
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/homepageHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15070344694e46d7c63301d2-13991670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebbbb3c8d4e9bbaf7af675ceda02512081e0755' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/includes/default/homepageHeader.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15070344694e46d7c63301d2-13991670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='homepage-slider' class='carousel-slideshow carousel clearfix'>
			<div class='clearfix'>
				<a href='javascript:void(0)' class='prev links' ><figure class='ir'>previous slide</figure></a>
				<nav class='relative'>
					<ul>
						<li class='homepage-slideshow hide'>
							<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
imageGallery'>
								<figure><img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
slides/image-gallery.jpg' /></figure>
							</a>
							<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
video'>
								<figure><img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
slides/video.jpg' /></figure>
							</a>
							<a href='<?php echo $_smarty_tpl->getVariable('applicationPath')->value;?>
volunteer'>
								<figure><img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
slides/volunteer.jpg' /></figure>
							</a>
						</li>
					</ul>
					<figure class='pngFix' id='slider-shadow'></figure>
				</nav>	
				<a href='javascript:void(0)' class='next links' ><figure class='ir'>next slide</figure></a>
			</div>
			<div class='relative'><figure id='homepage-slider-shadow' class='pngFix'></figure></div>
		</section> <!-- /homepage-slider -->
		<section id='homepage-hadith'>
			<figure></figure>
			<i class='left'></i>
			<blockquote>
			<?php echo $_smarty_tpl->getVariable('SiteData')->value['homepage']['hadith'];?>

			</blockquote>
			<i class='right'></i>
		</section>