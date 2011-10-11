<?php get_header(); ?>
<?php if (is_home()) :?>
<!-- HomePage_Header -->
<script type='text/javascript'>
GA_googleFillSlot("HomePage_Header");
</script>

<?php endif;?>
	<?php if (have_posts()) : ?>

		<?php rewind_posts(); ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php include(TEMPLATEPATH . '/article.inc.php'); ?>
		<?php endwhile; ?>
		
		<?php include (TEMPLATEPATH . "/posts_nav_link.inc.php"); ?>
	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

<?php get_footer(); ?>