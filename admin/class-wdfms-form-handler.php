<?php

/**
 * Form Post Type (custom post)
 */

class Wdfms_Form_Handler {

	public function __construct() {

		// Register wpforms custom post type.
		$this->register_cpt();

	}

	public function register_cpt() {  
	  $args = array(
	    'label'               => 'WDForms',
		'public'              => false,
		'exclude_from_search' => true,
		'show_ui'             => false,
		'show_in_admin_bar'   => false,
		'rewrite'             => false,
		'query_var'           => false,
		'can_export'          => false,
		'supports'            => array( 'title', 'editor', 'custom-fields' ),
		'capability_type'     => 'wdforms_form', // Not using 'capability_type' anywhere. It just has to be custom for security reasons.
		'map_meta_cap'        => false, // Don't let WP to map meta caps to have a granular control over this process via 'map_meta_cap' filter.
	  );
	  register_post_type( 'wdforms', $args ); 
	}


}


// class loader
$wdfms_form_handler = new Wdfms_Form_Handler();
// $wdfms_form_handler->run();