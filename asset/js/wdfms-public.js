
// admission form image uploader
function amfmURL(input) {
    if (input.files && input.files[0]) {
    	// check file size
    	if (input.files[0].size > 200000) {
    		jQuery('#amfm_error').html('<span class="dashicons dashicons-dismiss"></span> Size ' + input.files[0].size/1000 + ' Kb');
    		jQuery('#amfm_photo').attr('src', '/school/wp-content/plugins/wd-forms/asset/images/default-image.png');
    		// reset input
    		jQuery(input).val('');
    	}
    	else {
    		var reader = new FileReader();
	        reader.onload = function (e) {
	            jQuery('#amfm_photo').attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
    	}
    }
}