<?php /* Smarty version Smarty-3.0.6, created on 2011-09-11 13:20:33
         compiled from "/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/volunteer.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1086170554e6cede1d292a9-68502531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f23dab6c7141f16165f771d2347cbd34e5a15ac4' => 
    array (
      0 => '/var/www/vhosts/alhussaintv.tv/project/al8/templates/actions/default/volunteer.tpl.html',
      1 => 1315761605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1086170554e6cede1d292a9-68502531',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<section id='volunteer-intro'>
			<h1>Currently we are working with a very limited staff. We have some volunteers who step in and help when needed. We look forward to having more volunteers and eventually becoming fully staffed in the near future.
			</h1>
		</section>
		<section>
			<section id='volunteer-content'>
				<header class='innerPageTitle'>
					<figure id='question-icon'>If you are interested we need volunteers for:</figure>
				</header>
				<ul class='list'>
					<li>Hosting</li>
					<li>Acting</li>
					<li>Research</li>
					<li>Technical</li>
					<li>Writer</li>
					<li>Art/ Design</li>
					<li>Other( Please get detail in message )</li>
				</ul>
				<a href="javascript:void(0))"  style="display:block; margin-top:100px;">
					<img src='<?php echo $_smarty_tpl->getVariable('imagePath')->value;?>
volunteer/volunteer_pic.png' />
				</a>
			</section>
			<aside id='volunteer-sidebar'>
				<header class='innerPageTitle'>
					<figure id='volunteer-icon'>Volunteer</figure>
				</header>
				<form id="volunteer-form" class="form">
					<table>
						<tbody><tr id="fullName">
							<td><label>Full name</label></td>
							<td><input type="text" class="txt" name="volFullname"></td>
						</tr>
						<tr id="email">
							<td><label>Email</label></td>
							<td><input type="text" class="txt" name="volEmail"></td>
						</tr>
						<tr id="phoneNumber">
							<td><label>Phone number</label></td>
							<td><input type="text" class="txt" name="volTel"></td>
						</tr>
						<tr id="school">
							<td><label>School/Work</label></td>
							<td><input type="text" class="txt" name="volWork"></td>
						</tr>
						<tr id="city" class="question">
							<td><label>What city do you live in?</label></td>
							<td><input type="text" class="txt" name="volCity"></td>
						</tr>
						
						<tr>
							<td colspan="2" class='valCheckboxes'><label>When is the best time to contact you?</label>
								<div>
									<input type="checkbox" name="valWeekdays"><span>Weekdays</span>
									<input type="checkbox"  name="valWeekends"><span>Weekends</span>
									<input type="checkbox"  name="valDayTime"><span>Daytime</span>
									<input type="checkbox"  name="valEvening"><span>Evening</span>
								</div>
						</tr>
						<tr>
							<td colspan="2" class='valCheckboxes'><label>What is the best way to contact you?</label>
								<div>
									<input type="checkbox"  name="valPhone"><span>Phone</span>
									<input type="checkbox"  name="valEmail"><span>Email</span>
								</div>
							</td>
						</tr>
					
						<tr>
							<td colspan="2" class='valCheckboxes'><label>What are your interests?</label>
								<div>
									<input type="checkbox"  name="valHosting"><span>Hosting</span>
									<input type="checkbox"  name="valArt"><span>Art/ Design</span>
									<input type="checkbox"  name="valResearch"><span>Research</span>
									<input type="checkbox"  name="valTechnical"><span>Technical</span>
									<br/><br/><input type="checkbox"  name="valActing"><span>Acting</span>
									<input type="checkbox"  name="valWriter"><span>Writer</span>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Other</label></td>
							<td>
								<textarea name='valMessage'></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit" style='float:right'>Submit</button></td>
						</tr>
					</tbody></table>
				</form>
			</aside>
		</section>
