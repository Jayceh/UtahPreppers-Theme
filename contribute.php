<?php
/*
Template Name: Contribute
*/

get_header();

global $user_ID, $user_identity;
get_currentuserinfo();

?>

<h1>post message</h1>

<?php

if (!$user_ID):

?>

<p>You must be logged in to post a message. <a class="link" href="/login/?action=register">Register</a> if not a member or <a class="link" href="/login/?action=lostpassword">reset password</a> if needed.</p>
<form name="loginform" id="loginform" action="/login/" method="post">
<label>username<br />
<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="1" /></label>
<label>password<br />
<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="2" /></label>
<label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember me</label>
<input type="image" src="/wp-content/themes/choke/images/blank.gif" class="button btn_login_drawerone" style="margin-top: 3px;" name="submit" id="submit" value="Log in" tabindex="100" />
<input type="hidden" name="redirect_to" value="/" />
</form>

<?php
  else:
?>
<form name="post" action="/wp-admin/post-custom.php" method="post">
<label for="post_title">title</label>
<input type="text" name="post_title" class="width_max" />
<label for="content">message</label>
<textarea name="content" class="width_max height_large"></textarea>

<label for="post_category[]">category</label>
<select name="post_category[]">
	<option value="2">articles</option>
	<option value="3">news</option>
	<option value="5">reviews</option>
	<option value="6">security</option>
</select>
<input name="publish" type="image" src="/wp-content/themes/choke/images/blank.gif" id="publish" tabindex="5" accesskey="p" value="publish" class="button btn_publish" />
		
<input type="hidden" name="_wpnonce" value="69170caec2" />
<input type="hidden" name="_wp_http_referer" value="/wp-admin/post-new.php" />
<input type="hidden" name="user_ID" value="<?php echo $user_ID ?>" />
<input type="hidden" id="hiddenaction" name="action" value="post" />
<input type="hidden" id="originalaction" name="originalaction" value="post" />
<input type="hidden" name="post_author" value="" />
<input type="hidden" id="post_type" name="post_type" value="post" />
<input type="hidden" id='post_ID' name='temp_ID' value='<?php echo -1 * time(); ?>' />

<input type="hidden" name="comment_status" id="comment_status" value="open" checked="checked" />
<input type="hidden" name="ping_status" id="ping_status" value="open"  checked="checked" />
<input id="post_status_publish" name="post_status" type="hidden" value="publish"  />

<input type="hidden" type="text" id="mm" name="mm" value="<?php echo date('m'); ?>" />
<input type="hidden" type="text" id="jj" name="jj" value="<?php echo date('d'); ?>" />
<input type="hidden" type="text" id="aa" name="aa" value="<?php echo date('y'); ?>" />
<input type="hidden" type="text" id="hh" name="hh" value="<?php echo date('H'); ?>" />
<input type="hidden" type="text" id="mn" name="mn" value="<?php echo date('i'); ?>" />
<input type="hidden" type="hidden" id="ss" name="ss" value="<?php echo date('s'); ?>" />

<input name="advanced_view" type="hidden" value="1" />
<input name="post_password" type="hidden" size="13" id="post_password" value="" />
<input name="post_name" type="hidden" size="13" id="post_name" value="" />

<input type="hidden" name="post_pingback" value="1" id="post_pingback" />
<input type="hidden" name="prev_status" value="draft" />
<input name="referredby" type="hidden" id="referredby" value="redo" />
 
</form>

<?php

endif;

get_footer();

?>

