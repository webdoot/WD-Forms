<?php

/**
 * Handle [wdforms id='xx']
 */

add_shortcode( 'wdforms', 'wdfms_shortcode_handler'); 
function wdfms_shortcode_handler ($atts) { 

	if (!empty($atts)) {
		$id = trim($atts['id']);
		// get wdforms
		echo get_post($id)->post_content ;
	}
	else {
		echo 'Error: form is not correctly attached';
	}

 } 