<?

///////////////////////////////////////
// Add Page Title Meta Box to Pages
///////////////////////////////////////
function thd_re_meta_box_fields() {
	$prefix = 're_';

	$fields = array(
		array(
			'label'	=> 'Title',
			'desc'	=> '',
			'id'		=> $prefix.'title',
			'type'	=> 'text'
		)
	);

	return $fields;
}

// Add meta box
add_action('admin_menu', 'thd_re_info_add_box');
function thd_re_info_add_box() {
    add_meta_box('re_info', 'Page Info', 'thd_re_info_show_box', 'page', 'side', 'high');
}
// Callback function to show fields in meta box
function thd_re_info_show_box() {
	thd_meta_box_callback(thd_re_meta_box_fields(), 'page');
}


// Save data from meta box
add_action('save_post', 'thd_re_info_save_data');
function thd_re_info_save_data($post_id) {
	thd_meta_box_save($post_id, thd_re_meta_box_fields(), 'page');
}

///////////////////////////////////////
// Add Issue Drop Down to link post to Article
///////////////////////////////////////
function thd_re_post_meta_box_fields() {
	$prefix = 're_';

	$fields = array(
		array( // Post ID select box
			'label'	=> 'Associated Issue', // <label>
			'id'	=>  $prefix.'assoc_issue_id', // field id and name
			'type'	=> 'post_list', // type of field
			'post_type' => array('issue') // post types to display, options are prefixed with their post type
		),
		
		array( // Repeatable & Sortable Text inputs
			'label'	=> 'References', // <label>
			'desc'	=> 'Click + to add multiple references', // description
			'id'	=> $prefix.'repeatable', // field id and name
			'type'	=> 'repeatable' // type of field
		),
		
		array( // Single checkbox
			'label'	=> 'Show Author Bio', // <label>
			'desc'	=> 'Tick to show author bio', // description
			'id'	=> $prefix.'show_author', // field id and name
			'type'	=> 'checkbox' // type of field
		),
		
		array( // Image ID field
			'label'	=> 'Author Thumbnail', // <label>
			'desc'	=> 'Upload author thumbnail image, 100px x 100px', // description
			'id'	=> $prefix.'author_thumb', // field id and name
			'type'	=> 'image' // type of field
		),
		
		array( // Text Input
			'label'	=> 'Author Name', // <label>
			'desc'	=> 'Insert author name here', // description
			'id'	=> $prefix.'author_name', // field id and name
			'type'	=> 'text' // type of field
		),
		
		array( // Text Input
			'label'	=> 'Author Url', // <label>
			'desc'	=> 'Insert author url here', // description
			'id'	=> $prefix.'author_url', // field id and name
			'type'	=> 'text' // type of field
		),
		
		array( // Textarea
			'label'	=> 'Author Bio', // <label>
			'desc'	=> 'A short bio for the author', // description
			'id'	=> $prefix.'author_bio', // field id and name
			'type'	=> 'textarea' // type of field
		)
	);

	return $fields;
}

// Add meta box
add_action('admin_menu', 'thd_re_post_info_add_box');
function thd_re_post_info_add_box() {
    add_meta_box('re_issue', 'Article Information', 'thd_re_post_info_show_box', 'post', 'side', 'high');
}
// Callback function to show fields in meta box
function thd_re_post_info_show_box() {
	thd_meta_box_callback(thd_re_post_meta_box_fields(), 'post');
}


// Save data from meta box
add_action('save_post', 'thd_re_post_info_save_data');
function thd_re_post_info_save_data($post_id) {
	thd_meta_box_save($post_id, thd_re_post_meta_box_fields(), 'post');
}
?>