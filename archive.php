<?php get_header(); ?>
		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<h3 class="first"><?php echo single_cat_title(); ?></h3>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h3 class="first"><?php the_time('F jS, Y'); ?></h3>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h3 class="first"><?php the_time('F, Y'); ?></h3>
			
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h3 class="first"><?php the_time('Y'); ?></h3>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h3 class="first"><?php the_author(); ?></h3>
			
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h3 class="first">Blog Archives</h3>

		<?php } ?>
		
			<?php while (have_posts()) : the_post(); ?>
				<?php include(TEMPLATEPATH . '/article.inc.php'); ?>
				
			<?php endwhile; ?>
			
			<?php include (TEMPLATEPATH . "/posts_nav_link.inc.php"); ?>	

		<?php else : ?>
		
			<h2>Not Found</h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>

		<?php endif; ?>

<?php get_footer(); ?>

