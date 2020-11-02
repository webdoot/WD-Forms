<?php

/**
 * Handle [wdforms id="post_id"]
 */

add_shortcode( 'wdfms_form', 'wdfms_form_shortcode');
function wdfms_form_shortcode ($atts) { 

	if (!empty($atts)) {
		$id = trim($atts['id']);

		// form_id when shortcode used
		$_SESSION['wdfms']['form_id'] = $id;		
		
		// content
		return get_post_field( 'post_content', $id );		
	}
	else {
		echo 'Error: form is not correctly attached';
	}
 } 


// form_id when post_type
add_action('the_post', 'wdfms_form_get_id');
function wdfms_form_get_id(){
    // when wdfms_form post_type open
    if (get_post_type() == 'wdfms_form') {
        $_SESSION['wdfms']['form_id'] = get_the_ID();
    }
}