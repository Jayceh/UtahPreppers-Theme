<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<h1>forum archives</h1>

<h2>by Month</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>by Subject</h2>
	<ul>
		<?php wp_list_categories('orderby=name&prder=asc&style=list&hide_empty=1&use_desc_for_title=1hierarchical=0&title_li='); ?>
	</ul>


<?php get_footer(); ?>

