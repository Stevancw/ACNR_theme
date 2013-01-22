<?php if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) dies ('Please do not load this page directly');
	    
	if(!empty($post->post_password)) {
		if($_COOKIE['wp-postpass' . COOKIEHASH] != $post->post_password) { ?>
	    	<h2>This post is password protected</h2>
	        <p>Please enter the password to view comments.</p>
		
			<?php return;
	  	}
	} ?>
	
	<div class="comments-container">
		<?php if($comments) : ?> 
			<?php if(have_comments()) : ?>    
		   		<h2>Comments</h2>
		                    
		       	<ul class="commentlist">
		        	<?php wp_list_comments('type=comment&avatar_size=80'); ?>
		        </ul>
		    <?php endif; ?>
		<?php else : ?>
	        
		<?php if($post->comment_status == 'open') : ?>
		            
			<h2>Comments</h2>
		     
		  	<div>
		    	<p>There are no comments yet, add one below</p>
		    </div>
		<?php else : ?>
		   	<div>
		    	<p>Comments are closed</p>
		    </div>
		<?php endif; ?>
	</div>
	
<?php endif; ?>
	            
<?php if($post->comment_status == 'open') : ?>
	<h2>Leave a comment</h2>
	
		<article id="respond">
		    <?php if(get_option('comment_registration') && !$user_ID) : ?>
		    	<p>You must be <a href="<?php bloginfo('url'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
		   	<?php else : ?>
		    	<p class="bold">Your email is never published nor shared. Required fields are marked *</p>
		
		        <form id="comment-form" action="<?php bloginfo('url'); ?>/wp-comments-post.php" method="POST" class="comments">
		        	<?php comment_id_fields(); ?>
		            <?php if($user_ID) : ?>
		                
		            	<p class="logged-in-as">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>, <a href="<?php echo wp_logout_url(); ?>" title="log out of this account" class="logout">Logout</a></p>
		                	
		         	<?php else : ?>
		            	<fieldset>
		                	<label for="author">Name <?php if($req) echo "*"; ?></label>
		                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Name" />
		               	</fieldset>
		
		                <fieldset>
		                	<label for="email">Email <?php if($req) echo "*"; ?></label>
		                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Email" />
		                </fieldset>
		
		                <fieldset>
		                	<label for="url">Website</label>
		                	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Url" />
		                </fieldset>
		      		<?php endif; ?>
	
	                	<fieldset>
	                    	<label for="data">Comment <?php if($req) echo "*"; ?></label>
	                        <textarea name="comment" id="data" tabindex="4" placeholder="Message"></textarea>
	                    </fieldset>
	
	                    <p>You may use these HTML tags and attributes: <span class="code">&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt;</span></p>
	
	                	<p><strong>Comment moderation is enabled. Your comment may take some time to appear.</strong></p>
	
	                    <fieldset>
	                    	<div id="cancel-comment-reply" class="cancel-reply"><?php cancel_comment_reply_link() ?></div>
	                    	<input type="submit" id="submit" class="button float-right" tabindex="5" value="Submit Comment" />
	                        <?php do_action('comment_form', $post->ID); ?>
	                  	</fieldset>
	            	</form>
	        	<?php endif; ?>
	   		</article>
<?php endif; ?>