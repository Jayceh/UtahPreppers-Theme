<?php
/*
Template Name: Employment
*/
?>

<?php get_header(); ?>

<h1>employment</h1>
<p>Moderated and focused on a specific industry, the UPHPU job announcement 
list provides a value that no other channel can offer by broadcasting relavent 
and trusted announcements directly to interested individuals. Instead of passively waiting for your position to be 
noticed, email Utah's best directly.</p>

<h2>subscribe</h2>
<p>Subscribe to the job announcement list to receive notifications of both 
for full time employment and consultant requests by entering your email 
address below. You may also use the <a href="/mailman/listinfo/uphpu-jobs">advanced 
form</a> for more options, to unsubscribe, or to request a password reminder. 
Access the <a href="/pipermail/uphpu-jobs/">archives</a> to browse past posts.
<form action="/mailman/subscribe/uphpu-jobs" method="post">
	<input class="button_inline btn_subscribe" type="image" src="/wp-content/themes/choke/images/blank.gif" value="subscribe" name="email-button" />
	<input type="text" class="width_standard" name="email" />
</form>
<p></p>

<h2>post job</h2>
<p>Employers or clients interested in contacting our members regarding 
employment opportunities may submit job postings to our job announcement list through the form below.</p>
<?php

if(isset($_GET['msg'])) {
	switch ($_GET['msg']) 	{
		case 'error':
			$message = 'All fields are required.';
			break;
		case 'success':
			$message = 'Your announcement has been submitted successfully.';
			break;
		case 'wrong_answer':
			$message = 'You must successfully answer the question at the bottom of the form.';
			break;
	}
	
	echo '<p style="color: red">' . $message . '</p>';
}

?>

<form name="post" action="/wp-content/plugins/mail/mail.php" method="post">		
<table class="columns">
	<tr>
		<td style="width: 50%">
			<label for="company">company</label>
			<input class="width_standard" type="text" name="company" maxlenth="200" />
								
			<label for="location">location</label>
			<input class="width_standard" type="text" name="location" maxlenth="200" />
			
			<label for="job_title">job title</label>
			<input class="width_standard" type="text" name="job_title" maxlenth="200" />
		</td>
		<td style="width: 50%">
			<label for="contact_name">contact name</label>
			<input class="width_standard" type="text" name="contact_name" maxlenth="200" />
			
			<label for="contact_email">contact email</label>
			<input class="width_standard" type="text" name="contact_email" maxlenth="200" />
			
			<label for="pay_range">base annual pay range</label>
			<select name="pay_range" class="width_standard">
				<option value="$10,000 - $30,000">$10,000 - $30,000</option>
				<option value="$20,000 - $40,000">$20,000 - $40,000</option>
				<option value="$30,000 - $50,000">$30,000 - $50,000</option>
				<option value="$40,000 - $60,000">$40,000 - $60,000</option>
				<option value="$50,000 - $70,000">$50,000 - $70,000</option>
				<option value="$60,000 - $80,000">$60,000 - $80,000</option>
				<option value="$70,000 - $90,000" selected>$70,000 - $90,000</option>
				<option value="$80,000 - $100,000">$80,000 - $100,000</option>
				<option value="$90,000 +">$90,000 +</option>
				<option value="Accepting requirements">Accepting requirements</option>
				<option value="Consultant">Consultant</option>
			</select>
		</td>
	</tr>
</table>

<label for="description">job description</label>
<textarea class="height_small" style="width: 405px" name="description"></textarea>

<label for="skills">required skills</label>
<textarea class="height_small" style="width: 405px" name="skills"></textarea>

<label for="experience">required experience</label>
<textarea class="height_small" style="width: 405px" name="experience"></textarea>

<label for="benefits">provided benefits</label>
<textarea class="height_small" style="width: 405px" name="benefits"></textarea>
			
<label for="contact_email">How many letters are in the group's acronym?</label>
<input class="width_standard" type="text" name="human_check" maxlenth="1" />

<input type="hidden" id="submitted" name="submitted" value="submitted" />
<p class="submit"><input id="submit" class="button btn_submit" type="image" src="/wp-content/themes/choke/images/blank.gif" value="submit" name="submit" /></p>			
<input name="mail_type" value="jobs" type="hidden" />

</form>

<div class="clear spacer_ver_medium"></div>

<?php get_footer(); ?>