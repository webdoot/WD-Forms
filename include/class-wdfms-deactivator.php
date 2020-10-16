<?php


class Wdfms_Deactivator {

	public static function deactivate() {

		// remove tables
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-db.php';		
		Wdfms_DB::delete_tables();		
		
		// remove options
		// require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-option.php';
		// Wdfms_Option::delete();		

		// default page & related option removal 
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-pages.php';		
        Wdfms_Pages::remove();

        flush_rewrite_rules();

	}

}
