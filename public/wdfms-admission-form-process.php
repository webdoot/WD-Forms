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
		    $_POST      = array_map( 'stripslashes_deep', $_POST );
		}
        
		$course   = isset($_POST['course'])    		? sanitize_text_field($_POST['course']) 	 : '' ;
        $name     = isset($_POST['name'])       	? sanitize_text_field($_POST['name'])        : '' ;
        $aadhaar  = isset($_POST['aadhaar'])    	? sanitize_text_field($_POST['aadhaar'])     : '' ;
        $f_name	  = isset($_POST['f_name'])     	? sanitize_text_field($_POST['f_name'])      : '' ;
        $m_name	  = isset($_POST['m_name']) 		? sanitize_text_field($_POST['m_name'])  	 : '' ;
        $dob	  = isset($_POST['dob']) 			? esc_url_raw        ($_POST['dob']) 		 : '' ;
        $gender	  = isset($_POST['gender'])       	? sanitize_text_field($_POST['gender'])   	 : '' ;
        $c_category	= isset($_POST['c_category']) 	? sanitize_text_field($_POST['c_category'])  : '' ;
        $religion = isset($_POST['religion'])    	? sanitize_text_field($_POST['religion'])  	 : '' ;
        $m_status = isset($_POST['m_status'])    	? sanitize_text_field($_POST['m_status'])  	 : '' ;
        $disability = isset($_POST['disability']) 	? sanitize_text_field($_POST['disability'])  : '' ;
        $mob_1	  = isset($_POST['mob']) 		 	? sanitize_text_field ($_POST['mob']) 		 : '' ;
        $email	  = isset($_POST['email'])       	? sanitize_email($_POST['email'])     		 : '' ;
        $education_q = isset($_POST['education_q']) ? sanitize_text_field($_POST['education_q']) : '' ;
        $technical_q = isset($_POST['technical_q']) ? sanitize_text_field($_POST['technical_q']) : '' ;

		global $wpdb;
       	// Table name in which data to be inserted/deleted.
       	$table_name = $wpdb->prefix . 'gd_game';       
       	

        wp_send_json( $_POST, 200);                              // response
    }

    wp_die();
}