<?php

/*
Template Name: Login
*/

require( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );

$action = $_REQUEST['action'];
$errors = array();

if ( isset($_GET['key']) )
	$action = 'resetpass';

nocache_headers();

header('Content-Type: '.get_bloginfo('html_type').'; charset='.get_bloginfo('charset'));

if ( defined('RELOCATE') ) { // Move flag is set
	if ( isset( $_SERVER['PATH_INFO'] ) && ($_SERVER['PATH_INFO'] != $_SERVER['PHP_SELF']) )
		$_SERVER['PHP_SELF'] = str_replace( $_SERVER['PATH_INFO'], '', $_SERVER['PHP_SELF'] );

	$schema = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
	if ( dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) != get_option('siteurl') )
		update_option('siteurl', dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) );
}


// Rather than duplicating this HTML all over the place, we'll stick it in function
function login_header($title = 'Login', $message = '') {
	global $errors, $error, $wp_locale;

	get_header();
	
	echo '<h1>' . $title . '</h1>';
	
	if ( !empty( $message ) ) echo apply_filters('login_message', $message) . "\n";

	// Incase a plugin uses $error rather than the $errors array
	if ( !empty( $error ) ) {
		$errors['error'] = $error;
		unset($error);
	}

	if ( !empty( $errors ) ) {
		if ( is_array( $errors ) ) {
			$newerrors = "\n";
			foreach ( $errors as $error ) $newerrors .= '	' . $error . "<br />\n";
			$errors = $newerrors;
		}

		echo '<p id="login_error" class="msg_error">' . apply_filters('login_errors', $errors) . "</p>\n";
	}
} // End of login_header()


switch ($action) {

case 'logout' :

	wp_clearcookie();
	do_action('wp_logout');

	$redirect_to = '/login/?loggedout=true';
	if ( isset( $_REQUEST['redirect_to'] ) )
		$redirect_to = $_REQUEST['redirect_to'];

	wp_redirect($redirect_to);
	exit();

break;

case 'lostpassword' :
case 'retrievepassword' :
	$user_login = '';
	$user_pass = '';

	if ( $_POST ) {
		if ( empty( $_POST['user_login'] ) )
			$errors['user_login'] = __('<strong>ERROR</strong>: The username field is empty.');
		if ( empty( $_POST['user_email'] ) )
			$errors['user_email'] = __('<strong>ERROR</strong>: The email field is empty.');

		do_action('lostpassword_post');
		
		if ( empty( $errors ) ) {
			$user_data = get_userdatabylogin(trim($_POST['user_login']));
			// redefining user_login ensures we return the right case in the email
			$user_login = $user_data->user_login;
			$user_email = $user_data->user_email;

			if (!$user_email || $user_email != $_POST['user_email']) {
				$errors['invalidcombo'] = __('<strong>ERROR</strong>: Invalid username / email combination.');
			} else {
				do_action('retreive_password', $user_login);  // Misspelled and deprecated
				do_action('retrieve_password', $user_login);

				// Generate something random for a password... md5'ing current time with a rand salt
				$key = substr( md5( uniqid( microtime() ) ), 0, 8);
				// Now insert the new pass md5'd into the db
				$wpdb->query("UPDATE $wpdb->users SET user_activation_key = '$key' WHERE user_login = '$user_login'");
				$message = __('Someone has asked to reset the password for the following site and username.') . "\r\n\r\n";
				$message .= get_option('siteurl') . "\r\n\r\n";
				$message .= sprintf(__('username %s'), $user_login) . "\r\n\r\n";
				$message .= __('To reset your password visit the following address, otherwise just ignore this email and nothing will happen.') . "\r\n\r\n";
				$message .= get_option('siteurl') . "/login/?action=rp&key=$key\r\n";

				if (FALSE == wp_mail($user_email, sprintf(__('[%s] Password Reset'), get_option('blogname')), $message)) {
					die('<p>' . __('The email could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') . '</p>');
				} else {
					wp_redirect('/login/?checkemail=confirm');
					exit();
				}
			}
		}
	}

	if ( 'invalidkey' == $_GET['error'] ) $errors['invalidkey'] = __('Sorry, that key does not appear to be valid.');

	do_action('lost_password');
	login_header(__('Recover lost password'), '<p class="message">' . __('Enter your username and email address and a new password will be emailed to you.') . '</p>');
?>

<form name="lostpasswordform" id="lostpasswordform" action="/login/?action=lostpassword" method="post">
	<p>
		<label><?php _e('username') ?></label>
		<input type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($_POST['user_login'])); ?>" size="20" tabindex="10" />
		<label><?php _e('email') ?></label>
		<input type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($_POST['user_email'])); ?>" size="25" tabindex="20" />
	</p>
<?php do_action('lostpassword_form'); ?>
	<p class="submit"><input class="button btn_submit" type="image" src="/wp-content/themes/choke/images/blank.gif" name="submit" id="submit" value="<?php _e('Get new password'); ?>" tabindex="100" /></p>
</form>
<div class="spacer_ver_medium"></div>

