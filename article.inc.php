				<div class="article" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<ul class="whowhatwhere">
						<li><?php the_time('d M Y') ?></li>
						<li><a class="author" href="/author/<?php the_author_login(); ?>"><?php the_author() ?></a></li>
						<li><a class="comments" href="<?php comments_link(); ?>"><?php comments_number('0 responses', '1 response', '% responses'); ?></a></li>
						<?php
						if($user_level > 0) { 
							edit_post_link('edit', '<li>', '</li>');
						}
						?>

					</ul>
					<?php the_content(); ?>
<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				</div>