<?php
/*
Template Name: Account
*/
?>

<?php 
  // Get the current user-variable.
  // use "$current_user->first_name" for example
  // look at the array with print_r() for all avaliable names
  global $current_user;
  // for testing use
  // print_r($current_user);
?>

<?php get_header(); ?>
		<h1>Manage profile</h1>
		<form name="profile" id="your-profile" action="/wp-admin/profile-update-custom.php" method="post">
		<h2>personal information</h2>
		<table class="columns">
			<tr>
				<td style="width: 50%">
					<label>username <small>(no editing)</small></label>
					<input type="text" class="width_standard" name="user_login" value="<?php echo $current_user->user_login; ?>" disabled="disabled" />
					
					<label>nickname</label>
					<input class="width_standard" type="text" name="nickname" value="<?php echo $current_user->nickname; ?>" />
				</td>
				<td style="width: 50%">
					<label>first name</label>
					<input class="width_standard" type="text" name="first_name" value="<?php echo $current_user->first_name; ?>" />
					
					<label>last name</label>
					<input class="width_standard" type="text" name="last_name"  value="<?php echo $current_user->last_name; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>brief biography</label>
					<textarea name="description" class="height_medium" style="width: 405px"><?php echo $current_user->description; ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					
					<label>display name publicly as</label>
					<select name="display_name">
						<option value="<?php echo $current_user->display_name; ?>"><?php echo $current_user->display_name; ?></option>
						<option value="<?php echo $current_user->nickname ?>"><?php echo $current_user->nickname ?></option>
						<option value="<?php echo $current_user->user_login ?>"><?php echo $current_user->user_login ?></option>
						<?php if ( !empty( $current_user->first_name ) ) : ?>
						<option value="<?php echo $current_user->first_name ?>"><?php echo $current_user->first_name ?></option>
						<?php endif; ?>
						<?php if ( !empty( $current_user->last_name ) ) : ?>
						<option value="<?php echo $current_user->last_name ?>"><?php echo $current_user->last_name ?></option>
						<?php endif; ?>
						<?php if ( !empty( $current_user->first_name ) && !empty( $current_user->last_name ) ) : ?>
						<option value="<?php echo $current_user->first_name." ".$current_user->last_name ?>"><?php echo $current_user->first_name." ".$current_user->last_name ?></option>
						<option value="<?php echo $current_user->last_name." ".$current_user->first_name ?>"><?php echo $current_user->last_name." ".$current_user->first_name ?></option>
						<?php endif; ?>
					</select>
				</td>
			</tr>
			
		</table>	
		
		<h2>contact information</h2>
		<table class="columns">
			<tr>
				<td style="width: 50%">
					<label>email <small>(required, but never displayed)</small></label>
					<input class="width_standard" type="text" name="email" value="<?php echo $current_user->user_email; ?>" />
					
					<label>website</label>
					<input class="width_standard" type="text" name="url" value="<?php echo $current_user->user_url; ?>" />
				</td>
				<td style="width: 50%">
					<label>IRC nick</label>
					<input class="width_standard" type="text" name="yim" value="<?php echo $current_user->yim; ?>" />
						
					<label>AIM handle</label>
					<input class="width_standard" type="text" name="aim" value="<?php echo $current_user->aim; ?>" />
						
					<label>Jabber / Google Talk</label>
					<input class="width_standard" type="text" name="jabber" value="<?php echo $current_user->jabber; ?>" />
				</td>
			</tr>
		</table>
			
		<h2>change password</h2>
		<table class="columns">
			<tr>
				<td style="width: 50%">
					<label>new password</label>
					<input class="width_standard"type="password" name="pass1" size="16" value="" />
					
				</td>
				<td style="width: 50%">
					<label>new password, again</label>
					<input class="width_standard" type="password" name="pass2" size="16" value="" />

				</td>
			</tr>
		</table>
		
		<div class="spacer_ver_medium"></div>

		<p class="submit"><input class="button btn_submit" type="image" src="/wp-content/themes/choke/images/blank.gif" value="save" name="submit" /></p>
		</form>
		

<?php get_footer(); ?>

