jQuery(function($) {  
  
    // Check to see if the 'Delete File' link exists on the page...  
    if($('a#wp_custom_attachment_delete').length === 1) {  
  
        // Since the link exists, we need to handle the case when the user clicks on it...  
        $('#wp_custom_attachment_delete').click(function(evt) {  
          
            // We don't want the link to remove us from the current page  
            // so we're going to stop it's normal behavior.  
            evt.preventDefault();  
              
            // Find the text input element that stores the path to the file  
            // and clear it's value.  
            $('#wp_custom_attachment_url').val('');  
              
            // Hide this link so users can't click on it multiple times  
            $(this).hide();  
          
        });  
      
    } // end if  
  
});

//jQuery for reusable custom meta boxes
jQuery(function(jQuery) {

	jQuery('#media-items').bind('DOMNodeInserted',function(){
		jQuery('input[value="Insert into Post"]').each(function(){
				jQuery(this).attr('value','Use This Image');
		});
	});

	jQuery('.custom_upload_image_button').click(function() {
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_image');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			classes = jQuery('img', html).attr('class');
			id = classes.replace(/(.*?)wp-image-/, '');
			formfield.val(id);
			preview.attr('src', imgurl);
			tb_remove();
		}
		return false;
	});

	jQuery('.custom_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
		jQuery(this).parent().siblings('.custom_upload_image').val('');
		jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
		return false;
	});

	jQuery('.repeatable-add').click(function() {
		field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
		fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
		jQuery('textarea', field).val('').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		})
		field.insertAfter(fieldLocation, jQuery(this).closest('td'))
		return false;
	});

	jQuery('.repeatable-remove').click(function(){
		jQuery(this).parent().remove();
		return false;
	});

	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});

});