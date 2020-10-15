<?php

/*
 * Page manager
 */

class Wdfms_Pages {
	// Add pages
	public static function add(){
		
	  	$pages=array(
		                "Admission Form New" => "[wdfms-admission-form]",		// "Title" => "Content"
		                "Admission Form View" => "[wdfms-admission-form-view]"                    
	             	);	  	
	
        // x---- Need not to edit below this ----x	
        $order = 100;       // set page order onwards		 
		$page_ids = array();
		
        // db connection.
        global $wpdb;
		
        foreach ( $pages as $page_title => $content ) {
            
            /// Before inserting any page, check the page slug should not exist. It should be unique.            
            $page_slug = remove_accents($page_title);
            $is_slug_exists = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ". $wpdb->prefix . "posts WHERE post_name = %s", $page_slug ), ARRAY_A  );

            if (empty ($is_slug_exists)) {

                /// Generate a dynamic page.
                $page = array();
                $page['post_title'] 	= $page_title ;
                $page['post_content']	= $content ;
                $page['post_status']	= "publish";
                $page['post_name']		= $page_slug ;
                $page['post_type']		= "page";
                $page['menu_order']		= $order++;			// page order

                /// Insert a post into "wp_posts" table. Takes argument in array. Return post id. 			
	       		$page_ids[] = wp_insert_post($page);
                    
            } else {
				// Error: $page_title . 'could not be created, Page slug is not empty.';
            }
		}

		// Create an option variable in "wp_option" table and store the page-id. Delete these page while deactivation of plugin.
        update_option('wdfms_default_pages', $page_ids, false);

	}


	// remove pages & option on plugin uninstall. (not to edit)
	public static function remove(){		
		if (!empty(get_option('wdfms_default_pages'))) {			
            $page_ids = get_option('wdfms_default_pages');	

            // remove pages
            foreach ($page_ids as $page_id){
                    wp_delete_post($page_id, true);			
            }

            // remove options
            delete_option('wdfms_default_pages');	
        }
	}
}