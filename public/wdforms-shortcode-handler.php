<?php

/**
 * Handle [wdforms id="post_id"]
 */

add_shortcode( 'wdfms_form', 'wdfms_shortcode_handler'); 
function wdfms_shortcode_handler ($atts) { 

	if (!empty($atts)) {
		$id = trim($atts['id']);
		// get wdforms
		// echo get_post($id)->post_content ;
		echo get_post_field( 'post_content', $id );
 ;
	}
	else {
		echo 'Error: form is not correctly attached';
	}

 } 