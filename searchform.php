<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php if(isset($s)) { echo wp_specialchars($s,1); } ?>" name="s" id="s" placeholder="What are you looking for?" />
	<input type="submit" id="search-submit" class="button" value="Search" />
</form>