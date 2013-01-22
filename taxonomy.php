<?php get_header(); ?>
			
			<div class="row">
				<div class="eightcol">
					<section>
						<?php query_posts(array('post_type' => 'issue')); ?>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>							
							<div class="twelvecol">
								<article class="issue">
									<ul>
										<?php if ( has_post_thumbnail() ) { ?>
										
										<li>
											<a href="#" class="download">
												<img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" />
											</a>
												
											<a href="#" class="post-thumb"><?php the_post_thumbnail(); ?></a>
										</li>	
										
										<?php } ?>
										
										<li>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<h2><?php the_title(); ?></h2>
											</a>
										</li>
											
										<li class="date">
											<p>Published on <?php the_time('dS M Y'); ?></p>
										</li>
											
										<li class="clear">
											<?php the_excerpt(); ?>
										</li>	
									</ul>
								</article>
							</div>
							
						<?php endwhile; else: ?>
							<p>Sorry, there are currently no posts</p>
						<?php endif; ?>
					
						<?php wp_pagenavi(); ?>
						
						<p>Taxonomy.php</p>
					</section>
				</div>
			
				<?php get_sidebar(); ?>
			</div>
			
<?php get_footer(); ?>