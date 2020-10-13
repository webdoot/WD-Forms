<?php

/**
 * Admin Setting
 */
class Wdfms_Student
{
	protected $wpdb;

	function __construct()
	{
		global $wpdb;
		$this->wpdb = $wpdb;
	}


	public function get_items(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'wdfms_student';
		$total_items = $wpdb->get_results( "SELECT * FROM {$table_name}", ARRAY_A );
		return $total_items;
	}


	public function search(){
		global $wpdb;
		$total_items = $wpdb->get_results( "SELECT * FROM {$table_name} {$where}", ARRAY_A );
	}



	
	// public function get(){
		
	//     $wdschool_panel = strtoupper(sanitize_text_field($_POST['wdfms_panel']));

	//     if ( ($_POST['wdfms_page'] == 'wd-school') && ($_POST['wdfms_action'] == 'update') && wp_verify_nonce( $_POST['wdfms_value'], 'wdfms_action' ) ) {

 //    		if ( current_user_can('administrator') && is_admin() ) {
	//     		// panel option
	//     		update_option('wdschool_panel', $wdschool_panel);
	//     		// message
	//     		wdfms_msg('Option updated', 'success');
 //    		} 
 //    		else {
	//     		// message
	//     		wdfms_msg('User is not authorised for this action.', 'error');
 //    		}
	//     }	    
	// }


	


}