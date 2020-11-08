<?php

/**
 * wp_ajax_(action): Admission form process
 */

add_action('wp_ajax_wdfms_form_submit', 'wdfms_form_process');              
add_action('wp_ajax_nopriv_wdfms_form_submit', 'wdfms_form_process');       

function wdfms_form_process(){
	if ( wp_verify_nonce ($_REQUEST['_wpnonce'], 'nonce_action' ) ) {
		
		// Sritps "\" from the post data.
		if ( get_magic_quotes_gpc() ) {
		    $_POST = array_map( 'stripslashes_deep', $_POST );
		}

		// file handliing
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {  	        
	        $filename 	   = sanitize_text_field($_FILES["photo"]["name"]);
	        $file_type     = $_FILES["photo"]["type"]; 
	        $file_size     = $_FILES["photo"]["size"]; 
	        $file_tmp_name = $_FILES["photo"]["tmp_name"]; 
	        // $file_error    = $_FILES["photo"]["error"];
	    }

	    // check file size
	    if( $file_size > 200000 || $file_size > wp_max_upload_size() ) {		// change 200000
			// response
	       	$response = array(
		       					'status'  => 'error',
		       					'message' => 'Uploaded file is too large. '
	       					);
      
        	wp_send_json( $response, 400);  
	    }
 
	    // upload file
	    $upload = wp_upload_bits($_FILES['photo']['name'], null, file_get_contents($_FILES['photo']['tmp_name']));  

		// form data
        $fields = [
        	'course'      => sanitize_text_field($_POST['course']) 		,
	        'name'        => sanitize_text_field($_POST['name']) 		,
	        'aadhaar'     => sanitize_text_field($_POST['aadhaar']) 	,
	        'f_name'	  => sanitize_text_field($_POST['f_name']) 		,
	        'm_name'	  => sanitize_text_field($_POST['m_name']) 		,
	        'dob'	      => preg_replace("([^0-9/])", "", $_POST['dob']) ,
	        'gender'	  => sanitize_text_field($_POST['gender']) 		,
	        'c_category'  => sanitize_text_field($_POST['c_category']) 	,
	        'religion'    => sanitize_text_field($_POST['religion']) 	,
	        'm_status'    => sanitize_text_field($_POST['m_status']) 	,
	        'disability'  => sanitize_text_field($_POST['disability']) 	,
	        'mobile'      => sanitize_text_field($_POST['mobile']) 		,
	        'email'	      => sanitize_email	 ($_POST['email']) 			,
	        'education_q' => sanitize_text_field($_POST['education_q']) ,
	        'technical_q' => sanitize_text_field($_POST['technical_q']) ,
	        'agree' 	  => sanitize_text_field($_POST['agree']) 		,
	        'photo' 	  => $upload['url'] 							,    
        ];

		global $wpdb;
       	// Table
       	$table = $wpdb->prefix . 'wdfms_forms_data';  
		 
		// Add Product
		$new_submit = array(
		    'post_title'   => $fields['name'],
		    'post_content' => serialize($fields),
		    'post_type'    => 'wdfms_form_entry',
		    'post_status'  => 'publish', 
		    'post_parent'  => $_SESSION['wdfms']['form_id'],
		);
		 
		// Catch submit ID
		$submit_id = wp_insert_post( $new_submit );
       	
       	// response
       	$response = array(
	       					'status'  => 'success',
	       					'submit_id' => $submit_id,
	       					'mobile'  => $fields['mobile']
       					);
      
        wp_send_json( $response, 200);  
		
    } 	// verify_nonce

    else{

    	// response
       	$response = array(
	       					'status'  => 'error',
	       					'message' => 'Un authorised action. '
       					);
      
        wp_send_json( $response, 403);  

    }
    
}