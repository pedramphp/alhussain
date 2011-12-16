<?php /* Smarty version Smarty-3.0.6, created on 2011-08-14 02:43:17
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/testimonial.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:17048834134e476e850f8404-29633097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07b2ebe6ee2bfbbed7a6cd2291ee0588f2eb5a81' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/testimonial.tpl.html',
      1 => 1312516981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17048834134e476e850f8404-29633097',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='testimonials-intro'>
			Please leave a comment to Alhussain TV, so we can get a better feedback from our users.
		</section>
		<section id='testimonials-content' class='clearfix'>
			<section>
				<?php  $_smarty_tpl->tpl_vars['testi'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('SiteData')->value['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['testi']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['testi']->key => $_smarty_tpl->tpl_vars['testi']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['testi']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['testi']['index']++;
?>
				<div class='<?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['testi']['index'] / 1)){?>left<?php }else{ ?>right<?php }?>-align clearfix'>
					<figure class='testimonials-pic' class='miniRoundedCorner'><span <?php if ($_smarty_tpl->tpl_vars['testi']->value['gender']=='female'){?>class='female'<?php }?>></span></figure>
					<aside class='miniRoundedCorner'>
						<figure class='ir'></figure>
						<b><?php echo $_smarty_tpl->tpl_vars['testi']->value['fullname'];?>
</b>
						<p><?php echo $_smarty_tpl->tpl_vars['testi']->value['comment'];?>
</p>
					</aside>
				</div>
				<div class='testimonials-splitter'><a href="javascript:void(0);" class='gotop'>( Back to top )</a></div>
				<?php }} ?>
			</section>
			<section>
				<form id="testimonials-form" class="form clearfix">
					<table>
						<tr id="fullName">
							<td><label>Full name</label></td>
							<td><input type="text" class="txt" name="commentFullname"></td>
						</tr>
						<tr id="email">
							<td><label>Email</label></td>
							<td><input type="text" class="txt" name="commentEmail"></td>
						</tr>
						<tr>
							<td><label>Gender</label></td>
							<td style='padding-bottom:10px'>
								<label class='radio'>Male </label><input type="radio" name="commentGender" value='male' checked='checked'>
								<label class='radio'>Female</label> <input type="radio"  name="commentGender" value='female'>
							</td>
						</tr>
						<tr>
							<td><label>Message</label></td>
							<td><textarea name="commentMessage"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit">Submit</button></td>
						</tr>
					</table>
				</form>
			</section>
		</section>