<ul>
<?php if (get_option('users_can_register')) : ?>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/"><?php _e('Log in') ?></a></li>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/?action=register"><?php _e('Register') ?></a></li>
	
<?php else : ?>
	
	<li><a href="<?php bloginfo('wpurl'); ?>/login/"><?php _e('Log in') ?></a></li>
<?php endif; ?>
</ul>
<?php get_footer(); ?>
<?
break;

case 'resetpass' :
case 'rp' :
	$key = preg_replace('/[^a-z0-9]/i', '', $_GET['key']);
	if ( empty( $key ) ) {
		wp_redirect('/login/?action=lostpassword&error=invalidkey');
		exit();
	}

	$user = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE user_activation_key = '$key'");
	if ( empty( $user ) ) {
		wp_redirect('/login/?action=lostpassword&error=invalidkey');
		exit();
	}

	do_action('password_reset');

	// Generate something random for a password... md5'ing current time with a rand salt
	$new_pass = substr( md5( uniqid( microtime() ) ), 0, 7);
	$wpdb->query("UPDATE $wpdb->users SET user_pass = MD5('$new_pass'), user_activation_key = '' WHERE user_login = '$user->user_login'");
	wp_cache_delete($user->ID, 'users');
	wp_cache_delete($user->user_login, 'userlogins');
	$message  = sprintf(__('username %s'), $user->user_login) . "\r\n";
	$message .= sprintf(__('password %s'), $new_pass) . "\r\n";
	$message .= get_option('siteurl') . "/login/\r\n";

	if (FALSE == wp_mail($user->user_email, sprintf(__('[%s] Your new password'), get_option('blogname')), $message)) {
		die('<p>' . __('The email could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') . '</p>');
	} else {
		// send a copy of password change notification to the admin
		$message = sprintf(__('Password Lost and Changed for user: %s'), $user->user_login) . "\r\n";
		wp_mail(get_option('admin_email'), sprintf(__('[%s] Password Lost/Changed'), get_option('blogname')), $message);

		wp_redirect('/login/?checkemail=newpass');
		exit();
	}
break;

case 'register' :
	if ( FALSE == get_option('users_can_register') ) {
		wp_redirect('/login/?registration=disabled');
		exit();
	}

	if ( $_POST ) {
		require_once( ABSPATH . WPINC . '/registration.php');

		$user_login = sanitize_user( $_POST['user_login'] );
		$user_email = apply_filters( 'user_registration_email', $_POST['user_email'] ); 
		$user_human = $_POST['user_human'];

		// Check the username
		if ( $user_login == '' )
			$errors['user_login'] = __('<strong>ERROR</strong>: Please enter a username.');
		elseif ( !validate_username( $user_login ) ) {
			$errors['user_login'] = __('<strong>ERROR</strong>: This username is invalid.  Please enter a valid username.');
			$user_login = '';
		} elseif ( username_exists( $user_login ) )
			$errors['user_login'] = __('<strong>ERROR</strong>: This username is already registered, please choose another one.');

		// Check the email address
		if ($user_email == '') {
			$errors['user_email'] = __('<strong>ERROR</strong>: Please type your email address.');
		} elseif ( !is_email( $user_email ) ) {
			$errors['user_email'] = __('<strong>ERROR</strong>: The email address isn&#8217;t correct.');
			$user_email = '';
		} elseif ( email_exists( $user_email ) )
			$errors['user_email'] = __('<strong>ERROR</strong>: This email is already registered, please choose another one.');

		do_action('register_post');

		$errors = apply_filters( 'registration_errors', $errors );

		if ( empty( $errors )) {
			$user_pass = substr( md5( uniqid( microtime() ) ), 0, 7);

			$securitycode = 'aksdf0983kfjsd934kld';
			$user_id = wp_create_user( $user_login, $user_pass, $user_email, $securitycode );
			
			// subscribe to mailing lists
			if ($_POST['mailinglist_general'] == 'on')
			{
				mail('ugaf-subscribe@ugaf.org', '', '', 'From: ' . $user_email);
			}
			if ($_POST['mailinglist_announce'] == 'on')
			{
				mail('ugaf-announce-subscribe@ugaf.org', '', '', 'From: ' . $user_email);
			}
			if ($_POST['mailinglist_jobs'] == 'on')
			{
				mail('ugaf-jobs-subscribe@ugaf.org', '', '', 'From: ' . $user_email);
			}
		
			if ( !$user_id )
				$errors['registerfail'] = sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !'), get_option('admin_email'));
			else {
				wp_new_user_notification($user_id, $user_pass);

				wp_redirect('/login/?checkemail=registered');
				exit();
			}
		}
	}

	login_header(__('Register new account'), 'A password will be emailed to you.');
?>

