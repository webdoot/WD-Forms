<?php

/**
 * All forms data
 */
class Wdfms_Admin_all_forms
{
	
	public function update(){
		
	    $wdschool_panel = strtoupper(sanitize_text_field($_POST['wdfms_panel']));

	    if ( ($_POST['wdfms_page'] == 'wd-school') && ($_POST['wdfms_action'] == 'update') && wp_verify_nonce( $_POST['wdfms_value'], 'wdfms_action' ) ) {

    		if ( current_user_can('administrator') && is_admin() ) {
	    		// panel option
	    		update_option('wdschool_panel', $wdschool_panel);
	    		// message
	    		wdfms_msg('Option updated', 'success');
    		} 
    		else {
	    		// message
	    		wdfms_msg('User is not authorised for this action.', 'error');
    		}
	    }	    
	}


	


}