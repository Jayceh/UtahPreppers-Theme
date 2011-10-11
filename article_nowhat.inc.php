				<div class="article" id="post-<?php the_ID(); ?>">
					<h2><?php the_title(); ?></h2>
					<a href="<?php the_permalink() ?>" class="datetime"><?php the_time('l, j F Y @ G:i') ?></a>
					<?php the_content('&hellip;'); ?>
				</div>