<form name="registerform" id="registerform" action="/login/?action=register" method="post">
	<p>
		<label><?php _e('username') ?></label>
		<input type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="25" tabindex="10" maxlenth="20" />
		<label><?php _e('email') ?></label>
		<input type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" tabindex="20" />
		<label><input type="checkbox" name="mailinglist_general" checked="checked" /> subscribe to the <a href="/forum">general discussion mailing list</a></label>
		<label><input type="checkbox" name="mailinglist_announce" checked="checked" /> subscribe to the <a href="/forum">announcements mailing list</a></label>
		<label><input type="checkbox" name="mailinglist_jobs" checked="checked" /> subscribe to the <a href="/employment">job announcement mailing list</a></label>
	</p>
<?php do_action('register_form'); ?>
	<!--<p id="reg_passmail"><?php _e('A password will be emailed to you.') ?></p>-->
	<p class="submit"><input class="button btn_register" type="image" src="/wp-content/themes/choke/images/blank.gif" name="submit" id="submit" value="<?php _e('Register'); ?>" tabindex="100" /></p>
</form>
<div class="spacer_ver_medium"></div>

<ul>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/"><?php _e('Log in') ?></a></li>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/?action=lostpassword" title="<?php _e('Password Lost and Found') ?>"><?php _e('Lost your password?') ?></a></li>
	
</ul>
<?php get_footer(); ?>
<?
break;

case 'login' :
default:
	$user_login = '';
	$user_pass = '';
	$using_cookie = FALSE;

	if ( !isset( $_REQUEST['redirect_to'] ) )
		$redirect_to = '/';
	else
		$redirect_to = $_REQUEST['redirect_to'];

	if ( $_POST ) {
		$user_login = $_POST['log'];
		$user_login = sanitize_user( $user_login );
		$user_pass  = $_POST['pwd'];
		$rememberme = $_POST['rememberme'];
	} else {
		$cookie_login = wp_get_cookie_login();
		if ( ! empty($cookie_login) ) {
			$using_cookie = true;
			$user_login = $cookie_login['login'];
			$user_pass = $cookie_login['password'];
		}
	}

	do_action_ref_array('wp_authenticate', array(&$user_login, &$user_pass));

	if ( $user_login && $user_pass && empty( $errors ) ) {
		$user = new WP_User(0, $user_login);

		// If the user can't edit posts, send them to their profile.
		if ( !$user->has_cap('edit_posts') && ( empty( $redirect_to ) || $redirect_to == 'wp-admin/' ) )
			$redirect_to = get_option('siteurl') . '/wp-admin/profile.php';

		if ( wp_login($user_login, $user_pass, $using_cookie) ) {
			if ( !$using_cookie )
				wp_setcookie($user_login, $user_pass, false, '', '', $rememberme);
			do_action('wp_login', $user_login);
			wp_redirect($redirect_to);
			exit();
		} else {
			if ( $using_cookie )
				$errors['expiredsession'] = __('Your session has expired.');
		}
	}
	
	if ( $_POST && empty( $user_login ) )
		$errors['user_login'] = __('<strong>ERROR</strong>: The username field is empty.');
	if ( $_POST && empty( $user_pass ) )
		$errors['user_pass'] = __('<strong>ERROR</strong>: The password field is empty.');

	// Some parts of this script use the main login form to display a message
	if		( TRUE == $_GET['loggedout'] )			$errors['loggedout']		= __('Successfully logged you out.');
	elseif	( 'disabled' == $_GET['registration'] )	$errors['registerdiabled']	= __('User registration is currently not allowed.');
	elseif	( 'confirm' == $_GET['checkemail'] )	$errors['confirm']			= __('Check your email for the confirmation link.');
	elseif	( 'newpass' == $_GET['checkemail'] )	$errors['newpass']			= __('Check your email for your new password.');
	elseif	( 'registered' == $_GET['checkemail'] )	$errors['registered']		= __('Registration complete. Please check your email.');

	login_header(__('Log in'));
?>

<form name="loginform" id="loginform" action="/login/" method="post">
	<p>
		<label><?php _e('username') ?></label>
		<input type="text" name="log" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" />
		<label><?php _e('password') ?></label>
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" />
	</p>
<?php do_action('login_form'); ?>
	<p><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> <?php _e('Remember me'); ?></label></p>
	<p class="submit">
		<input class="button btn_login" type="image" src="/wp-content/themes/choke/images/blank.gif" name="submit" id="submit" value="<?php _e('Log in'); ?>" tabindex="100" />
		<input type="hidden" name="redirect_to" value="<?php echo attribute_escape($redirect_to); ?>" />
	</p>
</form>
<div class="spacer_ver_medium"></div>

<ul>
<?php if (get_option('users_can_register')) : ?>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/?action=register"><?php _e('Register') ?></a></li>
	<li><a href="<?php bloginfo('wpurl'); ?>/login/?action=lostpassword" title="<?php _e('Password Lost and Found') ?>"><?php _e('Lost your password?') ?></a></li>
	
<?php else : ?>
	
	<li><a href="<?php bloginfo('wpurl'); ?>/login/?action=lostpassword" title="<?php _e('Password Lost and Found') ?>"><?php _e('Lost your password?') ?></a></li>
<?php endif; ?>
</ul>


<?php get_footer(); ?>
<?php
break;
} // end action switch
?>
