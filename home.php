<?php get_header(); ?>
			
			<div class="row">
				<div class="eightcol">
					<?php $paged = get_query_var('paged');
						if ($paged < 2) {
						
							$args = array( 'post_type' => 'Issues', 'posts_per_page' => 1 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<ul class="featured-post">
									<?php if ( has_post_thumbnail() ) { ?>
								
									<li>
										<a href="#" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
									
										<a href="#" class="post-thumb"><?php the_post_thumbnail(); ?></a>
									</li>
									
									<?php } ?>
									
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2> Latest Issue: <?php the_title(); ?></h2></a>
									</li>
									
									<li class="cat">
										<p>Posted on <?php the_time('dS M Y'); ?></p>
									</li>
									
									<li class="date">
										<p>&nbsp;</p>
									</li>
																	
									<li>	
										<p><?php the_excerpt(); ?></p>
									</li>
								</ul>
							<?php endwhile; ?>
						<?php } ?>
					
					<div class="clear"></div>
						
					<?php $LastOnRow = 'last'; //Set a variable to alternate throught the posts ?>
							
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<?php if ($post->ID != $featured_ID) { ?>
							<?php if($LastOnRow == 'last') {
									$LastOnRow = '';
								} else {
									$LastOnRow = 'last';
								}
							 ?>
							
							<div class="sixcol <?php echo $LastOnRow; ?>">
								<ul class="post">
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
										<p>Posted on <?php the_time('dS M Y'); ?></p>
									</li>
										
									<li>
										<?php the_excerpt(); ?>
									</li>	
								</ul>
							</div>
						<?php } ?>
						
					<?php endwhile; else: ?>
						<p>Sorry, there are currently no posts</p>
					<?php endif; ?>
				
					<?php wp_pagenavi(); ?>
				</div>
			
				<?php get_sidebar(); ?>
				
				<p>page template: Home.php</p>
			</div>
			
<?php get_footer(); ?>