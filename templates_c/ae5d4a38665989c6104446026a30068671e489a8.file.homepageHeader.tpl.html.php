<?php /* Smarty version Smarty-3.0.6, created on 2011-07-28 16:10:48
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al1/templates/includes/default/homepageHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4882996364e318a081a3685-45565903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae5d4a38665989c6104446026a30068671e489a8' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al1/templates/includes/default/homepageHeader.tpl.html',
      1 => 1311719614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4882996364e318a081a3685-45565903',
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