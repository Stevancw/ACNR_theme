<?php get_header(); ?>
			
			<div class="row">
				<div class="eightcol">
					<section>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class="page">
								<h1 class="heading"><?php echo $heading = get_post_meta($post->ID, 're_title', true); ?></h1>
								
								<?php the_content(); ?>
									
								<div class="clear"></div>
							</article>
						<?php endwhile; else: ?>
							<p>Sorry, there are currently no posts</p>
						<?php endif; ?>
					</section>
				</div>
			
				<?php get_sidebar(); ?>
			</div>
			
<?php get_footer(); ?>