<?php
	/*
		Template Name: Categories
	*/
?>

<?php get_header(); ?>
			
			<div class="row">			
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="threecol">
						<div class="category-block">
							<h2>Categories</h2>
								<ul class="categories-left">
									<?php wp_list_categories('hide_empty=0&title_li=&depth=1&exclude=1'); ?>
								</ul>
						</div>
					</div>
					
					<div class="ninecol last">
						<?php
							$count = 1;
							$terms = apply_filters( 'taxonomy-images-get-terms', '' );
							if ( ! empty( $terms ) ) {
							    foreach( (array) $terms as $term ) { ?>
							    	<div class="fourcol<?php if($count == 3) { echo ' last'; $count = 0; } ?>">
							    		<div class="category-block">   
							        		<?php echo '<a href="' . esc_url( get_term_link( $term, $term->taxonomy ) ) . '">'
							        		. wp_get_attachment_image( $term->image_id, 'large' ); ?>
							        		<span><?php echo $term->name; ?></span>
							        		</a>
							       		</div>
							       	</div>
							    	<?php $count++; ?>
							    <?php } ?>
							<?php } ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
			
<?php get_footer(); ?>