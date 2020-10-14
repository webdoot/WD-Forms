<?php

/*
 * Options manager
 */

class Wdfms_Options {
	// Add Options plugin activation
	public static function add(){
		// add_option( string $option, mixed $value = '', string $deprecated = '', string|bool $autoload = 'yes' );
		/// Panel option (HALF/FULL): Default FULL.
		// add_option('wdschool_panel', 'FULL'); 

		// ..
	}

	// Delete option on plugin uninstall
	public static function remove(){
		// Panel option
		// delete_option('wdschool_panel');

		// .. 
	}

	// Load option into GLOBAL while plugin run
	public function load(){
		// $GLOBALS['wdschool']['panel'] = get_option('wdschool_panel', 'FULL');
	}
	

}