<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<h3>results</h3>

		<?php while (have_posts()) : the_post(); ?>

			<?php include(TEMPLATEPATH . '/article_brief.inc.php'); ?>

		<?php endwhile; ?>
		<?php include (TEMPLATEPATH . "/posts_nav_link.inc.php"); ?>

	<?php else : ?>

		<h3>results</h3>
		<p>No matches were found.</p>
		<div class="spacer_ver_medium"></div>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
<?php get_footer(); ?>

