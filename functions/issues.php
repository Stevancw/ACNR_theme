<?php
///////////////////////////////////////
// Add custom post type for issues
///////////////////////////////////////
function register_issues_custom_post() {
    register_post_type(
   		'issue',
    	array( 
        	'labels' => post_type_labels('Issue'),
        	'hierarchical' => false,
        	
        	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        	'taxonomies' => array( 'post_tag' ),
        	'public' => true,
        	'show_ui' => true,
        	'show_in_menu' => true,
        	
        	'show_in_nav_menus' => true,
        	'publicly_queryable' => true,
        	'exclude_from_search' => true,
        	'has_archive' => true,
        	'query_var' => true,
        	'can_export' => true,
        	'rewrite' => true,
        	'menu_position' => 5,
        	'capability_type' => 'post'
    	)
    );
}
add_action( 'init', 'register_issues_custom_post' );

///////////////////////////////////////
// Add custom meta boxes for issues
///////////////////////////////////////

//CODE GOES HERE

///////////////////////////////////////
// Add custom taxonomies for issues
///////////////////////////////////////
function build_issue_taxonomies() {
	// create a new taxonomy
	register_taxonomy(
		'volume',
		'issue',
		array(
			'label' => __( 'Volumes' ),
			'rewrite' => array( 'slug' => 'volumes' )
		)
	);
}
add_action( 'init', 'build_issue_taxonomies' );
?>