    	</div> <!-- End Container DIV -->
    	
    	<footer class="footer">
    		<div class="container">
    			<div class="row">
	    			<div class="threecol">
	    				<?php if(!function_exists('dynamic_sidebar') 
	    					|| !dynamic_sidebar('Footer Column 1') ) : ?>
	    				<?php endif; ?>
	    			</div>
	    			
	    			<div class="threecol">
	    				<?php if(!function_exists('dynamic_sidebar') 
	    					|| !dynamic_sidebar('Footer Column 2') ) : ?>
	    				<?php endif; ?>
	    			</div>
	    			
	    			<div class="threecol">
	    				<?php if(!function_exists('dynamic_sidebar') 
	    					|| !dynamic_sidebar('Footer Column 3') ) : ?>
	    				<?php endif; ?>
	    			</div>
	    			
	    			<div class="threecol last">
	    				<?php if(!function_exists('dynamic_sidebar') 
	    					|| !dynamic_sidebar('Footer Column 4') ) : ?>
	    				<?php endif; ?>
	    			</div>
	    		</div>
	    	</div>
	    </footer>
	    
	    <footer class="lower-footer">
	    	<div class="container">
	    		<div class="row">
	    			<div class="sixcol">
	    				<p>Copyright &copy; 2012 ACNR<br />
	    				Created by <a href="http://purpleboxmedia.co.uk" title="Purplebox Media">Purplebox Media</a></p>
	    			</div>
	    			
	    			<div class="sixcol last">
	    				<?php wp_nav_menu(array('theme_location' => 'footer-nav')); ?>	    			
	    			</div>
	    		</div>
	    		
	    		<div class="clear"></div>
    		</div>
    	</footer>
    	
    	<div id="fb-root"></div>
    	<script>(function(d, s, id) {
    	  var js, fjs = d.getElementsByTagName(s)[0];
    	  if (d.getElementById(id)) return;
    	  js = d.createElement(s); js.id = id;
    	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=209737252420817";
    	  fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));
    	</script>
    	
    	<script>
    		$(function () {
    			$('.sub-menu').each(function () {
    				$(this).parent().eq(0).hover(function () {
    					$('.sub-menu:eq(0)', this).show();
    				}, function () {
    					$('.sub-menu:eq(0)', this).hide();
    				});
    			});
    		});
    	</script>
	</body>
<?php wp_footer(); ?>
</html>