<?php
/*
Template Name: Members
*/
?>

<?php get_header(); ?>
		<h1>Members</h1>
		<p>The following is a directory of UPHPU members. Those 
		with one ore more posts in the forum receive a link to their 
		profile. You may change what is shown here by editing your <a href="/account/">profile</a>.</p>
		<hr />
		<table class="tabular_data width_max">
		<thead>
			<tr>
				<th></th>
				<th>name</th>
				<th>website</th>
				<th>IRC nick</th>
			</tr>
		</thead>
		<tbody>
		<?php roster(TRUE, TRUE, TRUE, FALSE); ?>
		</tbody>
		</table>
		<div class="clear spacer_ver_medium"></div>

<?php get_footer(); ?>

