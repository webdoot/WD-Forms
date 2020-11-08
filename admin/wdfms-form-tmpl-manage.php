<?php

/**
 * wp_ajax_(action): Wd Form Template Manager
 */

// display template
add_action('wp_ajax_wdfms_tmpl_display', 'wdfms_tmpl_display');      

function wdfms_tmpl_display(){
	$postid = sanitize_text_field($_POST['postid']);

	// get template
	$form_tmpl = get_post_field( 'post_content_filtered', $postid );

    wp_send_json( $form_tmpl, 200);
}


// edit template
add_action('wp_ajax_wdfms_tmpl_edit', 'wdfms_tmpl_edit');      

function wdfms_tmpl_edit(){
	$postid = sanitize_text_field($_REQUEST['postid']);
	$content = sanitize_text_field($_REQUEST['wdfms_tmpl']);
	 
	// Update
	$wdfms_tmpl = array(
	    'ID'           => $postid,
	    'post_content_filtered' => $content,
	);
	 
	// Update
	wp_update_post( $wdfms_tmpl, true );

	if (!$wp_error) {
	   	$response = array(
	       					'message'  => 'Form template updated.',
	       					'type' 	   => 'success'
	   					);
		wp_send_json_success($response);
	}
	else {
	   	$response = array(
	       					'message'  => 'Something went wrong.',
	       					'type'     => 'error'
	   					);
		wp_send_json_error($response);
	}
    
}