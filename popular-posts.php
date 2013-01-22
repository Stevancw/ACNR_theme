<article>
	<div class="widgettitle"><h5>Popular Articles</h5></div>

	<ul id="popularPosts">
		<?php query_posts('showposts=3&orderby=comment_count');?>
		<?php while ( have_posts() ) : the_post(); ?>
		<li>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    <p><?php echo get_the_date('d M Y');?></p>
		</li>
		    <?php endwhile; // End the loop ?>
	</ul>
</article>