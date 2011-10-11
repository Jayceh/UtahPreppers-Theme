<?php
$page_type = 'single';
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="main main_home">	
			<?php include(TEMPLATEPATH . '/article.inc.php'); ?>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
