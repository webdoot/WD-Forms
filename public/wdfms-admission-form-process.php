<?php

/**
 * Admission form process
 */

add_action('wp_ajax_admission_form_submit', 'wdfms_admission_form_process');              
add_action('wp_ajax_nopriv_admission_form_submit', 'wdfms_admission_form_process');       

function wdfms_admission_form_process(){
	if ( wp_verify_nonce ($_POST['nonce_field'], 'nonce_action' ) ) {
		
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

       	// form id
       	$form_id = 2;  															// change

       	// field - form_id max value
		$max_entry_id = max($wpdb->get_col($wpdb->prepare( "SELECT entry_id FROM {$table}")));
		$max_entry_id = (!empty($max_entry_id)) ? $max_entry_id : 0;
		$new_entry_id = $max_entry_id + 1;     // new entry id

		// insert into table
		foreach ($fields as $key => $value) {
       		$wpdb->insert( $table, array( 'form_id' => $form_id, 'entry_id' => $new_entry_id, 'field' => $key, 'value' => $value ), array( '%d', '%d', '%s', '%s' ) ); 
       	}
       	
       	// response
       	$response = array(
	       					'status'  => 'success',
	       					'submit_id' => $new_entry_id,
	       					'mobile'  => $fields['mobile']
       					);
      
        wp_send_json( $response, 200);  
		
    } 	// verify_nonce
    
}