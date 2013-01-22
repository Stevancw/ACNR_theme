<?php get_header(); ?>
			
			<div class="row">
				<div class="eightcol">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<section>
							<article class="page">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="featured-image">
										<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
										if(!empty($doc)) {
											if(strlen(trim($doc['url'])) > 0) {  ?>
												<a href="<?php echo $doc['url']; ?>" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
											<?php } // end if  ?>
										<?php } ?>
												
										<a href="<?php the_permalink(); ?>" class="post-thumb"><?php the_post_thumbnail(); ?></a>
									</div>
								<?php } ?>
							
								<h2><?php the_title(); ?></h2>
								
								<?php if(get_post_type($post->ID) != 'issue') { ?>
									<p class="date">Posted in <?php the_category(','); ?> on <?php the_time('jS M Y'); ?></p>
								<?php } else { ?>
									<p class="date">Published on <?php the_time('jS M Y'); ?></p>
								<?php } ?>
								
								<?php if(get_post_type($post->ID) != 'issue') { ?>
									<?php $showAuthor = get_post_meta($post->ID, 're_show_author', true);
									if ($showAuthor == 'on') { ?>
										<div class="author-bio">
											<h2>Author</h2>
											 
											 <?php $custom_image = get_post_meta($post->ID, 're_author_thumb', true); 
											 echo wp_get_attachment_image($custom_image, 'thumbnail'); ?>
											
											<a href="http://<?php echo $author = get_post_meta($post->ID, 're_author_url', true); ?>">
												<h3><?php echo $author = get_post_meta($post->ID, 're_author_name', true); ?></h3>
											</a>
												
											<p><?php echo $authorbio = get_post_meta($post->ID, 're_author_bio', true); ?></p>
										</div>
									<?php } ?>
								<?php } ?>
														
								<?php the_content(); ?>
								
								<div class="clear"></div>
								
								<?php if(get_post_type($post->ID) != 'issue') {
									$references = get_post_meta($post->ID, 're_repeatable', true);
									
									if(!empty($references) && array_filter($references)) {
										echo '<h3>References</h3>';
									
										echo '<ol class="references">';  
											foreach ($references as $string) {  
										    	echo '<li>' . $string . '</li>';  
											}  
										echo '</ol>';
									}
								} ?>
								
								<div class="clear"></div>
								
								<?php
								if(!empty($doc)) {
									if(strlen(trim($doc['url'])) > 0) {  ?>
								    	<a href="<?php echo $doc['url']; ?>" class="download-large">Download this 
								    		<?php if(get_post_type($post->ID) == 'issue') { ?>Issue<?php } ?>
								    		<?php if(get_post_type($post->ID) != 'issue') { ?>Article<?php } ?>
								    	</a>
									<?php } // end if  ?>
								<?php } ?>
								
								<?php if(has_tag()) { ?>
								<div class="tags">
									<?php the_tags('Tags: ','',''); ?>
								</div>
								<?php } ?>
																
								<div class="clear"></div>
							</article>
						</section>	
						
						<?php if(get_post_type($post->ID) != 'issue') { ?>
							<section>
								<?php comments_template( '', true ); ?>
							</section>
						<?php } ?>
					<?php endwhile; endif; ?>
					
					
					<?php if(get_post_type($post->ID) == 'issue') { ?>
						<section class="assoc-articles">
							<h2>Articles in this issue</h2>
								
							<?php $LastOnRow = 'last'; //Set a variable to alternate through the posts ?>
								
							<?php query_posts(array('meta_key'=>'re_assoc_issue_id',
								'meta_value'=> $wp_query->post->ID,
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'caller_get_posts'=> 1)); ?>		
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
											
											<li>
												<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
												if(!empty($doc)) {
													if(strlen(trim($doc['url'])) > 0) {  ?>
												    <a href="<?php echo $doc['url']; ?>" class="download"><img src="<?php echo THEME_DIR; ?>/images/arrow-down.png" alt="Download" /></a>
													<?php } ?>
												<?php } // end if  ?>
													
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
								<p>There are currently no articles associated with this issue</p>
							<?php endif; ?>
						</section>
					<?php } ?>
				</div>
			
				<?php get_sidebar(); ?>
			</div>
			
<?php get_footer(); ?>