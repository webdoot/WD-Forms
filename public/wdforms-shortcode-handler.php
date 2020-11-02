<?php

/**
 * Handle [wdforms id="post_id"]
 */

add_shortcode( 'wdfms_form', 'wdfms_shortcode_handler');
function wdfms_shortcode_handler ($atts) { 

	if (!empty($atts)) {
		$id = trim($atts['id']);

		// assign form_id when shortcode used
		$_SESSION['wdfms']['form_id'] = $id;		
		
		// content
		return get_post_field( 'post_content', $id );		
	}
	else {
		echo 'Error: form is not correctly attached';
	}

 } 