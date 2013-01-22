<?php 

///////////////////////////////////////
//Define Commonly Used Absolute Urls
///////////////////////////////////////
define("THEME_DIR", get_template_directory_uri());  

///////////////////////////////////////
// Remove Generator Meta Tag
///////////////////////////////////////  
remove_action('wp_head', 'wp_generator');  
  
///////////////////////////////////////
// Enqueue Styles
/////////////////////////////////////// 
function enqueue_styles() {  
  
    /** REGISTER css/screen.css **/  
    wp_register_style( 'screen-style', THEME_DIR . '/style.css', array(), '1', 'all' );  
    wp_enqueue_style( 'screen-style' );
  
}  
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

add_editor_style();
  
///////////////////////////////////////
// Enqueue Scripts
///////////////////////////////////////
function enqueue_scripts() {

	/** REGISTER jQuery **/
	wp_register_script( 'jQuery-1.6.2', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array( 'jquery' ), '1', false );  
	wp_enqueue_script( 'jQuery-1.6.2' );
  
    /** REGISTER HTML5 Shim **/  
    wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );  
    wp_enqueue_script( 'html5-shim' );
	  
    /** REGISTER CSS3 media queries **/
    wp_register_script( 'css3-mediaqueries', THEME_DIR . '/js/css3-mediaqueries.js', array( 'jquery' ), '1', false );  
    wp_enqueue_script( 'css3-mediaqueries' );
    
    /** REGISTER Mobile Menu **/
    wp_register_script( 'dropdown-nav', THEME_DIR . '/js/dropdown-nav.js', array( 'jquery' ), '1', false );  
    wp_enqueue_script( 'dropdown-nav' );
  
}  
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

///////////////////////////////////////
// Enable WordPress Featured Image
///////////////////////////////////////
add_theme_support( 'post-thumbnails');

///////////////////////////////////////
// Remove Autoformatters
///////////////////////////////////////
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

///////////////////////////////////////
// Register Custom Menu Function
///////////////////////////////////////
if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
		'main-nav' => __( 'Main Navigation' ),
		'footer-nav' => __( 'Footer Navigation' )
	) );
}

///////////////////////////////////////
// Include Widgets
///////////////////////////////////////
include_once 'functions/widgets.php';

///////////////////////////////////////
// Include Shortcodes
///////////////////////////////////////
include_once 'functions/shortcodes.php';

///////////////////////////////////////
// Include Page Custom Meta
///////////////////////////////////////
include_once 'functions/meta-data.php';

///////////////////////////////////////
// Helper function for generating labels
///////////////////////////////////////
function post_type_labels( $singular, $plural = '' )
{
    if( $plural == '') $plural = $singular .'s';
   
    return array(
        'name' => _x( $plural, 'post type general name' ),
        'singular_name' => _x( $singular, 'post type singular name' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New '. $singular ),
        'edit_item' => __( 'Edit '. $singular ),
        'new_item' => __( 'New '. $singular ),
        'view_item' => __( 'View '. $singular ),
        'search_items' => __( 'Search '. $plural ),
        'not_found' =>  __( 'No '. $plural .' found' ),
        'not_found_in_trash' => __( 'No '. $plural .' found in Trash' ),
        'parent_item_colon' => ''
    );
}

///////////////////////////////////////
// Rename posts to articles
///////////////////////////////////////
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Articles';
    $submenu['edit.php'][5][0] = 'Articles';
    $submenu['edit.php'][10][0] = 'Add Article';
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
   	$labels = &$wp_post_types['post']->labels;
    $labels->name = 'Articles';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Articles';
    $labels->new_item = 'Article';
    $labels->view_item = 'View Article';
    $labels->search_items = 'Search Articles';
   	$labels->not_found = 'No Articles found';
    $labels->not_found_in_trash = 'No Articles found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

///////////////////////////////////////
// Include Custom Post And Meta Boxes
///////////////////////////////////////
include_once 'functions/meta_box.php';
include_once 'functions/issues.php';
include_once 'functions/upload-meta.php';

///////////////////////////////////////
// Remove feature from category list
///////////////////////////////////////
function the_category_filter($thelist,$separator=' ') {  
    if(!defined('WP_ADMIN')) {  
        //Category Names to exclude  
        $exclude = array('Uncategorized', 'Featured');  
  
        $cats = explode($separator,$thelist);  
        $newlist = array();  
        foreach($cats as $cat) {  
            $catname = trim(strip_tags($cat));  
            if(!in_array($catname,$exclude))  
                $newlist[] = $cat;  
        }  
        return implode($separator,$newlist);  
    } else {  
        return $thelist;  
    }  
}  
add_filter('the_category','the_category_filter', 10, 2);

///////////////////////////////////////
// Include custom posts in search
///////////////////////////////////////
function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'issue'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');