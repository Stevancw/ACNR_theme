<!doctype html>
<html lang="en">
    
    <head>
    	<!--=== META TAGS ===-->
    	<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
    	<meta charset="<?php bloginfo( 'charset' ); ?>" />  
    	<meta name="description" content="Keywords">  
    	<meta name="author" content="Name">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	
    	<!--=== LINK TAGS ===-->  
    	<link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/favicon.png" />  
    	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />  
    	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
    	
    	<!--=== 1140px Grid styles for IE ===-->
    	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo THEME_DIR; ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->
    
    	<!--=== The 1140px Grid - http://cssgrid.net/ ===-->
    	<link rel="stylesheet" href="<?php echo THEME_DIR; ?>/css/1140.css" type="text/css" media="screen" />
    	    	    	
    	<!--=== TITLE ===-->
    	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    	    	
    	<!--=== WP_HEAD() ===-->
    	<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
    	<?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>
    	<div class="container">
    		<header>
		    	<div class="row">
		    		<div class="eightcol">
		    		</div>
		    		
		    		<div class="fourcol last">
		    			<div class="social-icons">
		    				<a href="http://www.facebook.com/pages/ACNR/187100901434330" title="facebook" class="facebook"></a>
		    				<a href="https://twitter.com/ACNRjournal" title="twitter" class="twitter"></a>
		    				<!--<a href="#" title="delicious" class="delicious"></a>-->
		    				<!--<a href="#" title="pintrest" class="pintrest"></a>-->
		    				<!--<a href="#" title="rss" class="rss"></a>-->
		    				<a href="Mailto:Rachael@acnr.co.uk" title="email" class="email"></a>
		    			</div>
		    		</div>
		    	</div>
		    	
		    	<div class="row">
		    		<div class="sixcol">
		    			<div class="header-left">
		    				<a href="<?php bloginfo('url'); ?>" class="logo"></a>
		    			</div>
		    		</div>
		    		
		    		<div class="sixcol last header-ad">
		    			<?php if(!function_exists('dynamic_sidebar') 
		    				|| !dynamic_sidebar('Header Advert') ) : ?>
		    			<?php endif; ?>
		    		</div>
		    	</div>
		    </header>
		</div>
		
		<div class="container nav-container">	
		    <div class="row">
		    	<div class="twelevecol">
		    		<nav id="main-navigation">
		    			<?php wp_nav_menu(array('theme_location' => 'main-nav', 'container' => 'none')); ?>
		    		</nav>
		    	</div>
		    </div>
		</div>
		
		<div class="clear"></div>
		
		<div class="container">
