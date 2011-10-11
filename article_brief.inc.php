				<div class="article" id="post-<?php the_ID(); ?>">
					<h2><?php the_title(); ?></h2>
					<a href="<?php the_permalink() ?>" class="datetime"><?php the_time('l, j F Y @ G:i') ?></a>
					<div class="spacer_ver_small"></div>
					<ul class="whowhatwhere">
						<li><a class="author" href="/author/<?php the_author_login(); ?>"><?php the_author() ?></a></li>
						<li><a class="comments" href="<?php comments_link(); ?>"><?php comments_number('0 responses', '1 response', '% responses'); ?></a></li>
						<li><a class="category">&nbsp;</a><?php the_category(', ') ?></li>
						<?php edit_post_link('edit', '<li>', '</li>'); ?>
					</ul>
				</div>