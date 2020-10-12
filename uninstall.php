<?php

	// If uninstall not called from WordPress, then exit.
	if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
		exit;
	}

	/// Delete all plugin related table.
	// require_once plugin_dir_path(__FILE__) . 'include/class-wdfms-db.php';		
	// Wdfms_DB::delete_tables();					

	/// Delete all the plugin related dynamic pages and option from wp_option table.
	// gamedoot_delete_default_pages();		
	
	/// Flush rewrite rules.
	flush_rewrite_rules();
  
	
	
	/** 
	 * Delete post & options created dynamically while plugin activation;
	 */
	// function gamedoot_delete_default_pages() {
	// 	if (!empty(get_option('gamedoot_default_pages'))) {			
	// 		$page_ids = get_option('gamedoot_default_pages');	
			
	// 		foreach ($page_ids as $page_id){
	// 			wp_delete_post($page_id, true);			
	// 		}
			
	// 		delete_option('gamedoot_default_pages');				// Delete Options from wp_option table.
	// 	}
	// }
	