<?php $paged = get_query_var('paged');
	if ($paged < 2) { ?>
		<?php 
			$featured = new WP_Query();
			$featured->query('showposts=1');
			while($featured->have_posts()) : $featured->the_post();
			
				$wp_query->in_the_loop = true;
				$featured_ID = $post->ID;			
				?>
		
		
			<div class="twelvecol">
				<ul class="featured-post">
					<?php if ( has_post_thumbnail() ) { ?>
					
					<li>
						<a href="#" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
						
						<a href="#" class="post-thumb"><?php the_post_thumbnail(); ?><a/>
					</li>	
						
					<?php } ?>
					
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
					</li>
							
					<li class="cat">
						<p>Posted in <?php the_category(','); ?></p>
					</li>
							
					<li class="date">
						<p>Posted on <?php the_date('dS M Y'); ?></p>
					</li>
							
					<li>
						<?php the_content('read more'); ?>
					</li>	
				</ul>
			</div>
		<?php endwhile; ?>
<?php } ?>