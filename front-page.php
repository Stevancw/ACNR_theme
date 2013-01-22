<?php get_header(); ?>
			
			<div class="row">
				<div class="eightcol">
					<section>
						<?php $paged = get_query_var('paged'); if ($paged < 2) {
							$args = array( 'post_type' => 'Issue', 'posts_per_page' => 1 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<article class="issue">
									<ul>
										<?php if ( has_post_thumbnail() ) { ?>
									
										<li class="featured-image">
											<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
											if(!empty($doc)) {
												if(strlen(trim($doc['url'])) > 0) {  ?>
											    	<a href="<?php echo $doc['url']; ?>" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
												<?php } // end if  ?>
											<?php } ?>
										
											<a href="<?php the_permalink(); ?>" class="post-thumb"><?php the_post_thumbnail(); ?></a>
										</li>
										
										<?php } ?>
										
										<li>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<h2> Latest Issue: <?php the_title(); ?></h2>
											</a>
										</li>
										
										<li class="date">
											<p>Published on <?php the_time('jS M Y'); ?></p>
										</li>
																		
										<li>	
											<?php the_excerpt(); ?>
										</li>
									</ul>
								</article>
							<?php endwhile; ?>
						<?php } ?>
					</section>
					
					<div class="clear"></div>
					
					<section>	
						<?php $LastOnRow = 'last'; //Set a variable to alternate through the posts ?>
								
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<?php if($LastOnRow == 'last') {
								$LastOnRow = '';
							} else {
								$LastOnRow = 'last';
							}
						?>
								
						<div class="sixcol <?php echo $LastOnRow; ?>">
							<article class="article">
								<ul>
								<?php if ( has_post_thumbnail() ) { ?>
									<li li class="featured-image">
										<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
										if(!empty($doc)) {
											if(strlen(trim($doc['url'])) > 0) {  ?>
												<a href="<?php echo $doc['url']; ?>" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
											<?php } // end if  ?>
										<?php } ?>
												
										<a href="<?php the_permalink(); ?>" class="post-thumb"><?php the_post_thumbnail(); ?></a>
									</li>
								<?php } ?>
											
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<h5><?php the_title(); ?></h5>
										</a>
									</li>
												
									<li class="cat">
										<p>Posted in <?php the_category(','); ?></p>
									</li>
												
									<li class="date">
										<p><?php the_time('jS M Y'); ?></p>
									</li>
												
									<li class="clear">
										<?php the_excerpt(); ?>
									</li>	
								</ul>
							</article>
						</div>
							
						<?php endwhile; else: ?>
							<article>
								<p>Sorry, there are currently no posts</p>
							</article>
						<?php endif; ?>
						
						<div class="clear"></div>
						
						<?php wp_pagenavi(); ?>
					</section>
				</div>
			
				<?php get_sidebar(); ?>
			</div>
			
<?php get_footer(); ?>