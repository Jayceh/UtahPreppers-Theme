<?php
/*
Template Name: Post
*/
?>

<?php get_header(); ?>

<?php
require('/wp-admin/admin.php');
$title = __('Create New Post');
$parent_file = '/wp-admin/post-new.php';
$editing = true;
wp_enqueue_script('prototype');
wp_enqueue_script('autosave');
?>

<form name="post" action="/wp-admin/post.php" method="post" id="post">

<div class="wrap">
<?php

if (0 == $post_ID) {
	$form_action = 'post';
	$temp_ID = -1 * time(); // don't change this formula without looking at wp_write_post()
	$form_extra = "<input type='hidden' id='post_ID' name='temp_ID' value='$temp_ID' />";
	wp_nonce_field('add-post');
} else {
	$form_action = 'editpost';
	$form_extra = "<input type='hidden' id='post_ID' name='post_ID' value='$post_ID' />";
	wp_nonce_field('update-post_' .  $post_ID);
}

?>

<input type="hidden" name="user_ID" value="<?php echo $user_ID ?>" />
<input type="hidden" id="hiddenaction" name="action" value="<?php echo $form_action ?>" />
<input type="hidden" id="originalaction" name="originalaction" value="<?php echo $form_action ?>" />
<input type="hidden" name="post_author" value="<?php echo $post->post_author ?>" />
<input type="hidden" id="post_type" name="post_type" value="post" />

<?php echo $form_extra ?>

<div id="poststuff">

<div id="moremeta">
<div id="grabit" class="dbx-group">

<fieldset id="categorydiv" class="dbx-box">
<h3 class="dbx-handle"><?php _e('Categories') ?></h3>
<div class="dbx-content">
<p id="jaxcat"></p>
<ul id="categorychecklist"><?php dropdown_categories(); ?></ul></div>
</fieldset>

<?php //if ( current_user_can('edit_posts') ) : ?>
<!--<fieldset id="posttimestampdiv" class="dbx-box">
<h3 class="dbx-handle"><?php _e('Post Timestamp'); ?>:</h3>
<div class="dbx-content"><?php touch_time(($action == 'edit')); ?></div>
</fieldset>-->
<?php //endif; ?>
<?php do_action('dbx_post_sidebar'); ?>

</div>
</div>

<fieldset id="titlediv">
	<legend><?php _e('Title') ?></legend>
	<div><input type="text" name="post_title" size="30" tabindex="1" value="<?php echo $post->post_title; ?>" id="title" /></div>
</fieldset>

<fieldset id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>">
<legend><?php _e('Post') ?></legend>

	<?php the_editor($post->post_content); ?>
</fieldset>

<?php do_action('edit_form_advanced'); ?>

</div>
</div>
</div>
</form>


<?php get_middle(); ?>
<?php get_footer(); ?>

