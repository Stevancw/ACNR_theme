<?php
	function add_custom_meta_boxes() {  
	  
	    // Define the custom attachment for posts  
	    add_meta_box(  
	        'wp_custom_attachment',  
	        'Attach PDF',  
	        'wp_custom_attachment',  
	        'post',  
	        'side'  
	    );  
	      
	    // Define the custom attachment for pages  
	    add_meta_box(  
	        'wp_custom_attachment',  
	        'Attach PDF',  
	        'wp_custom_attachment',  
	        'issue',  
	        'side'  
	    );  
	  
	} // end add_custom_meta_boxes  
	add_action('add_meta_boxes', 'add_custom_meta_boxes');


	function wp_custom_attachment() {  
	  
	    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');  
	      
	    $html = '<p class="description">';  
	        $html .= 'Upload your PDF here.';  
	    $html .= '</p>';  
	    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';  
	    
	    // Grab the array of file information currently associated with the post
	    $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
	      
	    // Create the input box and set the file's URL as the text element's value  
	    $html .= '<input type="text" id="wp_custom_attachment_url" name="wp_custom_attachment_url" value=" ' . $doc['url'] . '" size="30" />';  
	      
	    // Display the 'Delete' option if a URL to a file exists  
	    if(strlen(trim($doc['url'])) > 0) {  
	        $html .= '<a href="javascript:;" id="wp_custom_attachment_delete">' . __('Delete File') . '</a>';  
	    } // end if  
	      
	    echo $html;  
	  
	} // end wp_custom_attachment 
	
	function save_custom_meta_data($id) {  
	  
	    /* --- security verification --- */  
	    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {  
	      return $id;  
	    } // end if  
	        
	    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
	      return $id;  
	    } // end if  
	        
	    if('page' == $_POST['post_type']) {  
	      if(!current_user_can('edit_page', $id)) {  
	        return $id;  
	      } // end if  
	    } else {  
	        if(!current_user_can('edit_page', $id)) {  
	            return $id;  
	        } // end if  
	    } // end if  
	    /* - end security verification - */  
	      
	    // Make sure the file array isn't empty  
	    if(!empty($_FILES['wp_custom_attachment']['name'])) { 
	         
	        // Setup the array of supported file types. In this case, it's just PDF.  
	        $supported_types = array('application/pdf');  
	          
	        // Get the file type of the upload  
	        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));  
	        $uploaded_type = $arr_file_type['type'];  
	          
	        // Check if the type is supported. If not, throw an error.  
	        if(in_array($uploaded_type, $supported_types)) {  
	  
	            // Use the WordPress API to upload the file  
	            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));  
	      
	            if(isset($upload['error']) && $upload['error'] != 0) {  
	                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);  
	            } else {  
	                add_post_meta($id, 'wp_custom_attachment', $upload);  
	                update_post_meta($id, 'wp_custom_attachment', $upload);  
	                add_post_meta($id, 'wp_custom_attachment_url', $_POST['wp_custom_attachment_url']);
	                update_post_meta($id, 'wp_custom_attachment_url', $_POST['wp_custom_attachment_url']);     
	            } // end if/else  
	  
	        } else {  
	            wp_die("The file type that you've uploaded is not a PDF.");  
	        } // end if/else  
	          
	    } else {
	    	
	    	// Grab a reference to the file associated with this post  
	    	$doc = get_post_meta($id, 'wp_custom_attachment', true);  
	    	  
	    	// Grab the value for the URL to the file stored in the text element  
	    	$delete_flag = $_POST['wp_custom_attachment_url'];  
	    	  
	    	// Determine if a file is associated with this post and if the delete flag has been set (by clearing out the input box)  
	    	if(strlen(trim($doc['url'])) > 0 && strlen(trim($delete_flag)) == 0) {  
	    	  
	    	    // Attempt to remove the file. If deleting it fails, print a WordPress error.  
	    	    if(unlink($doc['file'])) {  
	    	          
	    	        // Delete succeeded so reset the WordPress meta data  
	    	        update_post_meta($id, 'wp_custom_attachment', null);  
	    	        update_post_meta($id, 'wp_custom_attachment_url', '');  
	    	          
	    	    } else {  
	    	        wp_die('There was an error trying to delete your file.');  
	    	    } // end if/el;se  
	    	      
	    	} // end if
	    
	    } // end if/else 
	} // end save_custom_meta_data  
	add_action('save_post', 'save_custom_meta_data');
	
	function update_edit_form() {  
	    echo ' enctype="multipart/form-data"';  
	} // end update_edit_form  
	add_action('post_edit_form_tag', 'update_edit_form');
	
	function add_custom_attachment_script() {  
	  
	    wp_register_script('custom-attachment-script', get_stylesheet_directory_uri() . '/js/custom_attachment.js');  
	    wp_enqueue_script('custom-attachment-script');  
	  
	} // end add_custom_attachment_script  
	add_action('admin_enqueue_scripts', 'add_custom_attachment_script');

?>